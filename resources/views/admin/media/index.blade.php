@extends('layouts.admin')

@section('content')
   <h1>Media</h1>
    @if (Session::has('delete_media'))
        <p class="bg-danger">{{session('delete_media')}}</p>
    @endif
   @if($photos)
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
        </thead>
        <tbody>
        @foreach($photos as $photo)
        <tr>
            <td>{{$photo->id}}</td>
            <td><img width="100" src="{{$photo->file}}" alt="No photo"></td>
            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date'}}</td>
            <td>
                {!!Form::open(['method' => 'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]])!!}
                    <div class="form-group">
                        {!! Form::submit('Delete Media', ['class'=>'btn btn-danger']) !!}
                    </div>
                {!!Form::close()!!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endif
@stop