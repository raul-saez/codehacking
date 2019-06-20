@extends('layouts.blog-post')

@section('content')

<!-- Blog Post -->
@if (Session::has('comment_message'))
    <p class="bg-info">{{session('comment_message')}}</p>
@endif
@if (Session::has('reply_message'))
    <p class="bg-info">{{session('reply_message')}}</p>
@endif
    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>
    <hr>

<!-- Blog Comments -->
@if(Auth::check())
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="form-group">
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endif
    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
@if(count($comments) > 0)
    @foreach ($comments as $comment)
        @if($comment->is_active == 1 && $comment->post_id == $post->id)
            <div class="media">
                <a class="pull-left" href="#">
                    <img width="64" class="media-object" src="{{$comment->photo}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>Posted {{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                    {{$comment->body}}
                    <div class="comment-reply-container">
                        <button class="button toggle-reply btn btn-primary pull-right">Reply</button>
                        <div class="comment-reply col-sm-9">
                            {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <div class="form-group">
                                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <!-- Nested Comment -->
                    @if(count($comment->replies) > 0)
                        @foreach ($comment->replies as $reply)
                            @if($reply->is_active == 1)
                                <div id="nested-comment" class="media">
                                    <a class="pull-left" href="#">
                                        <img width="64" class="media-object" src="{{$reply->photo}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>Posted {{$reply->created_at->diffForHumans()}}</small>
                                        </h4>
                                        {{$reply->body}}
                                    </div>
                                </div>
                                <div class="comment-reply-container">
                                    <button class="button toggle-reply btn btn-primary pull-right">Reply</button>
                                    <div class="comment-reply col-sm-9">
                                        {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                            <div class="form-group">
                                                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    <!-- End Nested Comment -->
                </div>
            </div>
        @endif
    @endforeach
@endif
    
@stop

@section('scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle("slow");
        });

    </script>
@stop