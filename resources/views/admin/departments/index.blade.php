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
                            <h2>Department Info</h2>
                            <ul class="nav navbar-right panel_toolbox">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".department-page-modal-lg">
                                    {{ __('Department Service')}} <i class="fa fa-plus"></i>
                                </button>

                                <!-- call members registrion model -->
                                @include('admin.departments.create')

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
                                                    <th>Department Name</th>
                                                    <th>Service</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($departmentInfos) > 0)
                                                @foreach($departmentInfos as $departmentInfo)
                                                <tr>
                                                    <td>{{$loop->index + 1}}</td>
                                                    <td>{{$departmentInfo->departmentName}}</td>
                                                    <td>{{$departmentInfo->service}}</td>

                                                    <td>
                                                        <input type="checkbox" data-id="{{ $departmentInfo->id }}" name="status" class="switch" {{ $departmentInfo->status == 1 ? 'checked' : '' }}>
                                                        {{$departmentInfo->status? 'Active' : 'Inactive'}}
                                                    </td>

                                                    <td>
                                                        <a href="#" title="view"><span class="fa fa-eye"></span></a>
                                                        &nbsp;&nbsp;

                                                        <a href="" class="department_Edit" data-id="{{$departmentInfo->id}}" data-toggle="modal" data-target=".department-modal-lg" title="edit"><span class="fa fa-pencil-square" style="color:cornflowerblue;"></span></a>
                                                        @include('admin.departments.edit')
                                                        &nbsp;&nbsp;

                                                        <form id="delete-form-{{$departmentInfo->id}}" action="{{Route('manage-department.destroy', $departmentInfo->id)}}" method="POST" style="display: none">
                                                            {{ csrf_field() }}
                                                            {{method_field('DELETE')}}
                                                        </form>

                                                        <a href="" onclick="if(confirm('Are you sure,You want to delete this?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{$departmentInfo->id}}').submit();
                                                                
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
                                                    <th>Department Name</th>
                                                    <th>Service</th>
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
<link rel="stylesheet" href="{{asset('assets_admin/css/customtoastr.css')}}">
<script src="{{ asset('assets_admin/js/customtoastr.js')}}"></script>

<script type="text/javascript">
    // For Small Toogle button    
    let elems = Array.prototype.slice.call(document.querySelectorAll('.switch'));

    elems.forEach(function(html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });

    // Ajax for update department service status only
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.switch').change(function() {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let dptserviceId = $(this).data('id');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{Route('update_service_status')}}",
                data: {
                    'status': status,
                    'dptserviceId': dptserviceId
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

    // Ajax for add department service data to the db
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#departmentCreateForm').on('submit', function(e) {
            e.preventDefault();

            if (confirm('Are you sure want to save it??')) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{Route('manage-department.store')}}", //For using Resource Controller
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(response.message);
                        //$('#postmodal').modal('hide');
                        //refresh the page
                        setTimeout(() => {
                            document.location.reload(true);

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

    // Ajax for featching department service data from the db to the user-page form
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.department_Edit', function(e) {
            e.preventDefault();
            let dpatmntserviceId = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{Route('manage-department.index')}}" + "/" + dpatmntserviceId + "/edit", //For using Rsource controller. 
                data: {
                    'dpatmntserviceId': dpatmntserviceId
                },
                success: function(data) {
                    $('#dptmntId').val(data.departmentInfo.id);
                    $('#departmentNamee').val(data.departmentInfo.departmentName);
                    $('#servicee').val(data.departmentInfo.service);
                    $('#status').val(data.departmentInfo.status);

                }
            });
        });
    });

    // Ajax for Update department service info to the db
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('submit', '#UpdatedepartmentForm', function(e) {
            e.preventDefault();

            if (confirm('Are you sure want to update service??')) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ Route('update_department_service')}}",
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(response.message);
                        $('#departmentservicemodal').modal('hide');
                        //refresh the page
                        setTimeout(() => {
                            document.location.reload(true);

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