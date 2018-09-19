@extends('films')

@section('content')
    {!! Form::model($film, ['method'=>'PATCH', 'route'=>['films.update',$film->id], 'files'=>true]) !!}
    @include('films.form')
    {!! Form::close() !!}
@endsection
