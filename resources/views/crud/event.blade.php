@extends('templates.default_crud')

@section('subheader')
    <br><br>
        <h1 class="header center green-text text-darken-3">Events' Page</h1>
        <div class="row center">
          <h5 class="header col s12 light">You can create, recovery, update and delete</h5>
        </div>
    <br><br>
@stop


@section('search')
    <div class="row">
        <div class="card card-panel">
            <form class="col s12">
                  <table class="responsive-table">

                      <td class="input-field col s6">
                          <input type="checkbox" id="name"/>
                          <label for="name">Nome</label>

                          <i class="material-icons prefix">search</i>
                      	  <input name="searchField" id="searchField" type="text" class="validate">
                          <label for="icon_search">Search</label>
                      </td>

                      <div class="input-field col s6">
                        <i class="material-icons prefix">search</i>
                        <input name="responseField" id="responseField" type="text" class="validate">
                        <label for="icon_search">Search</label>

                              <input type="checkbox" id="location"/>
                              <label for="location">Localizacao</label>


                      </div>

                      <div class="input-field col s6">
                              <input type="checkbox" id="type"/>
                              <label for="type">Tipo</label>

                              <i class="material-icons prefix">search</i>
                          	  <input name="responseField" id="responseField" type="text" class="validate">
                              <label for="icon_search">Search</label>
                      </div>

                      <div class="input-field col s6">
                          <button  id="searchButton" class="waves-effect waves-light btn" type="submit">Search</button>
                      </div>

                  </table>

                  <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@stop

@section('fields')
    <div class="row">
        <div class="card card-panel">
          @if($errors->any())
              <div class="card-panel red waves-effect waves-light" role="alert">
                  @foreach($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
              </div>
          @endif
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
              </div>


              <div class="row">
                  <div class="input-field col s4">
                      <button type="submit" class="waves-effect waves-light btn" onclick="setDates();" >
                        <i class="material-icons left">input</i>
                        Inserir
                      </button>
                  </div>

                  <div class="input-field col s4">
                      <button class="waves-effect waves-light btn" type="reset">
                        <i class="material-icons left">info_outline</i>
                        Clear fields
                      </button>
                  </div>
              </div>

              <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">

          </form>
      </div>
    </div>
@stop

@section('elements')
    <div class="row">
        <div class="card card-panel">
        @if($events == null || $events->count() == 0)
            <div class="card-panel red waves-effect waves-light" role="alert">
                "Nenhuma atividade foi cadastrado ainda."
            </div>
        @else
            <table class="responsive-table">
            @foreach($events as $event)
                <tr>
                    <td>
                          <i class="material-icons left">toc</i>
                          <span id="nameSearch" name="nameSearch">{{ $event->name }}</span>
                    </td>

                    <td>
                          <i class="tiny material-icons left">room</i>
                          <span id="typeSearch" name="typeSearch">{{ $event->location }} </span>
                   </td>

                   <td>
                         <i class="tiny material-icons left">room</i>
                         <span id="typeSearch" name="typeSearch">{{ $event->start }} </span>
                  </td>

                  <td>
                        <i class="tiny material-icons left">room</i>
                        <span id="typeSearch" name="typeSearch">{{ $event->end }} </span>
                 </td>

                        <?php
                              $eventString = $event->name . "?" . $event->start . "?" .
                                             $event->end . "?" . $event->location . "?";
                        ?>
                    <td>
                        <button class="waves-effect waves-light btn" onclick="edit('{{ $eventString }}');">
                          <i class="material-icons left">info_outline</i> Edit
                        </button>
                    </td>

                    <td>
                        <a href="#modal1" class="waves-effect waves-light btn modal-trigger" onclick="modalSetText('{{ $event->name }}');">
                          <i class="material-icons left">delete</i> Delete
                        </a>
                    </td>

                </tr>
            @endforeach
          </table>
        @endif
    </div>
  </div>
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

        //alert(today);
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

        //alert(today);
        document.getElementById('end_').value = today;

    }


</script>
