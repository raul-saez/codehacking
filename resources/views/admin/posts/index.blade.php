@extends('layouts.admin')

@section('content')
@if (Session::has('create_post'))
    <p class="bg-danger">{{session('create_post')}}</p>
@endif
@if (Session::has('update_post'))
    <p class="bg-danger">{{session('update_post')}}</p>
@endif
@if (Session::has('delete_post'))
    <p class="bg-danger">{{session('delete_post')}}</p>
@endif
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
                <th></th>
                <th></th>
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
                        <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                        <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                        <td>{{str_limit($post->body,15)}}</td>
                        <td><a href="{{route('home.post', $post->slug)}}">View Post</a></td>
                        <td><a href="{{route('comments.show', $post->id)}}">View Comments</a></td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>
@endsection