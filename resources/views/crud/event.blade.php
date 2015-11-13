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
        <form class="col s12" method="POST" action="{{ route('crud.event') }}">
        
            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix">toc</i>
                    <input id="name" name="name" type="text" class="validate">
                    <label for="icon_prefix">Name of Event</label>
                </div>
                  
                <div class="input-field col s4">
                    <i class="material-icons prefix">today</i>
                    <label class="light-blue-text darken-4">From</label>
                    <input type="date" id="start" name="start"  class="datepicker" class="light-blue-text darken-4">
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">today</i>
                    <label class="light-blue-text darken-4">From</label>
                    <input type="date" id="end" name="end"  class="datepicker" class="light-blue-text darken-4">
                </div>
            </div>

            <div class="row">

                <div class="input-field col s4">
                    <i class="material-icons prefix">room</i>
                    <input id="location" name="location" type="text" class="validate">
                    <label for="icon_telephone">Location</label>
                </div>

                
                <div class="input-field col s4">
                    <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">input</i>Inserir</button>
                </div>

                <div class="input-field col s4">
                    <a href="#!" class="waves-effect waves-light btn"><i class="material-icons left">info_outline</i>Clear fields</a>
                </div>

            </div>

            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">

        </form>
    </div>
@stop

@section('elements')

    @if($events == null)
        <div class="card-panel red waves-effect waves-light" role="alert">
            "Nenhuma atividade foi cadastrado ainda."
        </div>
    @else
        <ul class="collection">
        @foreach($events as $event)
            <li class="collection-item avatar">
                <i class="material-icons circle">toc</i>
                <span class="title">{{ $event->name }}</span>
                <p>
                    <i class="material-icons">today</i>
                    <i class="material-icons">today</i>
                    <i class="material-icons">room</i>
                </p>
                <br>
                <button class="waves-effect waves-light btn"><i class="material-icons left">info_outline</i>Edit</button>
                <a href="#modal1" class="waves-effect waves-light btn modal-trigger" onclick="modalSetText('{{ $event->name }}');"><i class="material-icons left">delete</i>Delete</a>
            </li>
        @endforeach
        </ul>
    @endif

@stop

<script type="text/javascript">
    window.onload = function() {
        document.formHeader.action = "{{ route('crud.event.delete') }}";
    }
</script>

<script type="text/javascript">

    function edit( activityString ) {

        alert(activityString);

      var split = activityString.split('?');

        alert('1 ' + split[0]);

      document.getElementById("name_").value =  split[0];
      document.getElementById("lname").className += " active";


      document.getElementById("start_").value = split[1];
      document.getElementById("lstart").className += " active";

      document.getElementById("starttime_").value = split[2].slice(0, 5);
      document.getElementById("lstarttime").className += " active";


      document.getElementById("end_").value = split[3];
      document.getElementById("lend").className += " active";
    }
</script>