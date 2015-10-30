@extends('templates.default')
@section('content')
	  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center green-text text-darken-3">CTFlor Cadastre-se Agora!</h1>
      <div class="row center">
        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
      </div>
      <br><br>

    </div>
  </div>


  <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>


  <div class="container">
    <div class="section">

      <div class="row">
      <form class="col s12">
        
        <div class="row">
        
          <div class="input-field col s4">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" class="validate">
            <label for="icon_prefix">First Name</label>
          </div>
          
          <div class="input-field col s4">
            <i class="material-icons prefix">phone</i>
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Telephone</label>
          </div>

          <div class="input-field col s4">
          <select>
            <option value="" disabled selected>Choose your option</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>Materialize Select</label>
      </div>
        
        </div>


      <div class="row">

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
          <div class="input-field col s4">
            <i class="material-icons prefix">phone</i>
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Telephone</label>
          </div>

        </div>

        <div class="row">
      
          <div class="input-field col s4">
            <i class="material-icons prefix">location_on</i>
            <input id="first_name2" type="text" class="validate">
          <label class="active" for="first_name2">Local</label>
          </div>
          <div class="input-field col s4">
            
            <p class="range-field"> 
              <input type="range" id="test5" min="0" max="300" value="Quantidade" />    
            </p>

          </div>
          <div class="input-field col s4">
            <i class="material-icons prefix">phone</i>
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Telephone</label>
          </div>

        </div>


      </form>
    </div>

    </div>

  </div>
@stop