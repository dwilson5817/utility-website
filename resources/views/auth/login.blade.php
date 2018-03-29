@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <h5 class="card-header">Login</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @if ($errors->has('password')) is-invalid @endif" id="password" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" @if (old('remember')) checked @endif>
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a type="button" class="btn btn-link" href="{{ route('password.request') }}">Forgot password?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
