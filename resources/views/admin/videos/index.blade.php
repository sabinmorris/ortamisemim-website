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
                            <h2>Video Info</h2>
                            <ul class="nav navbar-right panel_toolbox">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".video-page-modal-lg">
                                    {{ __('Video')}} <i class="fa fa-file-movie-o"></i> <i class="fa fa-plus"></i>
                                </button>

                                <!-- call members registrion model -->
                                @include('admin.videos.create')

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
                                                    <th>Link</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count([$videoInfos]) > 0)
                                                @foreach($videoInfos as $videoInfo)
                                                <tr>
                                                    <td>{{$loop->index + 1}}</td>
                                                    <td>{{$videoInfo->tittle}}</td>
                                                    <td>{{$videoInfo->link}}</td>
                                                    <td>
                                                        <input type="checkbox" data-id="{{ $videoInfo->id }}" name="status" class="switch" {{ $videoInfo->status == 1 ? 'checked' : '' }}>
                                                        {{$videoInfo->status? 'Active' : 'Inactive'}}
                                                    </td>

                                                    <td>
                                                        <a href="#" title="view"><span class="fa fa-eye"></span></a>
                                                        &nbsp;&nbsp;

                                                        <a href="" class="video_Edit" data-id="{{$videoInfo->id}}" data-toggle="modal" data-target=".video-modal-lg" title="edit"><span class="fa fa-pencil-square" style="color:cornflowerblue;"></span></a>
                                                        @include('admin.videos.edit')

                                                        &nbsp;&nbsp;

                                                        <form id="delete-form-{{$videoInfo->id}}" action="{{Route('manage-video.destroy', $videoInfo->id)}}" method="POST" style="display: none">
                                                            {{ csrf_field() }}
                                                            {{method_field('DELETE')}}


                                                        </form>

                                                        <a href="" onclick="if(confirm('Are you sure,You want to delete this?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{$videoInfo->id}}').submit();
                                                                
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
                                                    <th>Description</th>
                                                    <th>Post-Image</th>
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

    // Ajax for update video status only
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.switch').change(function() {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let videoid = $(this).data('id');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{Route('update_video_status')}}",
                data: {
                    'status': status,
                    'videoid': videoid
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

    // Ajax for add video data to the db
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#videoCreateForm').on('submit', function(e) {
            e.preventDefault();

            if (confirm('Are you sure want to save it??')) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{Route('manage-video.store')}}", //For using Resource Controller
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
                            document.location.reload();
                        }, 3000); // 3000 milliseconds = 3 seconds

                    }
                });
            }
        });
    });

    // Ajax for featching video data from the db to the form
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.video_Edit').click(function(e) {
            e.preventDefault();
            let videoId = $(this).data('id');

            $.ajax({
                type: "get",
                dataType: "json",
                url: "{{Route('manage-video.index')}}"+ "/"+videoId+"/edit", //For using Rsource controller
                data: {
                    'videoId': videoId
                },
                success: function(data) {
                    $('#videoId').val(data.videoInfo.id);
                    $('#tittlee').val(data.videoInfo.tittle);
                    $('#linkk').val(data.videoInfo.link);
                    $('#status').val(data.videoInfo.status);

                }
            });
        });
    });

    // Ajax for Update video info to the db
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#videoUpdateForm').on('submit', function(e) {
            //e.preventDefault();

            if (confirm('Are you sure want to update??')) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{Route('update_video')}}",
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(response.message);
                        $('#videomodal').modal('hide');
                        //refresh the page
                        setTimeout(() => {
                            document.location.reload();
                        }, 2000); // 2000 milliseconds = 2 seconds

                    }
                });
            }
        });
    });
</script>
@endsection