@extends('layouts.authentication') 

@section('content')

<form class="form-signin" method="POST" action="{{ route('login') }}">
    <img class="mb-4" src="{{ asset('img/laravel.png') }}" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Laratrust AdminPanel</h1>
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="sr-only">Email address</label>
            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address" required autofocus>
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
    </div>
    
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="sr-only">Password</label>
            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required> 
            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
    </div>
    
    <div class="form-group">
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}> Remember me
            </label>
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <a class="btn btn-link" href="{{ route('password.request') }}">
            Forgot Your Password?
        </a>
        <a class="btn btn-link" href="{{ route('register') }}">
            Sign Up
        </a>
        <p class="mt-5 mb-3 text-muted">©2018 Laratrust Adminpanel Basic</p>
    </div>
</form>
@endsection