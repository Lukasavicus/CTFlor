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

	    @if($partActivities == null)
        <div class="card-panel red waves-effect waves-light" role="alert">
            "Nenhuma atividade foi cadastrado ainda."
        </div>
    @else
    	<ul class="collection">
        @foreach($partActivities as $partActivity)
            <li class="collection-item avatar">
                <div class="row col s12">
                	<div class="col s3">
                    	<i class="material-icons left">perm_identity</i>
                        <span id="nameSearch" name="nameSearch">{{ $partActivity->pName }}</span>
                    </div>
                    <div class="col s3">
                    	<i class="tiny material-icons left">credit_card</i>
                        <span id="cpfSearch" name="cpfSearch">{{ $partActivity->aName }}</span>
                    </div>
                    <div class="col s6">
                    	<input id="input-dim-2" type="file" multiple class="file-loading">
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
    @endif
@stop

@section('elements')
    <div class="row">
        @if($errors->any())
            <div class="card-panel red waves-effect waves-light" role="alert">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form class="col s12" method="POST" action="{{ route('crud.material') }}" enctype="multipart/form-data">

            <div class="row">

                <div class="input-field col s4">
                    <i class="material-icons prefix">web</i>
                    <input id="activity_" name="id_activity" type="text" class="validate">
                    <label for="icon_prefix">Activity</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="participant_" name="id_participant" type="text" class="validate">
                    <label for="icon_prefix">Participant</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">description</i>
                    <input id="title_" name="title" type="text" class="validate">
                    <label for="icon_prefix">Title</label>
                </div>

            </div>

            <div class="row">



                <div class="input-field col s4">
                    <i class="material-icons prefix">language</i>
                    <input id="keywords_" name="keywords" type="text" class="validate">
                    <label for="icon_prefix">Keywords</label>
                </div>

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

            </div>

            <div class="row">

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

            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">

        </form>
    </div>
@stop

<script type="text/javascript">
    window.onload = function() {
        document.formHeader.action = "{{ route('crud.event.delete') }}";
    }
</script>
