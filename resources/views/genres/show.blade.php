@extends('films')

@section('content')
    <h1>{{ $genre->name }}</h1>
    <div>{{ $genre->slug }}</div>
    <hr/>
    <p><a href="{{ route('genres.index') }}" class="btn btn-primary">Back</a> - <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-primary">Edit</a></p>
@endsection
