@extends('layout.app')


@section('content')

<form action="/register-user" method="post" class="w-50 m-auto">
    <h1 class="m-auto display-4 mb-5">Register</h1>
        
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="username">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Number</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="cellphone">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password">
        </div>
    </div>
    <p>
        <button type="submit" class="form-control mt-3 btn btn-success w-100 m-auto">Submit</button>
        <a href="{{route('login')}}" class="mt-1 btn btn-info w-100 m-auto">Login</a>
    </p>
</form>
@endsection

