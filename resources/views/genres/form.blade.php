<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <strog>Title</strog>
            {!! Form::text('name', null, ['placeholder'=>'The genre\'s name', 'class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <strog>Slug</strog>
            {!! Form::text('slug', null, ['placeholder'=>'The genre\'s slug', 'class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </div>
</div>
