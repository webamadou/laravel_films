@extends('films')

@section('content')
    <div class="container-fluid">
        <div class="col-xs-12 col-sm-4"><img src="{{ url('assets/'.$film->photo) }}" alt="{{ $film->name }}" width="100%"></div>
        <div class="col-xs-12 col-sm-8">
            <h1>{{ $film->name }}</h1>
            <div>{{ $film->description }}</div>
            <div class="metas">
                <strong>Genre:</strong> {{ $film->genre->name }} -
                <strong>Country:</strong> {{ $film->country->name }} -
                <strong>Release Date:</strong> {{ $film->release_date}} -
                <strong>Ticket Price:</strong> {{ $film->ticket_price}}
            </div>
        </div>
    </div>
    <hr/>
    {!! Form::open   !!}
@endsection
