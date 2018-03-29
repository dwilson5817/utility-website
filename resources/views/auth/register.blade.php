@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <h5 class="card-header">Register</h5>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Full name</label>
                            <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
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
                            <label for="password">Confirm password</label>
                            <input type="password" class="form-control" id="password-confirm" name="password-confirm" placeholder="Confirm password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                        <a type="button" class="btn btn-link" href="{{ route('login') }}">Already have an account?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
