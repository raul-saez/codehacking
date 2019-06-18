@extends('layouts.admin')


@section('content')
    <h1>Posts</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Owner</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @if($posts)
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img height="30" src="{{$post->photo_id ? $post->photo->file : '/images/placeholder.jpg'}}" alt=""></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category_id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        {{-- <td>{{$post->created_at->diffForhumans()}}</td>
                        <td>{{$post->updated_at->diffForhumans()}}</td> --}}
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection