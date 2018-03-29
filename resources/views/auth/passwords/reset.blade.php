@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <h5 class="card-header">Reset password</h5>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @if ($errors->has('password')) is-invalid @endif" id="password" name="password" required>
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm password</label>
                            <input type="password" class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif" id="password-confirm" name="password_confirmation" required>
                            @if ($errors->has('password_confirmation'))
                                <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Complete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
