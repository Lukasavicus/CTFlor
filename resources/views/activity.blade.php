@extends('templates.default_crud')

@section('search')
    <div class="row">
        <form class="col s12" action="{{ route('home') }}" method="POST">
        	<div class="input-field col s3">
                <select>
        	        <option value="" disabled selected>Choose your option</option>
        	        <option value="1">Option 1</option>
        	        <option value="2">Option 2</option>
        	        <option value="3">Option 3</option>
                </select>
                <label>Parameters</label>
            </div>
            <div class="input-field col s7">
                <i class="material-icons prefix">search</i>
            	<input id="icon_search" type="text" class="validate">
                <label for="icon_search">Search</label>
            </div>
            <div class="input-field col s2">
                <button class="waves-effect waves-light btn" type="submit">Search</button>
            </div>
        </form>
    </div>
@stop

@section('fields')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('activity') }}">

            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix">toc</i>
                    <input id="name" name="name" type="text" class="validate">
                    <label for="icon_prefix">Name of Activity</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">today</i>
                    <label class="light-blue-text darken-4">From</label>
                    <input type="date" id="start" name="start"  class="datepicker" class="light-blue-text darken-4">
                </div>

                <div class="input-field col s4">
                    <!-- <i class="material-icons prefix">schedule</i> -->
                    <input id="startTime" name="startTime" class="timepicker" type="text" >
                    <label for="startTime">Start Time:</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix">today</i>
                    <label class="light-blue-text darken-4">To</label>
                    <input type="date" id="end" name="end" class="datepicker" class="light-blue-text darken-4">
                </div>

                <div class="input-field col s4">
                  <!--  <i class="material-icons prefix">schedule</i> -->
                    <input id="endTime" name="endTime" type="text" class="timepicker">
                    <label for="endTime">End Time:</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">room</i>
                    <input id="location" name="location" type="text" class="validate">
                    <label for="icon_telephone">Location</label>
                </div>

            </div>

            <div class="row">

                <div class="input-field col s4">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="qnt_participants" name="qnt_participants" type="number" class="validate">
                    <label for="icon_telephone">Quantity of Participants</label>
                </div>

                <div class="input-field col s4">
                    <select id="type" name="type">
                        <option value="" disabled selected>Choose your option</option>
                        @foreach($types as $type)
                            <option value="{{$type['value']}}">{{$type['text']}}</option>
                        @endforeach
                    </select>
                    <label><i class="material-icons left">description</i>Tipo</label>
                </div>

                <div class="input-field col s4">
                    <select id="id_event" name="id_event">
                        <option value="" disabled selected>Choose your option</option>
                            @foreach($events as $event)
                                <option value="{{$event->id}}">{{$event->name}}</option>
                            @endforeach
                    </select>
                    <label><i class="material-icons left">description</i>Evento</label>
                </div>
            </div>

            <div class="row">

                <div class="input-field col s3">
                    <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">input</i>Inserir</button>
                </div>

                <div class="input-field col s3">
                    <a href="#!" class="waves-effect waves-light btn"><i class="material-icons left">info_outline</i>Clear fields</a>
                </div>

            </div>

            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">

        </form>
    </div>
@stop

@section('elements')

    @if($activities == null || $activities->count() == 0)
        <div class="card-panel red waves-effect waves-light" role="alert">
            "Nenhuma atividade foi cadastrado ainda."
        </div>
    @else
        <ul class="collection">
        @foreach($activities as $activity)
            <li class="collection-item avatar">
                <i class="material-icons circle">toc</i>
                <span class="title">{{ $activity->name }}</span>
                <p>
                    <i class="material-icons">today</i>
                    <i class="material-icons">today</i>
                    <i class="material-icons">room</i>
                    <i class="material-icons">perm_identity</i>
                    <i class="material-icons">schedule</i>
                    <i class="material-icons">description</i>
                </p>
                <br>
                <button class="waves-effect waves-light btn"><i class="material-icons left">info_outline</i>Edit</button>
                <a href="#modal1" class="waves-effect waves-light btn modal-trigger" onclick="modalSetText('{{ $activity->name }}');"><i class="material-icons left">delete</i>Delete</a>
            </li>
        @endforeach
        </ul>
    @endif
@stop

<script type="text/javascript">

    $("#startTime").pickatime({
      twelvehour: true
    });

    $("#endTime").pickatime({
      darktheme: true,
      twelvehour: false
    });

    window.onload = function() {
        document.formHeader.action = "{{ route('activity.delete') }}";
    }
</script>
