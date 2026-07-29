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
                            <h2>Posts Info</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                @canany(['isAdmin', 'isEditor'])
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".post-page-modal-lg">
                                    {{ __('Post')}} <i class="fa fa-plus"></i>
                                </button>
                                @endcanany
                                <!-- call members registrion model -->
                                @include('admin.posts.create')

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
                                                    <th>Description</th>
                                                    <th>Post-Image</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count([$postInfos]) > 0)
                                                @foreach($postInfos as $postInfo)
                                                <tr>
                                                    <td>{{$loop->index + 1}}</td>
                                                    <td>{{$postInfo->post_tittle}}</td>
                                                    <td>{{$postInfo->post_description}}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/uploads/post_images/'.$postInfo->post_image)}}" alt="" width="50px" height="50px;">
                                                    </td>

                                                    <td>
                                                        <input type="checkbox" data-id="{{ $postInfo->id }}" name="status" class="switch" {{ $postInfo->post_status == 1 ? 'checked' : '' }}>
                                                        {{$postInfo->post_status? 'Active' : 'Inactive'}}
                                                    </td>

                                                    <td>
                                                        <a href="#" title="view"><span class="fa fa-eye"></span></a>
                                                        &nbsp;&nbsp;

                                                        <a href="" class="slide_Edit" data-id="{{$postInfo->id}}" data-toggle="modal" data-target=".post-modal-lg" title="edit"><span class="fa fa-pencil-square" style="color:cornflowerblue;"></span></a>
                                                        @include('admin.posts.edit')

                                                        &nbsp;&nbsp;

                                                        <form id="delete-form-{{$postInfo->id}}" action="{{Route('admin-post.destroy', $postInfo->id)}}" method="POST" style="display: none">
                                                            {{ csrf_field() }}
                                                            {{method_field('DELETE')}}


                                                        </form>

                                                        <a href="" onclick="if(confirm('Are you sure,You want to delete this?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{$postInfo->id}}').submit();
                                                                
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

    // Ajax for update posts status only
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.switch').change(function() {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let postid = $(this).data('id');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{Route('update_post_status')}}",
                data: {
                    'status': status,
                    'postid': postid
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

    // Ajax for add posts data to the db
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#postCreateForm').on('submit', function(e) {
            e.preventDefault();

            if (confirm('Are you sure want to save it??')) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{Route('admin-post.store')}}", //For using Resource Controller
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

    // Ajax for featching post data from the db to the user-page form
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click','.slide_Edit', function(e) {
            e.preventDefault();
            let postId = $(this).data('id');

            $.ajax({
                type: "get",
                dataType: "json",
                url: "{{Route('admin-post.index')}}" + "/" + postId + "/edit", //For using Rsource controller
                data: {
                    'postId': postId
                },
                success: function(data) {
                    $('#postid').val(data.postinfo.id);
                    $('#post_tittlee').val(data.postinfo.post_tittle);
                    $('#post_descriptionn').val(data.postinfo.post_description);
                    $('#post_status').val(data.postinfo.post_status);
                    $('#post_imagee').val(data.postinfo.post_image);

                }
            });
        });
    });

    // Ajax for Update posts info to the db
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('submit', '#postupdateForm', function(e) {
            e.preventDefault();

            if (confirm('Are you sure want to update post??')) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{Route('update_post')}}",
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(response.message);
                        $('#postmodal1').modal('hide');
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