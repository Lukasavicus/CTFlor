<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('event') }}">Event Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('event') }}">View All Events</a></li>
        <li><a href="{{ URL::to('event/create') }}">Create an Event</a>
    </ul>
</nav>

<h1>Create an Event</h1>

<!-- if there are creation errors, they will show here -->
{!! Form::open(array('url' => 'event')) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('start', 'Start') !!}
        {!! Form::text('start', Input::old('start'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('location', 'Localizacao') !!}
        {!! Form::text('location', Input::old('location'), array('class' => 'form-control')) !!}

    </div>

    {!! Form::submit('Create the Event!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
</body>
</html>