@extends('films')
@section('title_page')
    <H2>Best Films</H2>
@endsection
@section('content')
    <div class="col-sm-offset-3 col-sm-6 col-xs-12">
    @foreach($films as $film)
        <div class="row line">
            <a href="{{ route('film',["slug"=>$film->slug]) }}">
                <div class="col-xs-4">
                    <img src="{{ url('assets/'.$film->photo) }}" width="200px" alt="image">
                </div>
                <div class="col-xs-8">
                <h3>{{ $film->name }}</h3>
                <div class="metas">
                    <strong>Genre:</strong> {{ $film->genre->name }} -
                    <strong>Country:</strong> {{ $film->country->name }} -
                    <strong>Release Date:</strong> {{ $film->release_date}} -
                    <strong>Ticket Price:</strong> {{ $film->ticket_price}}
                </div>
            </div>
            </a>
        </div>
    @endforeach
    </div>
@endsection
