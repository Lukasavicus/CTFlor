
<script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
  });

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });

  $(document).ready(
    function()
    {
      $('.modal-trigger').leanModal();
    }
  );

  var jq = $.noConflict();
      jq(document).ready(function() {

       jq(".button-collapse").sideNav();


            jq("#type_").on("change",function(){
                if(jq(this).val()== 'professor'){
                    jq('.hide-curso').hide();
                    jq('.hide-dep').show();
                }
                if(jq(this).val()== 'student'){
                    jq('.hide-dep').hide();
                    jq('.hide-curso').show();
                }
            });

      jq("#cpf_").blur(function(){
        TestaCPF($this.val());
      });


      jq("#password_1").blur(function(){
          if(jq(this).val() != document.getElementById("password_").value){
            jq('.hide-dep').hide();

          }
       });

      });



      function clear()
      {
        document.getElementById("name_").value =  "";

        document.getElementById("cpf_").value = "";

        document.getElementById("email_").value = "";

        document.getElementById("phone_").value = "";

        document.getElementById("address_").value = "";



        document.getElementById("university_").value = "";

        document.getElementById("course_").value = "";

        document.getElementById("department_").value = "";

        document.getElementById("responsability_").value = "";
      }

    function TestaCPF(strCPF)
    {
      var Soma;
      var Resto;
      Soma = 0;

      if (strCPF == "00000000000")
        return false;

      for (i=1; i<=9; i++)
        Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);

      Resto = (Soma * 10) % 11;

      if ((Resto == 10) || (Resto == 11))
        Resto = 0;

      if (Resto != parseInt(strCPF.substring(9, 10)) )
        return false;

      Soma = 0;

      for (i = 1; i <= 10; i++)
        Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);

      Resto = (Soma * 10) % 11;

      if ((Resto == 10) || (Resto == 11))
        Resto = 0;

      if (Resto != parseInt(strCPF.substring(10, 11) ) )
        return false;

      §return true;
    }

  function modalSetText(text)
  {
    document.getElementById('modalMSG').innerHTML = text;
    document.getElementById('modalMSGValue').value = text;
  }
</script>
