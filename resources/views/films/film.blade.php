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
    <h1>Comments</h1>
    <div class="container-fluid comments-list">
        @foreach($comments as $comment)
            <div class="comment-line">
                <div class="col-xs-4"><i class="glyphicon glyphicon-comment"></i> {{ $comment->user->name }}</div>
                <div class="col-xs-6">{{ $comment->comment }}</div>
                <div class="col-xs-2">{{ $comment->created_at->diffForHumans() }}</div>
            </div>
        @endforeach
    </div>
    <h4>Add a comment</h4>
    @if (Auth::check())
        {!! Form::open(['route'=>'comments.store','method'=>'POST']) !!}
            {!! Form::hidden('film_id',$film->id) !!}
            <div class="form-group">{!! Form::text('name', null, ['placeholder'=>'Your Name', 'class'=>'form-control']) !!}</div>
            <div class="form-group">{!! Form::textarea('comment', null, ['placeholder'=>'Your Comment', 'class'=>'form-control']) !!}</div>
            <div class="form-group">{!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}</div>
        {!! Form::close() !!}
    @else
        <h3 class="watermark">You need to be authenticated to comment</h3>
    @endif
@endsection
