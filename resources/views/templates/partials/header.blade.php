<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Starter Template - Materialize</title>

  <title>CTFlor - Control System</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/materialize.clockpicker.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!--  Scripts-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/materialize.clockpicker.js"></script>

</head>
<body>

<!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content" >
    <form id="formHeader" name="formHeader" method="POST" action="">
      <h4>Delete Register</h4>
      <p>Do you really wanna delete the register:</p>
      <p id="modalMSG"></p>
      <input type="hidden" id="modalMSGValue" name="modalMSGValue" value="">
      <p>Doing this you can't recovery this register again</p>
      <!--
      <p>If you are shure please, enter your password:</p>
  	  <i class="material-icons prefix">lock</i>
  	  <input id="passwordAuth" type="password" class="validate">
  	  <label class="active" for="passwordAuth">Senha</label>
      -->
    </div>
    <div class="modal-footer">
      <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Submit</button>
      <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
      <a class="modal-action modal-close waves-effect waves-red btn-flat ">Cancel</a>
    </div>
  </div>
