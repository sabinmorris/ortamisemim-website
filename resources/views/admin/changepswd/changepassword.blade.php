@extends('../layouts.app2')

@section('content')
<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>

                <div class="card-body">
                @include('admin.ainc.messages')
                    <form method="POST" action="{{ Route('update_password')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}, has-feedback">
                            <label for="oldpassword">Old Password</label>
                            <input id="oldpasword" type="password" class="form-control" name="oldpassword" required autofocus>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>

                        </div>
                        <br>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}, has-feedback">
                            <label for="oldpassword">New Password</label>
                            <input id="password" type="password" class="form-control" name="newpassword" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}, has-feedback">
                            <label for="oldpassword">Comfirm Password</label>
                            <input id="comfirmpassword" type="password" class="form-control" name="comfirmpassword" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                        </div>

                        <br>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    Update Password
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection