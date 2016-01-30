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


        <form class="col s12" method="POST" action="{{ route('site.payment') }}">
          <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">
          <div class="row">

            <div class="card card-panel">
                <div class="input-field col s4">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="address" name="address" type="text" class="validate">
                    <label id="laddress" for="address">Address</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">credit_card</i>
                    <input id="city" name="city" type="text" class="validate">
                    <label id="city" for="city">City</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">email</i>
                    <input id="state" name="state" type="text" class="validate">
                    <label id="lstate" for="state">State</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">phone</i>
                    <input id="postalCode" name="postalCode" type="text" class="validate">
                    <label id="lpostalCode" for="postalCode">Postal Code</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">location_on</i>
                    <input id="country" name="country" type="text" class="validate">
                    <label id="lcountry" for="country">Country</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">lock</i>
                    <input id="phone" name="phone" type="text" class="validate">
                    <label id="lphone" for="phone">Phone</label>
                </div>





                <div class="input-field col s3">
                    <button type="submit" class="waves-effect waves-light green darken-4 btn">
                      <i class="material-icons left">input</i>
                      Insert
                    </button>
                </div>

                <div class="input-field col s3">
                  <button id="clearButton_" name="clearButton" class="waves-effect waves-light green darken-4 btn" onclick="clear();" >
                    <i class="material-icons left">delete</i>
                    Limpar
                  </button>
                </div>

              </div>
            </div>
      </form>
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
