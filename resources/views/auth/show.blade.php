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
                            <h2>User Profile</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <p class="text-muted font-13 m-b-30">
                                            <!-- User List -->
                                        </p>

                                        <div class="table table-striped table-bordered" style="width:100%">
                                            <div class="row">
                                               
                                                    <div class="col-md-12 col-md-offset-4">

                                                        <div class="panel panel-primary">

                                                            <div class="box-body" style="background-color: #ECF0F5;">
                                                                <div class="panel-body">
                                                                    <div class="col-md-8">
                                                                        <div class="panel panel-primary">
                                                                            <div class="panel-heading">
                                                                                <div class="col-md-4">
                                                                                    <img src="{{ asset('storage/uploads/user_images/'.$user->user_image)}}" width="200px" class="img-thumbnail" style="border-radius: 50%; border: 5px solid #F4D489;">
                                                                                </div>
                                                                                <div class="col-md-7">
                                                                                    <h3><u>{{$user->name}}</u></h3>
                                                                                    <p>Phone: {{$user->phone}}</p>
                                                                                    <p>Email: {{$user->email}}</p>
                                                                                    <p>Role: {{$user->role}}</p>
                                                                                    <p>Status: {{$user->status? 'Active' : 'Inactive'}}</p>
                                                                                    <p>Member since {{Auth::user()->created_at->toFormattedDateString()}}</p>
                                                                                </div>
                                                                                <div class="col-sm-3 ">
                                                                                    <a href=""><i class="btn btn-primary">Edit</i></a>
                                                                                    <a class="btn btn-warning" href="{{Route('user_view')}}">Back</a>

                                                                                </div>
                                                                                <div class="clearfix"></div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                
                                            </div>
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

    @endsection