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
            <form class="col s12" action="{{ route('home') }}" method="POST">
              <div class="input-field col s4 left-align">
                  <p>
                      <input type="checkbox" id="name"/>
                      <label for="name">Title</label>
                      <input type="checkbox" id="location"/>
                      <label for="location">Keyword</label>
                      <input type="checkbox" id="type"/>
                      <label for="type">Category</label>
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


@stop

@section('elements')
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
                    <i class="material-icons prefix">web</i>
                    <input id="activity_" name="id_activity" type="text" class="validate">
                    <label for="icon_prefix">Activity</label>
                </div>

                <!-- <div class="input-field col s4">
                    <i class="material-icons prefix">perm_identity</i> -->
                    <input id="participant_" name="id_participant" type="hidden" class="validate" value="4">
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
                    <button class="waves-effect waves-light btn" onclick="clearFields()">
                      <i class="material-icons left">info_outline</i>
                      Clear fields
                    </button>
                </div>

            </div>


        </form>
    </div>
  </div>
@stop

<script type="text/javascript">
    window.onload = function() {
        document.formHeader.action = "{{ route('crud.event.delete') }}";
    }
</script>
