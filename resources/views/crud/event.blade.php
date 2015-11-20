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
                    <input id="name_" name="name" type="text" class="validate">
                    <label id="lName" for="name_">Name of Event</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">today</i>
                    <label id="lStart" class="light-blue-text darken-4">From</label>
                    <input type="date" id="start_" name="start"  class="datepicker" class="light-blue-text darken-4">
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">today</i>
                    <label id="lEnd" class="light-blue-text darken-4">To</label>
                    <input type="date" id="end_" name="end"  class="datepicker" class="light-blue-text darken-4">
                </div>
            </div>

            <div class="row">

                <div class="input-field col s4">
                    <i class="material-icons prefix">room</i>
                    <input id="location_" name="location" type="text" class="validate">
                    <label id="lLocation"for="icon_telephone">Location</label>
                </div>


                <div class="input-field col s4">
                    <button type="submit" class="waves-effect waves-light btn" onclick="setDates();" >
                      <i class="material-icons left">input</i>
                      Inserir
                    </button>
                </div>

                <div class="input-field col s4">
                    <button class="waves-effect waves-light btn" onclick="clearFields()">
                      <i class="material-icons left">info_outline</i>
                      Clear fields
                    </button>
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
                <div class="row col s12">
                    <i class="material-icons left">toc</i>
                    <div class="col s3">
                        <span id="nameSearch" name="nameSearch">{{ $event->name }}</span>
                    </div>

                    <i class="tiny material-icons left">room</i>
                    <div class="col s3">
                        <span id="typeSearch" name="typeSearch">{{ $event->location }} </span>
                    </div>

                    <?php
                          $eventString = $event->name . "?" . $event->start . "?" .
                                         $event->end . "?" . $event->location . "?";
                    ?>

                <button class="waves-effect waves-light btn" onclick="edit('{{ $eventString }}');">
                  <i class="material-icons left">info_outline</i>
                  Edit
                </button>

                <a href="#modal1" class="waves-effect waves-light btn modal-trigger" onclick="modalSetText('{{ $event->name }}');">
                  <i class="material-icons left">delete</i>
                  Delete
                </a>

                </div>
            </li>
        @endforeach
        </ul>
    @endif

@stop

<script type="text/javascript">

    window.onload = function()
    {
        document.formHeader.action = "{{ route('crud.event.delete') }}";
    }

    function edit( eventString )
    {
      var split = eventString.split('?');

      document.getElementById("name_").value =  split[0];
      document.getElementById("lName").className += " active";


      document.getElementById("start_").value = split[1];
      document.getElementById("lStart").className += " active";

      document.getElementById("end_").value = split[2];
      document.getElementById("lEnd").className += " active";


      document.getElementById("location_").value = split[3];
      document.getElementById("lLocation").className += " active";
    }

    function clearFields( )
    {
      document.getElementById("name_").value =  "";

      document.getElementById("start_").value = "";

      document.getElementById("starttime_").value = "";

      document.getElementById("end_").value = "";
    }

    function setDates(){

        var today = new Date(Date.parse(document.getElementById('start_').value));
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!

        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd
        }
        if(mm<10){
            mm='0'+mm
        }

        var today = yyyy+'-'+mm+'-'+dd;

        alert(today);
        document.getElementById('start_').value = today;

        // -----------------------------------------------------

        var today = new Date(Date.parse(document.getElementById('end_').value));
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!

        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd
        }
        if(mm<10){
            mm='0'+mm
        }

        var today = yyyy+'-'+mm+'-'+dd;

        alert(today);
        document.getElementById('end_').value = today;

    }


</script>
