@extends('templates.default')
@section('content')
	  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">CTFlor Cadastre-se Agora!</h1>
      <div class="row center">
        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
      </div>
      <div class="row center">
        <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a>
      </div>
      <br><br>
 
    </div>
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
                <div class="input-field col s6">
                        <label class="light-blue-text darken-4">From</label>
                <input type="date" class="datepicker" class="light-blue-text darken-4">
                </div>
                <div class="input-field col s6">
                        <label class="light-blue-text darken-4">To</label>
                <input type="date" class="datepicker" class="light-blue-text darken-4">
                </div>
                <div class="input-field col s6">
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