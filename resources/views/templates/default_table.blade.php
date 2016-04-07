@extends('templates.default')

@section('content')
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center green-text text-darken-3">Inscritos!</h1>
      <div class="row center">
        <h5 class="header col s12 light">Inscreva-se</h5>
      </div>
      <br><br>

	@include('templates.partials.alerts')

    </div>
  </div>

<div class="container">
    <div class="section">
		@yield('informations')
	</div>
</div>

<div class="row">
  

    <div class="row">
      <div class="col s6">
        	@yield('tableWithAll1')
      </div>

      <div class="col s6">
        <table class="bordered highlight">
        	@yield('tableWithSelected1')
        </table>
      </div>
    </div>


    <div class="row">
      <div class="col s6">
        <table class="bordered highlight">
        	@yield('tableWithAll2')
        </table>
      </div>

      <div class="col s6">
        <table class="bordered highlight">
        	@yield('tableWithSelected2')
        </table>
      </div>
    </div>
  
</div>

<div class="container">
    <div class="section">
		  <div class="row">      
        <div class="input-field col s3">
          <form method="POST">
            
            <button class="waves-effect waves-light btn" onclick="getData()"><i class="material-icons left">input</i>Salvar!</button>

            <input type="hidden" id="allData" name="allData" value="">

            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">

          </form>
        </div>
    </div>
	</div>
</div>	

@stop

<script>

    function moveL2R(element){

        var info = element.value;

        var infoSplited = info.split('&');

        var i = element.parentNode.parentNode.rowIndex;
        document.getElementById("LTable1").deleteRow(i);

        verifyParticipants();

        var table = document.getElementById("RTable1");

        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);

        cell1.innerHTML = infoSplited[0];
        cell2.innerHTML = infoSplited[1];
        cell3.innerHTML = infoSplited[2];

        cell4.innerHTML = "<button value="+infoSplited[0]+"&"+infoSplited[1]+"&"+infoSplited[2]+" class='waves-effect waves-red btn' onclick='moveR2L(this)'> << </button>";        
    }


    function verifyParticipants(){

        if(document.getElementById("LTable1").getElementsByTagName('tr').length == 1){
            document.getElementById("partN").style.visibility="visible";
        }
        else{
            document.getElementById("partN").style.visibility="hidden";
        }


        if(document.getElementById("RTable1").getElementsByTagName('tr').length == 1){
           document.getElementById("part").style.visibility="visible";
        }
        else{
            document.getElementById("part").style.visibility="hidden";
        }
    }
    
    function moveR2L(element){

        var info = element.value;

        var infoSplited = info.split('&');

        var i = element.parentNode.parentNode.rowIndex;
        document.getElementById("RTable1").deleteRow(i);

        verifyParticipants();

        var table = document.getElementById("LTable1");

        var row = table.insertRow(1);

        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        cell1.innerHTML = infoSplited[0];
        cell2.innerHTML = infoSplited[1];
        cell3.innerHTML = infoSplited[2];
        cell4.innerHTML = "<button value="+infoSplited[0]+"&"+infoSplited[1]+"&"+infoSplited[2]+" class='waves-effect waves-green btn' onclick='moveL2R(this)'> >> </button>";
    }
</script>

<script>

  function getData(){
    //alert('enter');
    var data = document.getElementById("RTable1").getElementsByTagName('tr');//tbody

    var tam = data.length;

    var idA = document.getElementById('idActivity').value;

    alert(idA);


    var str = idA + '&';

    var i;
    for(i = 0; i < tam; i++){
      //alert(data[i].getElementsByTagName('td')[0] );
      //alert(i + ' ' + ' ' +  (typeof data[i].getElementsByTagName('td')[0] === 'undefined'));
      if((typeof data[i].getElementsByTagName('td')[0] !== 'undefined')){
        str += data[i].getElementsByTagName('td')[1].innerHTML + "&";
        //alert(data[i].getElementsByTagName('td')[1].innerHTML);
      }
    }

    document.getElementById('allData').value = str;
    alert('>' + str + '<');

  }
</script>