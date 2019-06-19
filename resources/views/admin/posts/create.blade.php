@extends('layouts.admin')


@section('content')
    <h1>Create Posts</h1>
    <div class="row">
        {!!Form::open(['method' => 'POST', 'action'=>'AdminPostsController@store', 'files'=>true])!!}
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', ['' => 'Choose category', '1'=>$categories[1],'2'=>$categories[2],'3'=>$categories[3]], null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Description:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>10]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
            </div>
        {!!Form::close()!!}
    </div>
    <div class="row">
        @include('includes.form_error')
    </div>
@endsection