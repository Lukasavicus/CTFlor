@extends('templates.default_table')

@section('informations')
    <div class="row">
    	<div class="input-field col s3">
            <select>
    	        <option value="Choose one event" disabled selected>Choose one event</option>
    	        @foreach($events as $event)
    	        	<option value="{{$event->name}}">{{$event->name}}</option>
    	        @endforeach
            </select>
            <label>Events</label>
        </div>

        <div class="input-field col s3">
            <select>
    	        <option value="" disabled selected>Choose your option</option>
    	        <option value="1">Option 1</option>
    	        <option value="2">Option 2</option>
    	        <option value="3">Option 3</option>
            </select>
            <label>Filters</label>
        </div>
    </div>
@stop

@section('tableWithAll1')
	<thead>
		<tr>
			<th data-field="name">Nome</th>
			<th data-field="start">Inicio</th>
			<th data-field="end">Fim</th>
			<th data-field="location">Localização</th>
			<th data-field="type">Tipo</th>
			<th data-field="button">Selecionar</th>
		</tr>
	</thead>
	<tbody>
		@foreach($activNotInsc as $activityN)
			<tr>
            	<td> {{$activityN->name}} </td>
            	<td> {{$activityN->start}} </td>
            	<td> {{$activityN->end}} </td>
            	<td> {{$activityN->location}} </td>
            	<td> {{$activityN->type}} </td>
            	<td> <button> >> </button></td>
			</tr>
		@endforeach
	</tbody>
@stop

@section('tableWithSelected1')
	<thead>
		<tr>
			<th data-field="name">Nome</th>
			<th data-field="start">Inicio</th>
			<th data-field="end">Fim</th>
			<th data-field="location">Localização</th>
			<th data-field="type">Tipo</th>
			<th data-field="button">Selecionar</th>
		</tr>
	</thead>
	<tbody>
		@foreach($activInsc as $activity)
			<tr>
            	<td> {{$activity->name}} </td>
            	<td> {{$activity->start}} </td>
            	<td> {{$activity->end}} </td>
            	<td> {{$activity->location}} </td>
            	<td> {{$activity->type}} </td>
            	<td> <button> >> </button></td>
			</tr>
		@endforeach
	</tbody>
@stop

@section('tableWithAll2')
@stop

@section('tableWithSelected2')
@stop

@section('options')
	<button> Save </button>
	<button> Clear </button>
@stop