@extends('site.templates.site_default')


@section('content')
<div class="container">
    @include('templates.partials.alerts')

    <h3> Cadastre-se na nossa plataforma agora mesmo!</h3>
    <br />
    <br />
    <div class="row">
        @if($errors->any())
            <div class="card-panel red waves-effect waves-light" role="alert">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif


        <form class="col s12" method="GET" action="{{ route('site.payment') }}">
          <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">
          <div class="row">


              <div class="input-field col s6">
                  <select id="type_" name="type">
                      <option>Escolha o seu pacote</option>
                  </select>
                  <label><i class="material-icons left">description</i>Comprar Pacote</label>
              </div>

              <div class="input-field col s3">
                  <i class="material-icons prefix">payment</i>
                  <input id="qnt_participants_" name="qnt_participants" type="number" class="validate" value="{{}}" readonly>
                  <label id="lqnt_participants" for="icon_telephone">Preço</label>
              </div>




              <div class="input-field col s3">
                  <button type="submit" class="waves-effect waves-light green darken-4 btn">
                    <i class="material-icons left">input</i>
                    Comprar
                  </button>
              </div>



        </div>
      </form>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/><br/>
    </div>
</div>
<script>
    $(document).ready(function() {
      $('select').material_select();
    });

    function clear()
    {
      document.getElementById("name_").value =  "";

      document.getElementById("cpf_").value = "";

      document.getElementById("email_").value = "";

      document.getElementById("phone_").value = "";

      document.getElementById("address_").value = "";

      document.getElementById("type_").value = "";

      document.getElementById("university_").value = "";

      document.getElementById("course_").value = "";

      document.getElementById("department_").value = "";

      document.getElementById("responsability_").value = "";
    }

</script>
@stop
