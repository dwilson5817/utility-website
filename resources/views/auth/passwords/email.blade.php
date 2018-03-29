@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <h5 class="card-header">Reset password</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Reset password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
