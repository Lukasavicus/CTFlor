<!-- app/views/nerds/index.blade.php -->

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
        <li><a href="{{ URL::to('event/create') }}">Create an event</a>
    </ul>
</nav>

<h1>All the Events</h1>

<!-- will be used to show any messages -->

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Start</td>
            <td>End</td>
            <td>Location</td>
        </tr>
    </thead>
    <tbody>
    @foreach($eventsCollection as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->start }}</td>
            <td>{{ $value->end }}</td>
            <td>{{ $value->location }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('event/' . $value->id) }}">Show this Event</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('event/' . $value->id . '.edit') }}">Edit this Event</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>