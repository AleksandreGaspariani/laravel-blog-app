@extends('layout/app')


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="container w-100">
            <div class="w-100" style="float: left">
                <p class="display-4 fw-bold">{{$user->name}} Profile.</p>
                <table class="table border-none">
                    <thead>
                      <tr>
                        <th scope="col">Created at</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Img</th>
                      </tr>
                    </thead>
            @foreach ($posts as $post)
                <tbody>
                  <tr>
                    <th scope="row">{{$post->created_at}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    @if ($post->photo !== 'empty')
                        <td><img src="{{asset('image/posts/'.$post->photo)}}" style="width: 3rem;height: 3rem"></td>
                    @else
                        <td></td>
                    @endif
                    <td class="d-flex">
                        <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('view-single',$post->id) }}">View</a>
                    </td>
                  </tr>
            @endforeach


        </tbody>
    </table>
    {{$posts->links('pagination::bootstrap-4')}}
    </div>
    {{-- {{$user->links('pagination::bootstrap-4')}} --}}
</div>

@endsection
