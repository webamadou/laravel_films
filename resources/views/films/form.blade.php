@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Name</strong>
            {!! Form::text('name', null, ['placeholder'=>'Film name', 'class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Slug</strong>
            {!! Form::text('slug', null, ['placeholder'=>'Film slug', 'class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Description</strong>
            {!! Form::textarea('description', null, ['placeholder'=>'Add the description of the film', 'class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Release Date</strong>
            {!! Form::date('release_date', null, ['placeholder'=>'Release Date', 'class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Rating</strong>
            {!! Form::number('rating', null, ['placeholder'=>'Rating','min'=>1,'max'=>5, 'class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Ticket Price</strong>
            {!! Form::number('ticket_price', null, ['placeholder'=>'Ticket','min'=>10,'max'=>1000, 'class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Countries</strong>
            {!! Form::select('country_id', $countries, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Genres</strong>
            {!! Form::select('genre_id', $genres, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Photo</strong><br/>
            {{Form::file('photo')}}
        </div>
        <div class="form-group">
            <a href="{{ route('films.index') }}" class="btn btn-success">Back</a>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </div>
</div>
