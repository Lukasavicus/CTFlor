<script type="text/javascript">
    $(document).ready(function() {
      $('select').material_select();
    });

    $('.datepicker').pickadate({
      selectMonths: true,
      selectYears: 15
    });

    $(document).ready(
      function()
      {
        $('.modal-trigger').leanModal();
      }
    );


    $(document).ready(function(){
            $('#cpf_').focusout(function() {

                console.log("Fired CPF function");

                var reg_exp = /^([0-9]{3,3})\.([0-9]{3,3})\.([0-9]{3,3})\-([0-9]{2,2})$/;

                if (reg_exp.exec($('#cpf_').val()) === null && $('#cpf_').val()) {
                    $('#span-cpf').fadeIn(1000, function() {
                        $(this).html('Erro CPF:');
                    });

                    $('#span-cpf').fadeIn('slow', function() {
                        $(this).html('Informe um CPF válido.');
                    });
                } else {
                    $('#span-cpf').fadeOut(1000, function() {
                        $(this).html('');
                    });
                    $('#span-cpf').fadeOut(1000, function() {
                        $(this).html('');
                    });
                }

            });

            $('#password_1').focusout(function() {
                if ($('#password_').val()!== $('#password_1').val()) {

                    $('#span-password').fadeIn('slow', function() {
                        $(this).html('Senha e confirmação divergem.');
                    });
                }
            });

            $('#type_').on('change', function(){
                if($('#type_').val() == "professor"){
                    $(".hide-dep").show();
                    $(".hide-curso").hide();
                }else if $('#type_').val() == "student"){
                    $(".hide-curso").show();
                    $(".hide-dep").hide();
                }else{
                    $(".hide-curso").hide();
                      $(".hide-dep").hide();
                }
            });
      });



    function modalSetText(text)
    {
      document.getElementById('modalMSG').innerHTML = text;
      document.getElementById('modalMSGValue').value = text;
    }
</script>
