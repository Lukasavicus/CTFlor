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
          <form class="col s12" action="{{ route('crud.search.event') }}" method="POST">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
             <div class="input-field col s3">
                  <p>
                    <input name="radioSearch" type="radio" id="nameSearch_" value="Name" />
                    <label for="nameSearch_">Name</label>

                    <input name="radioSearch" type="radio" id="locationSearch_" value="Location" />
                    <label for="locationSearch_">Location</label>
                  </p>
              </div>
              <div class="input-field col s7">
                  <i class="material-icons prefix">search</i>
                  <input name="valueSearch" id="icon_search" type="text" class="validate">
                  <label for="icon_search">Search</label>
              </div>

              <div class="input-field col s2">
                  <button class="waves-effect waves-light btn" type="submit">Search</button>
              </div>

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

                  <div class="input-field" style="visibility:hidden">
                      <i class="material-icons prefix">toc</i>
                      <input id="id_" name="id" type="number" class="validate" value="-1">
                      <label id="lid" for="icon_prefix">ID:</label>
                  </div>


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
                      <button id="incluir_alterar" type="submit" class="waves-effect waves-light btn" onclick="setDates();" >
                        <i class="material-icons left">input</i>
                        Insert
                      </button>
                  </div>

                  <div class="input-field col s4">
                      <button class="waves-effect waves-light btn" type="reset">
                        <i class="material-icons left">info_outline</i>
                        Clear fields
                      </button>
                  </div>

                  <div id="cancelar" class="input-field col s4" style="visibility:hidden">
                    <button type="reset" class="waves-effect waves-light btn" onclick="cancelAll()">
                      <i class="material-icons left">info_outline</i>
                      Cancelar
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

              @if( $events == null || $events->count() == 0)
                  <div class="card-panel red waves-effect waves-light" role="alert">
                      "No event has been registered yet."
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
                                    $eventString = $event->id . "?" . $event->name . "?" . $event->start . "?" .
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

      document.getElementById("id_").value =  split[0];
      document.getElementById("lid").className += " active";

      document.getElementById("name_").value =  split[1];
      document.getElementById("lName").className += " active";

      setDatesBack(split[2], 'start_');
      document.getElementById("lStart").className += " active";

      setDatesBack(split[3], 'end_');
      document.getElementById("lEnd").className += " active";


      document.getElementById("location_").value = split[4];
      document.getElementById("lLocation").className += " active";
      editMode();

    }

    function editMode(){
      document.getElementById("cancelar").setAttribute("style", "visibility:visible");
      document.getElementById("incluir_alterar").innerHTML = "<i class=\"material-icons left\">input</i> Alterar";
    }

    function cancelAll(){
      document.getElementById("cancelar").setAttribute("style", "visibility:hidden");
      document.getElementById("incluir_alterar").innerHTML = "<i class=\"material-icons left\">input</i> Insert";

      document.getElementById("name_").value =  "";
      document.getElementById("start_").value =  "";
      document.getElementById("startTime_").value =  "";
      document.getElementById("end_").value =  "";
      document.getElementById("endTime_").value =  "";
      document.getElementById('location_').value = "";
      document.getElementById("qnt_participants_").value = "";
      document.getElementById("type_").value =  "";
      document.getElementById("id_event_").value =  "";
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

    //2015-11-22 -> 22 November, 2015
    function setDatesBack(date, id){
      //alert('>' + date);

      var strFinal = date.substring(8, 10) + " "; //22
      var mes = parseInt(date.substring(5, 7)); //11
      var strMes = "";
      switch(mes){
        case 1: strMes = "January"; break;
        case 2: strMes = "February"; break;
        case 3: strMes = "March"; break;
        case 4: strMes = "April"; break;
        case 5: strMes = "May"; break;
        case 6: strMes = "June"; break;
        case 7: strMes = "July"; break;
        case 8: strMes = "August"; break;
        case 9: strMes = "September"; break;
        case 10: strMes = "October"; break;
        case 11: strMes = "November"; break;
        case 12: strMes = "December"; break;
      }
      strFinal += strMes + ", ";
      strFinal += date.substring(0, 4) + " "; //2015

      document.getElementById(id).value = strFinal;

    }


</script>
