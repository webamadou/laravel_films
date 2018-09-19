@extends('films')
@section('title_page') Adding a new film @endsection
@section('content')
    {!! Form::open(['route'=>'films.store','method'=>'POST','files'=>true]) !!}
    @include('films.form')
    {!! Form::close() !!}
@endsection
