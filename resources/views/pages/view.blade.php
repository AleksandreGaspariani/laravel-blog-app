@extends('layout.app')

@section('content')

<div class="container bg-light" style="text-align: center">
    <h1 class="display-4 mb-5">Post</h1>
    <div class="container-fluid">
        <div class="container w-100">
            
            <div class="card shadow-lg">
                <h2 class="card-text p-1">{{$data->title}}</h2>
                <div style="float: right" class="w-100">
                    @auth
                    @if ($user->role == '1' || $data->users->id == Auth::user()->id)
                    <a href="#" class="dropdown dropdown-menu-right"></a>
                    <a id="navbarDropdown" class="nav-link dropdown-toggle btn w-25" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Action
                    </a>
                    <div class="dropdown-menu w-auto m-0 p-0" aria-labelledby="navbarDropdown">
                        <ul style="list-style-type: none">
                            <li><a type="button" href="/edit-post/{{$data->id}}" class="btn">Edit</a>  </li>
                            <li>
                                <form action="/delete-post/{{$data->id}}" method="post" class="">    
                                    @csrf
                                    <button class="btn" type="submit">Delete</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    
                    @endif
                    @endauth
                </div>
                @if ($data->photo !== 'empty')
                    <div class="w-50 m-auto">
                        <img src="{{asset('image/posts/'.$data->photo)}}" class="bd-placeholder-img card-img-top border border-warning rounded" width="auto" height="auto">
                        
                        <div class="d-flex m-auto btn-group-sm">
                            <button class="btn">Likes: 0</button>
                            <a href="" class="btn btn-danger m-1">Like</a>
                            <a href="" class="btn btn-info m-1">Comment</a>
                          </div>
                    </div>
                @endif
                <div class="card-body">
                  <p class="card-text">{{$data->description}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="mb-1">Posted By:   {{ $data->users->name }}</small>
        
                    <div class="btn-group">
                      <a type="button" class="btn btn-sm btn-outline-secondary m-1" href="{{ route('index') }}">Back</a>
                      
                      {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                    </div>
                    <small class="text-muted">{{$data->updated_at}}</small>
                  </div>
                  <small>Comments: {{$sum}}</small>
                </div>
            <table class="table table-light">
                
                @foreach ($comments as $comment)
                <tbody style="text-align: start">
                
                        <th class="p-0"><img style="width: 40px; height:40px; border-radius:50%" src="{{ asset('image/'.$comment->users->photo) }}">
                            <td colspan="">{{$comment->users->name}}</td>
                            <td colspan="" class="text-wrap lh-1">{{$comment->comment}}</td>
                            <td colspan=""><small>{{$comment->created_at}}</small></td>
                        </th>

                        @auth
                            @if ($user->role == '1' || $comment->users->id == Auth::user()->id)
                                <th> 
                                    <td>
                                        <a href="#" class="dropdown"></a>
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            
                                        </a>
                            
                                        <div class="dropdown-menu align-items-center" aria-labelledby="navbarDropdown">
                                            <ul class="list-group m-0 p-0" style="list-style-type: none">
                                                <li class="list-group-item"><a href="#" class="btn p-0 m-0">Edit</a></li>
                                                <li class="m-0 p-0 list-group-item">
                                                    <form action="/delete-comment/{{$comment->id}}" method="post">
                                                        @csrf
                                                        <button class="btn" type="submit">Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                            
                                        </div>
                                    </td>
                                    
                                </th>
                            @endif
                        @endauth
                </tbody>
                
                @endforeach
                
            </table>
        {{$comments->links('pagination::bootstrap-4')}}
            @auth
            
                <form action="{{ route('post-comment') }}" method="post" class="w-75 m-auto" >
                    @csrf
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" placeholder="Type your comment here" name="comment">
                        <button class="btn btn-outline-success" type="submit" name="post_id" value="{{$data->id}}">Comment</button>
                    </div>
                </form>
            @endauth
            
        </div>
        
</div> 
</div>

@endsection