@extends('templates.default_crud')

@section('subheader')
    <br><br>
        <h1 class="header center green-text text-darken-3">Activities' Page</h1>
        <div class="row center">
          <h5 class="header col s12 light">You can create, recovery, update and delete</h5>
        </div>
    <br><br>
@stop

@section('search')
    <div class="row">
      <div class="card card-panel">
          <form class="col s12" action="{{ route('home') }}" method="POST">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          	 <div class="input-field col s4">
                  <p>
                      <input type="checkbox" id="name"/>
                      <label for="name">Nome</label>
                      <input type="checkbox" id="location"/>
                      <label for="location">Localizacao</label>
                      <input type="checkbox" id="type"/>
                      <label for="type">Tipo</label>
                  </p>
              </div>
              <div class="input-field col s6">
                  <i class="material-icons prefix">search</i>
              	  <input id="icon_search" type="text" class="validate">
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
            <form class="col s12" method="POST" action="{{ route('crud.activity') }}">

                <div class="row">
                    <div class="input-field col s4">
                        <i class="material-icons prefix">toc</i>
                        <input id="name_" name="name" type="text" class="validate">
                        <label id="lname" for="icon_prefix">Name of Activity</label>
                    </div>

                    <div class="input-field col s4">
                        <i class="material-icons prefix">today</i>
                        <label id="lstart" class="light-blue-text darken-4">From</label>
                        <input type="date" id="start_" name="start"  class="datepicker" class="light-blue-text darken-4" >
                    </div>

                    <div class="input-field col s4">
                        <i class="material-icons prefix">schedule</i>
                        <input id="startTime_" name="startTime" type="text" class="timepicker">
                        <label for="lStartTime_">Start Time:</label>
                    </div>

                    <script>
                      $('#startTime_').pickatime({   twelvehour: false  });
                    </script>


                </div>


                <div class="row">
                    <div class="input-field col s4">
                        <i class="material-icons prefix">today</i>
                        <label id="lend" class="light-blue-text darken-4">To</label>
                        <input type="date" id="end_" name="end" class="datepicker" class="light-blue-text darken-4">
                    </div>

                    <div class="input-field col s4">
                        <i class="material-icons prefix">schedule</i>
                        <input id="endTime_" name="endTime" type="text" class="timepicker">
                        <label for="lEndTime">End Time:</label>
                    </div>

                    <script>
                      $('#endTime_').pickatime({   twelvehour: false  });
                    </script>

                    <div class="input-field col s4">
                        <i class="material-icons prefix">room</i>
                        <input id="location_" name="location" type="text" class="validate">
                        <label id="llocation" for="icon_telephone">Location</label>
                    </div>

                </div>

                <div class="row">

                    <div class="input-field col s4">
                        <i class="material-icons prefix">perm_identity</i>
                        <input id="qnt_participants_" name="qnt_participants" type="number" class="validate">
                        <label id="lqnt_participants" for="icon_telephone">Quantity of Participants</label>
                    </div>

                    <div class="input-field col s4">
                        <select id="type_" name="type">
                            <option>Choose your option</option>
                            @foreach($types as $type)
                                <option value="{{$type['value']}}">{{$type['text']}}</option>
                            @endforeach
                        </select>
                        <label><i class="material-icons left">description</i>Tipo</label>
                    </div>

                    <div class="input-field col s4">
                        <select id="id_event_" name="event_id">
                            <option>Choose your option</option>
                                @foreach($events as $event)
                                    <option value="{{$event->id}}">{{$event->name}}</option>
                                @endforeach
                        </select>
                        <label><i class="material-icons left">description</i>Evento</label>
                    </div>
                </div>

                <div class="row">

                    <div class="input-field col s3">
                        <button type="submit" class="waves-effect waves-light btn" onclick="setDates();">
                          <i class="material-icons left">input</i>
                          Inserir
                        </button>
                    </div>

                    <div class="input-field col s3">
                        <button class="waves-effect waves-light btn" onclick="clearFields()">
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
        @if($activities == null)
            <div class="card-panel red waves-effect waves-light" role="alert">
                "Nenhuma atividade foi cadastrado ainda."
            </div>
        @else
                <table class="responsive-table">
                @foreach($activities as $activity)
                    <tr>
                          <td>
                              <i class="material-icons left">toc</i>
                              <span id="nameSearch" name="nameSearch">{{ $activity->name }}</span>
                          </td>


                          <td>
                              <i class="tiny material-icons left">description</i>
                              <span id="typeSearch" name="typeSearch"> </span>
                          </td>

                          <?php
                                $activityString = $activity->name . "?" . $activity->start . "?" . $activity->startTime . "?" .
                                                     $activity->end . "?" . $activity->endTime . "?" . $activity->location . "?" .
                                                     $activity->qnt_participants . "?" . $activity->type . "?" . $activity->id_event . "?";
                          ?>
                          <td>
                              <button class="waves-effect waves-light btn" onclick="edit('{{ $activityString }}');">
                                <i class="material-icons left">info_outline</i>
                                Edit
                              </button>
                          </td>
                          <td>
                              <a href="#modal1" class="waves-effect waves-light btn modal-trigger" onclick="modalSetText('{{ $activity->name }}');">
                                <i class="material-icons left">delete</i>
                                Delete
                              </a>
                          </td>
                    </tr>
                @endforeach
                </table>
            </div>
        @endif
    </div>
@stop



<script type="text/javascript">

    window.onload = function() {
        document.formHeader.action = "{{ route('crud.activity.delete') }}";
    }


    function edit( activityString ) {

      alert(activityString);

      var split = activityString.split('?');

      document.getElementById("name_").value =  split[0];
      document.getElementById("lname").className += " active";

      document.getElementById("start_").value =  split[1];
      document.getElementById("lstart").className += " active";

      document.getElementById("startTime_").value =  split[2];
      document.getElementById("lStartTime").className += " active";

      document.getElementById("end_").value =  split[3];
      document.getElementById("lend").className += " active";

      document.getElementById("endTime_").value =  split[4];
      document.getElementById("lEndTime").className += " active";

      document.getElementById('location_').value = split[5];
      document.getElementById("llocation").className += " active";

      document.getElementById("qnt_participants_").value = split[6];
      document.getElementById("lqnt_participants").className += " active";

      document.getElementById("type_").value =  split[7];

      document.getElementById("id_event_").value =  split[8];
    }



    function clearFields( ) {

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

        document.getElementById('end_').value = today;
    }
</script>
