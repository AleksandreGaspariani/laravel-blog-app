@extends('layout.app')

@section('content')

    <div class="container">
        <header class="header">
            <ul class="d-flex bg-info" style="list-style-type: none">
                <li class="btn m-1 p-1"><p class="display-4">
                    @if ($information->prompted_by == 'Sys Admin')
                        Sys Admin
                    @else
                        Admin
                    @endif
                    </p>
                </li>
            </ul>
        </header>

        <form class="col-12 col-lg-auto mb-3 mb-lg-5 me-lg-3">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            <button class="btn btn-info mt-2">Search</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Prompted By</th>
                    <th scope="col">Actions</th>
                  </tr>
            </thead>

            <tbody>
                @foreach ($all_admins as $admin)
                    @if ($admin->prompted_by == 'Sys Admin')

                    @else
                    <tr>
                        <td>{{$admin->name}}</td>
                        <td>Admin</td>
                        <td>{{$admin->prompted_by}}</td>
                        <td><a href="" class="btn-danger border rounded p-2">Revoke</a></td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
