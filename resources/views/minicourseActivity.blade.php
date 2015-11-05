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

    <h5>Palestrantes Não Inscritos</h5>

    @if($speakerNotInsc == null)
        Não existem palestrantes não inscritos nessa palestra.
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
				@foreach($speakerNotInsc as $speakerN)
					<tr>
		            	<td> {{$speakerN->name}} </td>
		            	<td> {{$speakerN->cpf}} </td>
		            	<td> {{$speakerN->type}} </td>
		            	<td> <button class="waves-effect waves-green btn"> >> </button></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@stop

@section('tableWithSelected1')

    <h5>Palestrantes Inscritos</h5>

    @if($speakerInsc == null)
        Não existem palestrantes inscritos nessa palestra.
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
				@foreach($speakerInsc as $speaker)
					<tr>
		            	<td> {{$speaker->name}} </td>
		            	<td> {{$speaker->cpf}} </td>
		            	<td> {{$speaker->type}} </td>
		            	<td> <button class="waves-effect waves-red btn"> << </button></td>
					</tr>
		    	@endforeach
			</tbody>
		</table>
	@endif
@stop

@section('tableWithAll2')

    <h5>Membros da Banca Não Inscritos</h5>

    @if($judgeNotInsc == null)
        Não existem membros da banca não inscritos nessa palestra.
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
				@foreach($judgeNotInsc as $judgeN)
					<tr>
		            	<td> {{$judgeN->name}} </td>
		            	<td> {{$judgeN->cpf}} </td>
		            	<td> {{$judgeN->type}} </td>
		            	<td> <button class="waves-effect waves-green btn"> >> </button></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@stop

@section('tableWithSelected2')

    <h5>Membros da Banca Inscritos</h5>

    @if($judgeNotInsc == null)
        Não existem membros da banca inscritos nessa palestra.
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
				@foreach($judgeInsc as $judge)
					<tr>
		            	<td> {{$judge->name}} </td>
		            	<td> {{$judge->cpf}} </td>
		            	<td> {{$judge->type}} </td>
		            	<td> <button class="waves-effect waves-red btn"> << </button></td>
					</tr>
		    	@endforeach
			</tbody>
		</table>
	@endif
@stop