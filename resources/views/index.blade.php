@extends('layout.app')

@section('content')

<div class="container bg-light w-100  m-auto">
    <h1 class="display-4 mb-5">Posts</h1>

    <div class="list-group">
      @foreach ($data as $post)
      @if ($post->photo !== 'empty')
      {{-- <a href="{{ route('view-single',$post->id) }}" class="list-group-item list-group-item-action"> --}}
        <div class="card shadow-sm">
          <h2 class="card-text p-1">{{$post->title}}</h2>
          <div class="w-25 m-auto">
            <img src="{{asset('image/posts/'.$post->photo)}}" class="bd-placeholder-img card-img-top border border-warning rounded" width="auto" height="auto">

          </div>
          <div class="card-body">
            <p class="card-text">{{$post->description}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <small class="mb-1 btn">Posted By:
                    <span>
                        <a class="btn m-0 p-0" style="color: rgb(58, 41, 41)" href="{{ route('view-profile',$post->users->id) }}">{{ $post->users->name }}</a>
                    </span>
                </small>
              <div class="btn-group">
                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('view-single',$post->id) }}">View</a>
                {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
              </div>
              <small class="text-muted">{{$post->updated_at}}</small>
            </div>
          </div>
      @else
      <div class="card shadow-sm">
        <h2 class="card-text p-1">{{$post->title}}</h2>
        <div class="card-body">
          <p class="card-text">{{$post->description}}</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="mb-1 btn">Posted By:
                <span>
                    <a class="btn m-0 p-0" style="color: rgb(58, 41, 41)" href="{{ route('view-profile',$post->users->id) }}">{{ $post->users->name }}</a>
                </span>
            </small>
            <div class="btn-group">
              <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('view-single',$post->id) }}">View</a>
              {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
            </div>
            <small class="text-muted">{{$post->updated_at}}</small>
          </div>
        </div>
      {{-- <a href="{{ route('view-single',$post->id) }}" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
          <small class="mb-1">Posted By:   {{ $post->users->name }}</small>
          <small>{{ $post->created_at }}</small>
        </div>
        <p class="mb-1 display-4 pb-4">{{ $post->title }}</p>
        <p> {{ $post->description }} </p>
        <small style="float:left;">
          <button class="btn btn-white">Comments: <span class="badge bg-primary p-2">Must fix</span></button>
        </small>
      </a> --}}
      @endif
      @endforeach
    {{$data->links('pagination::bootstrap-4')}}
</div>

</div>

@endsection
