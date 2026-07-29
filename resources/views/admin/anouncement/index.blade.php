@extends('admin.layouts.app')
@section('content')

<div class="container body">
    <div class="main_container">
        <!--start left side menu -->
        @include('admin.ainc.leftSidebar')
        <!-- End left side menu -->

        <!-- top navigation -->
        @include('admin.ainc.topnavBar')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        @if(session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                        @endif
                        <div class="x_title">
                            <h2>Anouncement Info</h2>
                            <ul class="nav navbar-right panel_toolbox">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".anouncement-page-modal-lg">
                                    {{ __('Anouncemnt')}} <i class="fa fa-plus"></i>
                                </button>

                                <!-- call members registrion model -->
                                @include('admin.anouncement.create')

                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <p class="text-muted font-13 m-b-30">
                                            <!-- User List -->
                                        </p>

                                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>S/No</th>
                                                    <th>Title</th>
                                                    <th>File Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count([$anouncementInfos]) > 0)
                                                @foreach($anouncementInfos as $anouncementInfo)
                                                <tr>
                                                    <td>{{$loop->index + 1}}</td>
                                                    <td>{{$anouncementInfo->tittle}}</td>
                                                    <td>
                                                        {{$anouncementInfo->file_name}}
                                                    </td>

                                                    <td>
                                                        <input type="checkbox" data-id="{{ $anouncementInfo->id }}" name="status" class="switch" {{ $anouncementInfo->status == 1 ? 'checked' : '' }}>
                                                        {{$anouncementInfo->status? 'Active' : 'Inactive'}}
                                                    </td>

                                                    <td>
                                                        <a href="#" title="view"><span class="fa fa-eye"></span></a>
                                                        &nbsp;&nbsp;

                                                        <a href="" class="anouncement_Edit" data-id="{{$anouncementInfo->id}}" data-toggle="modal" data-target=".anouncement-modal-lg" title="edit"><span class="fa fa-pencil-square" style="color:cornflowerblue;"></span></a>
                                                        @include('admin.anouncement.edit')

                                                        &nbsp;&nbsp;

                                                        <form id="delete-form-{{$anouncementInfo->id}}" action="{{Route('admin-anouncement.destroy', $anouncementInfo->id)}}" method="POST" style="display: none">
                                                            {{ csrf_field() }}
                                                            {{method_field('DELETE')}}


                                                        </form>

                                                        <a href="" onclick="if(confirm('Are you sure,You want to delete this?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{$anouncementInfo->id}}').submit();
                                                                
                                                            }else{
                                                                event.preventDefault();
                                                            }" title="delete"><span class="fa fa-trash" style="color:red;"></span>
                                                        </a>

                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th>S/No</th>
                                                    <th>Title</th>
                                                    <th>File Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<script src="{{ asset('assets_admin/js/jquery.js')}}"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> -->
<link rel="stylesheet" href="{{asset('assets_admin/css/customtoastr.css')}}">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
<script src="{{ asset('assets_admin/js/customtoastr.js')}}"></script>

<script type="text/javascript">
    // For Small Toogle button    
    let elems = Array.prototype.slice.call(document.querySelectorAll('.switch'));

    elems.forEach(function(html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });

    // Ajax for update anouncement status only
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.switch').change(function() {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let anouncement_id = $(this).data('id');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{Route('update_anouncement_status')}}",
                data: {
                    'status': status,
                    'anouncement_id': anouncement_id
                },
                success: function(data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 100;
                    toastr.success(data.message);
                    //refresh the page
                    setTimeout(() => {
                        document.location.reload();
                    }, 2000); // 2000 milliseconds = 2 seconds
                }
            });
        });

    });

    // Ajax for add anouncement data to the db
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#anouncementCreateForm').on('submit', function(e) {
            e.preventDefault();

            if (confirm('Are you sure want to save it??')) {
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: "{{Route('admin-anouncement.store')}}", //For using Resource Controller only.
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(response.message);
                        //refresh the page
                        setTimeout(() => {
                            document.location.reload();
                        }, 3000); // 3000 milliseconds = 3 seconds

                    },
                    error: function(xhr) {

                        if (xhr.status === 422) {
                            // Laravel validation errors
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(field, messages) {
                                toastr.error(messages[0], field.toUpperCase() + ' Error');
                            });
                        } else {
                            toastr.error(xhr.responseJSON?.message || 'Unexpected error occurred.');
                        }
                    }
                });
            }
        });
    });

    // Ajax for featching anouncement data from the db to the form
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.anouncement_Edit').click(function(e) {
            e.preventDefault();
            let anoucementId = $(this).data('id');

            $.ajax({
                type: "get",
                dataType: "json",
                url: "{{Route('admin-anouncement.index')}}" + "/" + anoucementId + "/edit", //For using Rsource controller 
                data: {
                    'anoucementId': anoucementId
                },
                success: function(data) {
                    $('#anoucementId').val(data.anouncementInfo.id);
                    $('#tittlee').val(data.anouncementInfo.tittle);
                    $('#status').val(data.anouncementInfo.status);
                    $('#file_namee').val(data.anouncementInfo.file_name);


                }
            });
        });
    });

    // Ajax for Update Anouncement info to the db
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#anouncementUpdateForm').on('submit', function(e) {
            e.preventDefault();

            if (confirm('Are you sure want to update??')) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{Route('update_anouncement')}}",
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(response.message);
                        $('#anouncementmodal').modal('hide');
                        //refresh the page
                        setTimeout(() => {
                            document.location.reload();
                        }, 2000); // 2000 milliseconds = 2 seconds
                    },
                    error: function(xhr) {

                        if (xhr.status === 422) {
                            // Laravel validation errors
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(field, messages) {
                                toastr.error(messages[0], field.toUpperCase() + ' Error');
                            });
                        } else {
                            toastr.error(xhr.responseJSON?.message || 'Unexpected error occurred.');
                        }
                    }
                });
            }
        });
    });
</script>
@endsection