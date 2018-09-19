@extends('films')
@section('title_page')
    <H2>Films List</H2>
@endsection
@section('content')

    <table class="table table-active table-striped">
        <thead>
        <tr>
            <th>&nbsp;</th>
            <th>Name</th>
            <th>Genre</th>
            <th>Country</th>
            <th>Metas</th>
            <th>Rating</th>
            <th>Created at</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($films as $film)
            <tr>
                <td>
                    <img src="{{ url('assets/'.$film->photo) }}" width="50px" alt="image">
                </td>
                <td>{{ $film->name }}</td>
                <td>{{ $film->genre->name }}</td>
                <td>{{ $film->country->name }}</td>
                <td>
                    Release Date: {{ $film->release_date }} <br/>
                    Ticket Price: ${{ $film->ticket_price }}
                </td>
                <td>{{ $film->rating }}</td>
                <td>{{ $film->created_at }}</td>
                <td>
                    <a href="{{ route('films.show', $film->id) }}" class="btn btn-primary">Show</a>
                    <a href="{{ route('films.edit', $film->id) }}" class="btn btn-success">Edit</a>
                    {!!  Form::open(['method'=>'DELETE','route'=>['films.destroy',$film->id],'style'=>'display:inline'])  !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p>
        <a href="{{ route('films.create') }}" class="btn btn-primary">Add a film</a>
    </p>
@endsection
