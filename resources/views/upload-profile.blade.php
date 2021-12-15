@extends('layout.app')

@section('content')

    <div class="container p-5 w-50 m-auto">
        <div class="input-group mb-3">
            {{-- {{dd($data)}} --}}
            <form action="/upload/{{$data->id}}" method="post" class="w-100 m-auto" enctype="multipart/form-data">
                @csrf
                <input type="file" class="form-control" aria-label="Upload" name="photo" value="{{$data->photo}}">
                <button class="btn btn-outline-info w-100" type="submit">Upload</button>
            </form>
        </div>  
    </div>  
@endsection