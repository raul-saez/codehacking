@extends('layouts.blog-home')

@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">
                Blog
                <small>Secondary Text</small>
            </h1>
            <!-- First Blog Post -->
            @if ($posts)
                @foreach ($posts as $post)
                <h2>{{$post->title}}</h2>
                <p class="lead">
                    by <a href="{{$post->slug}}">{{$post->user->name}}</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
                <hr>
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">
                <hr>
                <p>{{str_limit($post->body, 100)}}</p>
                <a class="btn btn-primary" href="post/{{$post->slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                @endforeach
            @endif
            <!-- Pagination -->
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    {{$posts->render()}}
                </div>
            </div>
            

        </div>
        <!-- Blog Sidebar -->
        @include('includes.front_sidebar')
    </div>
</div>
@endsection
