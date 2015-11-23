@extends('templates.default_table')

@section('informations')
    <div class="row">
    	<div class="input-field col s3">
            <select>
    	        <option value="Choose one activity" disabled selected>Choose one activity</option>
    	        @foreach($activities as $activity)
    	        	<option value="{{$activity->name}}">{{$activity->name}}</option>
    	        @endforeach
            </select>
            <label>Activities</label>
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

    <h5>Responsáveis Não Inscritos</h5>

    @if(($responsableNotInsc == null) || ($responsableNotInsc->count() == 0))
        Não existem responsáveis não inscritos nessa palestra.
    @else
        <table class="bordered highlight">
			<thead>
				<tr>
					<th data-field="name">Nome</th>
					<th data-field="cpf">CPF</th>
					<th data-field="type">Tipo</th>
					<th data-field="type">Selecionar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($responsableNotInsc as $responsableN)
					<tr>
		            	<td> {{$responsableN->name}} </td>
		            	<td> {{$responsableN->cpf}} </td>
		            	<td> {{$responsableN->type}} </td>
		            	<td> <button class="waves-effect waves-green btn"> >> </button></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@stop

@section('tableWithSelected1')

    <h5>Responsáveis Inscritos</h5>

    @if(($responsableInsc == null) || ($responsableInsc->count() == 0))
        Não existem responsáveis inscritos nessa palestra.
    @else
        <table class="bordered highlight">
			<thead>
				<tr>
					<th data-field="name">Nome</th>
					<th data-field="cpf">CPF</th>
					<th data-field="type">Tipo</th>
					<th data-field="type">Deselecionar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($responsableInsc as $responsable)
					<tr>
		            	<td> {{$responsable->name}} </td>
		            	<td> {{$responsable->cpf}} </td>
		            	<td> {{$responsable->type}} </td>
		            	<td> <button class="waves-effect waves-red btn"> << </button></td>
					</tr>
		    	@endforeach
			</tbody>
		</table>
	@endif
@stop

@section('tableWithAll2')
@stop

@section('tableWithSelected2')
@stop