@extends('templates.default_table')

@section('informations')
    <div class="row">
    	<div class="input-field col s3">
            <select id="idActivity">
    	        <option value="Choose one activity" disabled selected>Choose one activity</option>
    	        @foreach($activities as $activity)
    	        	<option value="{{$activity->id}}">{{$activity->name}}</option>
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

    <table class="bordered highlight" id="LTable1">
		<thead>
			<tr>
				<th data-field="name">Nome</th>
				<th data-field="cpf">CPF</th>
				<th data-field="type">Tipo</th>
				<th data-field="type">Selecionar</th>
			</tr>
		</thead>

    @if(($responsableNotInsc == null) || ($responsableNotInsc->count() == 0))
        </table>
        <p id="partN" style="visibility:visible"> Não existem responsáveis não inscritos nessa palestra.</p>
    @else
		<tbody>
			@foreach($responsableNotInsc as $responsableN)
				<tr>
	            	<td> {{$responsableN->name}} </td>
	            	<td> {{$responsableN->cpf}} </td>
	            	<td> {{$responsableN->type}} </td>
                	<td> <button value="{{$responsableN->name}}&{{$responsableN->cpf}}&{{$responsableN->type}}" class="waves-effect waves-green btn" onclick="moveL2R(this)"> >> </button></td>
				</tr>
			@endforeach
		</tbody>
		</table>
        <p id="partN" style="visibility:hidden"> Não existem responsáveis não inscritos nessa palestra.</p>
	@endif
@stop

@section('tableWithSelected1')

    <h5>Responsáveis Inscritos</h5>

    <table class="bordered highlight" id="RTable1">
		<thead>
			<tr>
				<th data-field="name">Nome</th>
				<th data-field="cpf">CPF</th>
				<th data-field="type">Tipo</th>
				<th data-field="type">Deselecionar</th>
			</tr>
		</thead>

    @if(($responsableInsc == null) || ($responsableInsc->count() == 0))
        </table>
        <p id="part" style="visibility:visible"> Não existem responsáveis inscritos nessa palestra.</p>
    @else
		<tbody>
			@foreach($responsableInsc as $responsable)
				<tr>
	            	<td> {{$responsable->name}} </td>
	            	<td> {{$responsable->cpf}} </td>
	            	<td> {{$responsable->type}} </td>
                	<td> <button value="{{$responsable->name}}&{{$responsable->cpf}}&{{$responsable->type}}" class="waves-effect waves-red btn" onclick="moveR2L(this)"> << </button></td>
				</tr>
	    	@endforeach
		</tbody>
		</table>
        <p id="part" style="visibility:visible"> Não existem responsáveis inscritos nessa palestra.</p>
	@endif
@stop

@section('tableWithAll2')
@stop

@section('tableWithSelected2')
@stop