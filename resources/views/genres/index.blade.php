@extends('films')

@section('content')
    <H2>Films List</H2>
    <table class="table table-active table-striped">
        <thead>
        <tr>
            <th>&nbsp;</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($genres as $genre)
            <tr>
                <td></td>
                <td>{{ $genre->name }} <br/>slug : {{ $genre->slug }}</td>
                <td>{{ $genre->created_at }}</td>
                <td>
                    <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-primary">Show</a>
                    <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-success">Edit</a>
                    {!!  Form::open(['method'=>'DELETE','route'=>['genres.destroy',$genre->id],'style'=>'display:inline'])  !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p>
        <a href="{{ route('genres.create') }}">Create</a>
    </p>
@endsection
