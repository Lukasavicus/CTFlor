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
        <form class="col s12">
        
            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix">toc</i>
                    <input id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Name of Activity</label>
                </div>
                  
                <div class="input-field col s4">
                    <i class="material-icons prefix">today</i>
                    <label class="light-blue-text darken-4">From</label>
                    <input type="date" class="datepicker" class="light-blue-text darken-4">
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">today</i>
                    <label class="light-blue-text darken-4">To</label>
                    <input type="date" class="datepicker" class="light-blue-text darken-4">
                </div>
            </div>


            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix">room</i>
                    <input id="icon_telephone" type="text" class="validate">
                    <label for="icon_telephone">Location</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="icon_telephone" type="number" class="validate">
                    <label for="icon_telephone">Quantity of Participants</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">schedule</i>
                    <input id="first_name2" type="time" class="validate">
                    <label class="active" for="first_name2">Duration</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s4">
                    <select>
                        <option value="" disabled selected>Choose your option</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label><i class="material-icons left">description</i>Materialize Select</label>
                </div>

                <div class="input-field col s4">
                    <a href="#!" class="waves-effect waves-light btn"><i class="material-icons left">info_outline</i>Save</a>
                </div>

                <div class="input-field col s4">
                    <a href="#!" class="waves-effect waves-light btn"><i class="material-icons left">info_outline</i>Clear fields</a>
                </div>
            </div>

        </form>
    </div>
@stop

@section('elements')

    @if($activities == null)
        <div class="card-panel red waves-effect waves-light" role="alert">
            "Nenhum evento foi cadastrado ainda."
        </div>
    @else
        <ul class="collection">
        @foreach($activities as $activity)
            <li class="collection-item avatar">
                <i class="material-icons circle">toc</i>
                <span class="title">{{ $activity->name }}</span>
                <p>
                    <i class="material-icons">today</i>
                    <i class="material-icons">today</i>
                    <i class="material-icons">room</i>
                    <i class="material-icons">perm_identity</i>
                    <i class="material-icons">schedule</i>
                    <i class="material-icons">description</i>
                </p>
                <br>
                <a href="#!" class="waves-effect waves-light btn"><i class="material-icons left">info_outline</i>Edit</a>
                <a href="#!" class="waves-effect waves-light btn"><i class="material-icons left">delete</i>Delete</a>
            </li>
        @endforeach
        </ul>
    @endif
@stop