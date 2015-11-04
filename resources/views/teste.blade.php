@extends('templates.default_table')

@section('informations')
    <div class="row">
    	<div class="input-field col s3">
            <select>
    	        <option value="Choose one activity" disabled selected>Choose one activity</option>
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
	<thead>
		<tr>
			<th data-field="name">Nome</th>
			<th data-field="cpf">CPF</th>
			<th data-field="type">Tipo</th>
			<th data-field="type">Selecionar</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
@stop

@section('tableWithSelected1')
	<thead>
		<tr>
			<th data-field="name">Nome</th>
			<th data-field="cpf">CPF</th>
			<th data-field="type">Tipo</th>
			<th data-field="type">Deselecionar</th>
		</tr>
	</thead>
	<tbody>
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