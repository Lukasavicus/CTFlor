@extends('templates.default_crud')

@section('subheader')
    <br><br>
        <h1 class="header center green-text text-darken-3">Board of Examiners' Page</h1>
        <div class="row center">
          <h5 class="header col s12 light">You can create, recovery, update and delete</h5>
        </div>
    <br><br>
@stop

@section('search')
    <div class="row">
      <div class="card card-panel">
          <form class="col s12" action="{{ route('crud.banca') }}" method="POST">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          	 <div class="input-field col s3">
                  <p>
                      <input type="checkbox" id="name"/>
                      <label for="name">Event</label>
                      <input type="checkbox" id="location"/>
                      <label for="location">Professor</label>
                  </p>
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
    </div>
@stop

@section('fields')
    <div class="row">
        <div class="card card-panel">
            @if($errors->any())
                <div class="card-panel red waves-effect waves-light" role="alert">
                    <p>
                    @foreach($errors->all() as $error)
                      {{ $error }}
                    @endforeach
                    </p>
                </div>
            @endif
            <form class="col s12" method="POST" action="{{ route('crud.banca') }}">

                <div class="row">

                    <div class="input-field col s6">
                        <select id="event_id_" name="event_id" >
                            <option>Choose an Event</option>
                            @foreach($events as $event)
                                <option value="{{$event->id}}">{{$event->name}}</option>
                            @endforeach
                        </select>
                        <label><i class="material-icons left">description</i>Event</label>
                    </div>

                    <div class="input-field col s6">
                        <select id="professor1_" name="professor1">
                            <option>Choose the 1 professor</option>
                                @foreach($professors as $professor)
                                    <option value="{{$professor->id}}">{{$professor->name}}</option>
                                @endforeach
                        </select>
                        <label><i class="material-icons left">description</i>First Professor</label>
                    </div>
              </div>
              <div class="row">
                    <div class="input-field col s6">
                        <select id="professor2_" name="professor2">
                            <option>Choose the 2 professor</option>
                                @foreach($professors as $professor)
                                    <option value="{{$professor->id}}">{{$professor->name}}</option>
                                @endforeach
                        </select>
                        <label><i class="material-icons left">description</i>Second Professor</label>
                    </div>

                    <div class="input-field col s6">
                        <select id="professor3_" name="professor3">
                            <option>Choose the 3 professor</option>
                                @foreach($professors as $professor)
                                    <option value="{{$professor->id}}">{{$professor->name}}</option>
                                @endforeach
                        </select>
                        <label><i class="material-icons left">description</i>Third Professor</label>
                    </div>

              </div>


              <div class="row">

                  <div class="input-field col s3">
                      <button type="submit" class="waves-effect waves-light btn">
                        <i class="material-icons left">input</i>
                        Inserir
                      </button>
                  </div>

                  <div class="input-field col s3">
                      <button class="waves-effect waves-light btn">
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
      @if($boards == null)
        <div class="card card-panel">
            <div class="card-panel red waves-effect waves-light" role="alert">
                "No Board of Examiners has been registered yet."
            </div>
        @else
                <table class="responsive-table">
                @foreach($boards as $board)
                    <tr>
                          <td>
                              <i class="material-icons left">toc</i>
                              <span id="nameSearch" name="nameSearch">{{ $board->id }}</span>
                          </td>


                          <td>
                              <i class="tiny material-icons left">description</i>
                              <span id="typeSearch" name="typeSearch"> </span>
                          </td>

                          <td>
                              <button class="waves-effect waves-light btn">
                                <i class="material-icons left">info_outline</i>
                                Edit
                              </button>
                          </td>
                          <td>
                              <a href="#modal1" class="waves-effect waves-light btn modal-trigger">
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

    /*
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
    */
</script>
