@extends('layout.app')

@section('content')
    <div class="m-auto w-50">
        <form action="{{route('update-post',$data->id)}}" method="POST" class="pt-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" placeholder="Title" name="title" value="{{$data->title}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input class="form-control" name="description" value="{{$data->description}}">
            </div>
            <div class="mb-3 w-100">
                <div class="">
                    <img class="w-50 m-auto p-auto" src="{{asset('/image/posts/'.$data->photo)}}">
                </div>
                <input type="file" name="photo">
            </div>
            <div class="m-auto w-50 m-auto">
                <button class="btn btn-info w-100" type="submit">Edit Post</button>
            </div>
        </form>
    </div>
@endsection
