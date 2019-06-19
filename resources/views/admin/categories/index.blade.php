@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>
    @if (Session::has('create_category'))
    <p class="bg-danger">{{session('create_category')}}</p>
    @endif
    @if (Session::has('update_category'))
        <p class="bg-danger">{{session('update_category')}}</p>
    @endif
    @if (Session::has('delete_category'))
        <p class="bg-danger">{{session('delete_category')}}</p>
    @endif
    <div class="col-sm-6">
        {!!Form::open(['method' => 'POST', 'action'=>'AdminCategoriesController@store'])!!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
            </div>
        {!!Form::close()!!}
    </div>
    <div class="col-sm-6">
        @if($categories)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                            <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No Date'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@stop