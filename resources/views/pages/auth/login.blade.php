@extends('layout.app')


@section('content')
<form action="/login-user" method="post" class="w-50 m-auto">
    <h1 class="display-4 pt-2 mb-5">Login</h1>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password">
        </div>
    </div>
    <p>
        <button type="submit" class="form-control-bg-success mt-3 btn btn-success w-100 m-auto">Login</button>
        <a href="{{route('register')}}" class="mt-1 btn btn-info w-100 m-auto">Register</a>
    </p>
    
</form>
@endsection

