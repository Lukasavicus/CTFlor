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
                    <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">input</i>Inserir</button>
                </div>

            </div>

            <div class="row">

                <div class="input-field col s4">
                    <a href="#!" class="waves-effect waves-light btn"><i class="material-icons left">info_outline</i>Clear fields</a>
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