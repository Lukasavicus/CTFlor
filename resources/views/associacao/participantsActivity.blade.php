@extends('templates.default_table')

@section('informations')
    <div class="row">
    	<div class="input-field col s3">
            <select id="idActivity">
    	        <option value="Choose one activity" disabled selected>Escolha uma Atividade</option>
    	        @foreach($activities as $activity)
    	        	<option value="{{$activity->id}}">{{$activity->name}}</option>
    	        @endforeach
            </select>
            <label>Atividades</label>
        </div>

        <div class="input-field col s3">
            <select>
    	        <option value="" disabled selected>Escolha a sua opção</option>
    	        <option value="1">Option 1</option>
    	        <option value="2">Option 2</option>
    	        <option value="3">Option 3</option>
            </select>
            <label>Filters</label>
        </div>
    </div>
@stop

@section('tableWithAll1')

    <h5>Participantes Não Inscritos</h5>

    <table class="bordered highlight" id="LTable1">
        <thead>
            <tr>
                <th data-field="name">Nome</th>
                <th data-field="cpf">CPF</th>
                <th data-field="type">Tipo</th>
                <th data-field="type">Selecionar</th>
            </tr>
        </thead>
    @if(($partNotInsc == null) || ($partNotInsc->count() == 0))
        </table>
        <p id="partN" style="visibility:visible"> Não existem participantes não inscritos nessa palestra.</p>
    @else
        <tbody>
            @foreach($partNotInsc as $participantN)
                <tr>
                    <td> {{$participantN->name}} </td>
                    <td> {{$participantN->cpf}} </td>
                    <td> {{$participantN->type}} </td>
                    <td> <button value="{{$participantN->name}}&{{$participantN->cpf}}&{{$participantN->type}}" class="waves-effect waves-green btn" onclick="moveL2R(this)"> >> </button></td>
                </tr>
            @endforeach
        </tbody>
        </table>
        <p id="partN" style="visibility:hidden"> Não existem participantes não inscritos nessa palestra.</p>
    @endif
@stop

@section('tableWithSelected1')

    <h5>Participantes Inscritos</h5>

    <table class="bordered highlight" id="RTable1">
        <thead>
            <tr>
                <th data-field="name">Nome</th>
                <th data-field="cpf">CPF</th>
                <th data-field="type">Tipo</th>
                <th data-field="type">Deselecionar</th>
            </tr>
        </thead>

    @if(($partInsc == null) || ($partInsc->count() == 0))
        </table>
        <p id="part" style="visibility:visible"> Não existem participantes inscritos nessa palestra.</p>
    @else
        <tbody>
            @foreach($partInsc as $participant)
                <tr>
                    <td> {{$participant->name}} </td>
                    <td> {{$participant->cpf}} </td>
                    <td> {{$participant->type}} </td>
                    <td> <button value="{{$participant->name}}&{{$participant->cpf}}&{{$participant->type}}" class="waves-effect waves-red btn" onclick="moveR2L(this)"> << </button></td>
                </tr>
            @endforeach
        </tbody>
        </table>
        <p id="part" style="visibility:hidden"> Não existem participantes inscritos nessa palestra.</p>
    @endif
@stop

@section('tableWithAll2')
@stop

@section('tableWithSelected2')
@stop