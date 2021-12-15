@extends('layout.app')

@section('content')
@auth
<div class="container ">
    <div>
        <ul class="d-flex list-group">
            <li class="list-group-item"><a class="btn btn-info" href="/upload-profile-pic/{{Auth::user()->id}}">Upload Profile Image</a></li>
            <li class="list-group-item">
                <form action="{{route('delete-user',Auth::user()->id)}}" method="post">
                    @csrf
                    <button class="btn btn-danger">Delete Profile</button>
                </form>
            </li>
             {{-- <li class="form-group-item"></li> --}}
        </ul>
    </div>

    
    <div class="row">
        <div class="col-md-12">
            <div class="container w-100">
                <div class="w-100" style="float: left">
                    <p class="display-4 fw-bold">Your Posts</p>
                    <table class="table border-none">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Img</th>
                          </tr>
                        </thead>
                @foreach ($data as $item)
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        @if ($item->photo !== 'empty')
                            <td><img src="{{asset('image/posts/'.$item->photo)}}" style="width: 3rem;height: 3rem"></td>
                        @else
                            <td></td>
                        @endif
                        <td class="d-flex">
                            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('view-single',$item->id) }}">View</a>
                            <form action="/delete-post/{{$item->id}}" method="post" class="">    
                                @csrf
                                <button class="btn btn-outline-danger" type="submit">Delete</button>
                            </form>
                            <a type="button" href="/edit-post/{{$item->id}}" class="btn btn-outline-primary">Edit</a>
                        </td>
                      </tr>
                @endforeach
            </tbody>
        </table>    
        </div>
        {{$data->links('pagination::bootstrap-4')}}
    </div>
</div>
@endauth
@endsection
