@extends('films')

@section('content')
    {!! Form::model($genre, ['method'=>'PATCH', 'route'=>['genres.update',$genre->id]]) !!}
    @include('genres.form')
    {!! Form::close() !!}
@endsection
