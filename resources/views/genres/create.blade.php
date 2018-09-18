@extends('films')

@section('content')
    {!! Form::open(['route'=>'genres.store','method'=>'POST']) !!}
    @include('genres.form')
    {!! Form::close() !!}
@endsection
