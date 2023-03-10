@extends('admin.auth.layouts.app')
@section('title', 'Reset Password')

@section('content')



    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" target="_blank">
                    <img class="login-logo" alt="image" src="{{ @$globalSettingInfo->image->url }}" width="100%"/>
                </a>
            </div>

            @if (session('status'))
                <div class="alert alert-success mt-2" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card-body">
                <form role="form" method="POST" action="{{ route('admin.password.email') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                               placeholder="Email">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="help-block m-b-none text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- /.col -->
                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button type="submit" class="btn btn-primary btn-block"><strong>Reset Password</strong></button>
                    </div>
                    <!-- /.col -->
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
