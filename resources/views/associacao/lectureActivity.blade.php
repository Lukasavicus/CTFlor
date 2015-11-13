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

    <h5>Palestrantes Não Inscritos</h5>

    <table class="bordered highlight" id="LTable1">
		<thead>
			<tr>
				<th data-field="name">Nome</th>
				<th data-field="cpf">CPF</th>
				<th data-field="type">Tipo</th>
				<th data-field="type">Selecionar</th>
			</tr>
		</thead>
    @if(($speakerNotInsc == null) || ($speakerNotInsc->count() == 0))
        </table>
        <p id="partN" style="visibility:visible"> Não existem palestrantes não inscritos nessa palestra.</p>
    @else
    	<tbody>
			@foreach($speakerNotInsc as $speakerN)
				<tr>
	            	<td> {{$speakerN->name}} </td>
	            	<td> {{$speakerN->cpf}} </td>
	            	<td> {{$speakerN->type}} </td>
	            	<td> <button value="{{$speakerN->name}}&{{$speakerN->cpf}}&{{$speakerN->type}}" class="waves-effect waves-green btn" onclick="moveL2R(this)"> >> </button></td>
				</tr>
			@endforeach
		</tbody>
		</table>
		<p id="partN" style="visibility:hidden"> Não existem palestrantes não inscritos nessa palestra.</p>
	@endif
@stop

@section('tableWithSelected1')

    <h5>Palestrantes Inscritos</h5>

    <table class="bordered highlight" id="RTable1">
		<thead>
			<tr>
				<th data-field="name">Nome</th>
				<th data-field="cpf">CPF</th>
				<th data-field="type">Tipo</th>
				<th data-field="type">Deselecionar</th>
			</tr>
		</thead>

    @if(($speakerInsc == null) || ($speakerInsc->count() == 0))
        </table>
        <p id="part" style="visibility:visible"> Não existem palestrantes inscritos nessa palestra.</p>
    @else
		<tbody>
			@foreach($speakerInsc as $speaker)
				<tr>
	            	<td> {{$speaker->name}} </td>
	            	<td> {{$speaker->cpf}} </td>
	            	<td> {{$speaker->type}} </td>
	            	<td> <button value="{{$speaker->name}}&{{$speaker->cpf}}&{{$speaker->type}}" class="waves-effect waves-red btn" onclick="moveR2L(this)"> << </button></td>
				</tr>
	    	@endforeach
		</tbody>
		</table>
		<p id="part" style="visibility:hidden"> Não existem palestrantes inscritos nessa palestra.</p>
	@endif
@stop

@section('tableWithAll2')

    <h5>Membros da Banca Não Inscritos</h5>

    <table class="bordered highlight" id="LTable2">
		<thead>
			<tr>
				<th data-field="name">Nome</th>
				<th data-field="cpf">CPF</th>
				<th data-field="type">Tipo</th>
				<th data-field="type">Selecionar</th>
			</tr>
		</thead>

    @if(($judgeNotInsc == null) || ($judgeNotInsc->count() == 0))
        </table>
        <p id="partN2" style="visibility:visible"> Não existem membros da banca não inscritos nessa palestra.</p>
    @else
		<tbody>
			@foreach($judgeNotInsc as $judgeN)
				<tr>
	            	<td> {{$judgeN->name}} </td>
	            	<td> {{$judgeN->cpf}} </td>
	            	<td> {{$judgeN->type}} </td>
	            	<td> <button value="{{$judgeN->name}}&{{$judgeN->cpf}}&{{$judgeN->type}}" class="waves-effect waves-green btn" onclick="moveL2R2(this)"> >> </button></td>
				</tr>
			@endforeach
		</tbody>
		</table>
		<p id="partN2" style="visibility:hidden"> Não existem membros da banca não inscritos nessa palestra.</p>
	@endif
@stop

@section('tableWithSelected2')

    <h5>Membros da Banca Inscritos</h5>

    <table class="bordered highlight" id="RTable2">
		<thead>
			<tr>
				<th data-field="name">Nome</th>
				<th data-field="cpf">CPF</th>
				<th data-field="type">Tipo</th>
				<th data-field="type">Deselecionar</th>
			</tr>
		</thead>

    @if(($judgeInsc == null) || ($judgeInsc->count() == 0))
        </table>
        <p id="part2" style="visibility:visible"> Não existem membros da banca inscritos nessa palestra.</p>
    @else
		<tbody>
			@foreach($judgeInsc as $judge)
				<tr>
	            	<td> {{$judge->name}} </td>
	            	<td> {{$judge->cpf}} </td>
	            	<td> {{$judge->type}} </td>
	            	<td> <button value="{{$judge->name}}&{{$judge->cpf}}&{{$judge->type}}" class="waves-effect waves-red btn" onclick="moveR2L2(this)"> << </button></td>
				</tr>
	    	@endforeach
		</tbody>
		</table>
        <p id="part2" style="visibility:hidden"> Não existem membros da banca inscritos nessa palestra.</p>
	@endif
@stop

<script>
    function moveL2R2(element){

        var info = element.value;

        var infoSplited = info.split('&');

        var i = element.parentNode.parentNode.rowIndex;
        document.getElementById("LTable2").deleteRow(i);

        verifyParticipants();

        var table = document.getElementById("RTable2");

        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);

        cell1.innerHTML = infoSplited[0];
        cell2.innerHTML = infoSplited[1];
        cell3.innerHTML = infoSplited[2];

        cell4.innerHTML = "<button value="+infoSplited[0]+"&"+infoSplited[1]+"&"+infoSplited[2]+" class='waves-effect waves-red btn' onclick='moveR2L2(this)'> << </button>";        
    }


    function verifyParticipants(){

        if(document.getElementById("LTable2").getElementsByTagName('tr').length == 1){
            document.getElementById("partN2").style.visibility="visible";
        }
        else{
            document.getElementById("partN2").style.visibility="hidden";
        }


        if(document.getElementById("RTable2").getElementsByTagName('tr').length == 1){
           document.getElementById("part2").style.visibility="visible";
        }
        else{
            document.getElementById("part2").style.visibility="hidden";
        }
    }
    
    function moveR2L2(element){

        var info = element.value;

        var infoSplited = info.split('&');

        var i = element.parentNode.parentNode.rowIndex;
        document.getElementById("RTable2").deleteRow(i);

        verifyParticipants();

        var table = document.getElementById("LTable2");

        var row = table.insertRow(1);

        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        cell1.innerHTML = infoSplited[0];
        cell2.innerHTML = infoSplited[1];
        cell3.innerHTML = infoSplited[2];
        cell4.innerHTML = "<button value="+infoSplited[0]+"&"+infoSplited[1]+"&"+infoSplited[2]+" class='waves-effect waves-green btn' onclick='moveL2R2(this)'> >> </button>";
    }
</script>