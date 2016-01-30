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
          <form class="col s12" action="{{ route('crud.banca.search') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="input-field col s4">
                   <p>
                     <input name="radioSearch" type="radio" id="eventNameSearch_" value="EventName" />
                     <label for="eventNameSearch_">Event Name</label>

                     <input name="radioSearch" type="radio" id="professorSearch_" value="Professor" />
                     <label for="professorSearch_">Professor</label>
                   </p>
               </div>
               <div class="input-field col s6">
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
                        <select id="id_event_" name="id_event" >
                            <option>Choose an Event</option>
                            @foreach($events as $event)
                                <option value="{{$event->id}}">{{$event->name}}</option>
                            @endforeach
                        </select>
                        <label id="lEvent" ><i class="material-icons left">description</i>Event</label>
                    </div>

                    <div class="input-field col s6">
                        <select id="professor1_" name="professor1">
                            <option>Choose the 1 professor</option>
                                @foreach($professors as $professor)
                                    <option value="{{$professor->id}}">{{$professor->name}}</option>
                                @endforeach
                        </select>
                        <label id="lProfessor1"><i class="material-icons left">description</i>First Professor</label>
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
                        <label id="lProfessor2"><i class="material-icons left">description</i>Second Professor</label>
                    </div>

                    <div class="input-field col s6">
                        <select id="professor3_" name="professor3">
                            <option>Choose the 3 professor</option>
                                @foreach($professors as $professor)
                                    <option value="{{$professor->id}}">{{$professor->name}}</option>
                                @endforeach
                        </select>
                        <label id="lProfessor3"><i class="material-icons left">description</i>Third Professor</label>
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
                      <button type="reset" class="waves-effect waves-light btn">
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

          @if(isset($results))
                @if($results->count() == 0)
                    <div class="card-panel red waves-effect waves-light" role="alert">
                        "No Board of Examiners has been found."
                    </div>
                @else
                    <table class="responsive-table">
                    @foreach($results as $result)
                        <?php
                            foreach ($events as $event)
                              if($event->{'id'} == $result->id_event)
                                $nameEvent = $event->{'name'};

                            foreach ($professors as $professor)
                              if($professor->{'id'} == $result->professor1)
                                $professor1Name = $professor->{'name'};

                              else if($professor->{'id'} == $result->professor2)
                                $professor2Name = $professor->{'name'};

                              else if($professor->{'id'} == $result->professor3)
                                $professor3Name = $professor->{'name'};

                        ?>
                        <tr>
                            <td>
                                <i class="material-icons left">toc</i> <span id="nameSearch" name="nameSearch">{{ $nameEvent }}</span>
                            </td>

                            <td>
                                <i class="tiny material-icons left">description</i> <span id="typeSearch" name="typeSearch">{{ $professor1Name }} </span>
                            </td>

                            <td>
                                <i class="tiny material-icons left">description</i> <span id="typeSearch" name="typeSearch">{{ $professor2Name }} </span>
                            </td>

                            <td>
                                <i class="tiny material-icons left">description</i> <span id="typeSearch" name="typeSearch">{{ $professor3Name }} </span>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                @endif
        @else
            @if($boards == null || $boards->count() == 0)
                <div class="card-panel red waves-effect waves-light" role="alert"> "No Board of Examiners has been registered yet." </div>
            @else
                <table class="responsive-table">
                @foreach($boards as $board)
                    <?php
                        foreach ($events as $event)       if($event->{'id'} == $board->id_event)    $nameEvent = $event->{'name'};

                        foreach ($professors as $professor)
                                 if($professor->{'id'} == $board->professor1)   $professor1Name = $professor->{'name'};

                                 else if($professor->{'id'} == $board->professor2)  $professor2Name = $professor->{'name'};

                                 else if($professor->{'id'} == $board->professor3)  $professor3Name = $professor->{'name'};

                    ?>
                    <tr>
                          <td>
                              <i class="material-icons left">toc</i> <span id="nameSearch" name="nameSearch">{{ $nameEvent }}</span>
                          </td>


                          <td>
                              <i class="tiny material-icons left">description</i> <span id="typeSearch" name="typeSearch">{{ $professor1Name }} </span>
                          </td>

                          <td>
                              <i class="tiny material-icons left">description</i> <span id="typeSearch" name="typeSearch">{{ $professor2Name }} </span>
                          </td>

                          <td>
                              <i class="tiny material-icons left">description</i> <span id="typeSearch" name="typeSearch">{{ $professor3Name }} </span>
                          </td>

                          <?php $bancaString = $nameEvent . "?" . $professor1Name  . "?" . $professor2Name  . "?" . $professor3Name . "?"; ?>

                          <td>
                              <button class="waves-effect waves-light btn"  onclick="edit('{{ $bancaString }}');" > <i class="material-icons left">info_outline</i> Edit </button>
                          </td>
                          <td>
                              <a href="#modal1" class="waves-effect waves-light btn modal-trigger"> <i class="material-icons left">delete</i> Delete </a>
                          </td>
                    </tr>
                @endforeach
                </table>
              </div>
            @endif
        @endif
    </div>
@stop



<script type="text/javascript">

    window.onload = function() {
        document.formHeader.action = "{{ route('crud.activity.delete') }}";
    }


    function edit( bancaString ) {

      var split = bancaString.split('?');

      document.getElementById("id_event_").value =  split[0];
      document.getElementById("lEvent").className += " active";

      document.getElementById("professor1_").value =  split[1];
      document.getElementById("lProfessor1").className += " active";

      document.getElementById("professor2_").value =  split[2];
      document.getElementById("lProfessor2").className += " active";

      document.getElementById("professor3_").value =  split[3];
      document.getElementById("lProfessor3").className += " active";

    }

</script>
