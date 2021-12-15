@extends('layout.app')

@section('content')
    <div class="m-auto w-50">
        <form action="/add-post" method="POST" class="pt-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" placeholder="Title" name="title">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" rows="3" name="description"></textarea>
            </div>
            <div class="m-auto w-50 m-auto">
                <input type="file" name="photo">
                <button class="btn btn-success w-100 mt-3" type="submit">Add Post</button>
            </div>
        </form>
    </div>
@endsection
