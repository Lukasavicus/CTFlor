@extends('templates.default_crud')


@section('subheader')
    <br><br>
        <h1 class="header center green-text text-darken-3">Materials' Page</h1>
        <div class="row center">
          <h5 class="header col s12 light">You can create, recovery, update and delete</h5>
        </div>
    <br><br>
@stop


@section('search')
    <div class="row">
        <div class="card card-panel">
            <form class="col s12" action="{{ route('crud.material.search') }}" method="POST">
              <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">
              <div class="input-field col s4">
                   <p>
                     <input name="radioSearch" type="radio" id="titleSearch_" value="Title" />
                     <label for="titleSearch_">Title</label>

                     <input name="radioSearch" type="radio" id="keywordSearch_" value="Keyword" />
                     <label for="keywordSearch_">KeyWord</label>

                     <input name="radioSearch" type="radio" id="categorySearch_" value="Category" />
                     <label for="categorySearch_">Category</label>
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
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form class="col s12" method="POST" action="{{ route('crud.material') }}" enctype="multipart/form-data">
            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">
            <div class="row">

              <div class="input-field col s4">
                  <select id="activity_" name="id_activity" >
                      <option>Choose an Event</option>
                      @foreach($activities as $activity)
                          <option value="{{$activity->id}}">{{$activity->name}}</option>
                      @endforeach
                  </select>
                  <label id="lActivity" ><i class="material-icons left">web</i>Activity</label>
              </div>


                <!-- <div class="input-field col s4">
                    <i class="material-icons prefix">perm_identity</i> -->
                    <input id="participant_" name="id_participant" type="hidden" class="validate" value="{{ Auth::user()['id']  }}">
                <!--<label for="icon_prefix">Participant</label>
                </div> -->

                <div class="input-field col s4">
                    <i class="material-icons prefix">description</i>
                    <input id="title_" name="title" type="text" class="validate">
                    <label for="icon_prefix">Title</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">language</i>
                    <input id="keywords_" name="keywords" type="text" class="validate">
                    <label for="icon_prefix">Keywords</label>
                </div>

            </div>

            <div class="row">

                <div class="input-field col s4">
                    <i class="material-icons prefix">note_add</i>
                    <input id="abstract_" name="abstract" type="text" class="validate">
                    <label for="icon_prefix">Abstract</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">clear_all</i>
                    <input id="category_" name="category" type="text" class="validate">
                    <label for="icon_prefix">Category</label>
                </div>

                <div class="file-field input-field col s4">
                  <div class="btn">
                    <span>File</span>
                    <input id="fileField_" name="fileField" type="file">
                  </div>
                  <div class="file-path-wrapper">
                    <input id="filePath_" name="filename" class="file-path validate" type="text">
                  </div>
                </div>

            </div>


            <div class="row">
                <div class="input-field col s4">
                    <button type="submit" class="waves-effect waves-light btn">
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
                        "No Material has been found."
                    </div>
                @else
                    <table class="responsive-table">
                    @foreach($results as $result)
                        <?php foreach ($activities as $activity)     if($activity->{'id'} == $result->id_activity)     $nameActivity = $result->{'name'};  ?>

                        <tr>
                            <td>
                                <i class="material-icons left">toc</i> <span id="nameSearch" name="nameSearch">{{ $nameActivity }}</span>
                            </td>

                            <td>
                                <i class="tiny material-icons left">description</i> <span id="typeSearch" name="typeSearch">{{ $result->title }} </span>
                            </td>

                            <td>
                                <i class="tiny material-icons left">description</i> <span id="typeSearch" name="typeSearch">{{ $result->category }} </span>
                            </td>

                            <td>
                                <i class="tiny material-icons left">description</i> <span id="typeSearch" name="typeSearch">{{ $result->keywords }} </span>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                @endif
        @else
            @if($materials == null || $materials->count() == 0)
                <div class="card-panel red waves-effect waves-light" role="alert"> "No Material has been registered yet." </div>
            @else
                <table class="responsive-table">
                @foreach($materials as $material)
                    <?php foreach ($activities as $activity)     if($activity->{'id'} == $material->id_activity)     $nameActivity = $activity->{'name'};  ?>
                    <tr>
                          <td>
                              <i class="material-icons left">toc</i> <span id="nameSearch" name="nameSearch">{{ isset($nameActivity) }}</span>
                          </td>


                          <td>
                              <i class="tiny material-icons left">description</i> <span id="typeSearch" name="typeSearch">{{ $material->title }} </span>
                          </td>

                          <td>
                              <i class="tiny material-icons left">description</i> <span id="typeSearch" name="typeSearch">{{ $material->category }} </span>
                          </td>

                          <td>
                              <i class="tiny material-icons left">description</i> <span id="typeSearch" name="typeSearch">{{ $material->keywords }} </span>
                          </td>

                          <td>
                              <button class="waves-effect waves-light btn" > <i class="material-icons left">info_outline</i> Edit </button>
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
        document.formHeader.action = "{{ route('crud.event.delete') }}";
    }
</script>
