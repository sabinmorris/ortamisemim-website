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
                            <h2>Users Info</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                @can('isAdmin')
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".member-page-modal-lg">
                                    {{ __('User')}} <i class="fa fa-plus"></i>
                                </button>
                                @endcan
                                <!-- call members registrion model -->
                                @include('auth.register')

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
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($users->count() > 0)
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>{{$loop->index + 1}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->role}}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/uploads/user_images/'.$user->user_image)}}" alt="" width="50px" height="50px;">
                                                    </td>

                                                    <td>
                                                        @can('isAdmin')
                                                        <input type="checkbox" data-id="{{ $user->id }}" name="status" class="switch" {{ $user->status == 1 ? 'checked' : '' }}>
                                                        @endcan
                                                        {{$user->status? 'Active' : 'Inactive'}}
                                                    </td>

                                                    <td>
                                                        <a href="{{Route('show_user', $user->id)}}" title="view"><span class="fa fa-eye"></span></a>
                                                        &nbsp;&nbsp;

                                                        <a href="" class="user_Edit" data-id="{{$user->id}}" data-toggle="modal" data-target=".user-modal-lg" title="edit"><span class="fa fa-pencil-square" style="color:cornflowerblue;"></span></a>
                                                        @include('auth.edituser')

                                                        &nbsp;&nbsp;

                                                        <form id="delete-form-{{$user->id}}" action="#" method="POST" style="display: none">
                                                            {{ csrf_field() }}
                                                            {{method_field('DELETE')}}


                                                        </form>
                                                        @can('isAdmin')
                                                        <a href="" onclick="if(confirm('Are you sure,You want to delete this?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{$user->id}}').submit();
                                                                
                                                            }else{
                                                                event.preventDefault();
                                                            }" title="delete"><span class="fa fa-trash" style="color:red;"></span>
                                                        </a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th>S/No</th>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Image</th>
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

    // Ajax for update user status only
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.switch').change(function() {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let user_Id = $(this).data('id');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ Route('update_user_status')}}",
                data: {
                    'status': status,
                    'user_id': user_Id
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

    // Ajax for featching user data from the db to the user-page form
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.user_Edit').click(function(e) {
            e.preventDefault();
            let userId = $(this).data('id');

            $.ajax({
                type: "get",
                dataType: "json",
                url: "{{ route('user_edit')}}", //For using Normal controller
                data: {
                    'userId': userId
                },
                success: function(data) {
                    //console.log(data.userinfo.role);
                    $('#user_id').val(data.userinfo.id);
                    $('#namee').val(data.userinfo.name);
                    $('#emaill').val(data.userinfo.email);
                    $('#phonee').val(data.userinfo.phone);
                    $('#statuss').val(data.userinfo.status);
                    $('#rolee').val(data.userinfo.role);
                    $('#user_imagee').val(data.userinfo.user_image);

                }
            });
        });
    });

    // Ajax for Update user info to the db
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#updateuserForm').on('submit', function(e) {
            //e.preventDefault();

            if (confirm('Are you sure want to update??')) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ Route('user_update') }}",
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(response.message);
                        $('#usermodal').modal('hide');
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