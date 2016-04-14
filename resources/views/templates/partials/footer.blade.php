  <footer class="page-footer green darken-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Engenharia Florestal Jr.</h5>
          <h6 class="white-text">Resumo:</h6>
          <p class="grey-text text-lighten-4">A Empresa Júnior do curso da Engenharia Florestal é uma empresa incubada pela UFSCar que fornece a comunidade eventos de relevância profissional e acadêmica.</p>
        </div>
      </div>
    </div>

    <div class="footer-copyright">
      <div class="container">
          Powered by <a class="brown-text text-lighten-3" href="http://optimizetechnology.wordpress.com">Optmize Tecnology</a> with Love
      </div>
    </div>
  </footer>

  <script>
    $(document).ready(function() {
      $('select').material_select();
    });

    $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15 // Creates a dropdown of 15 years to control year
    });

  </script>

  <script>
    $(document).ready(
      function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
      }
    );
  </script>

  <script type="text/javascript">
    function modalSetText(text){
      //alert('asdasd ' + text);
      document.getElementById('modalMSG').innerHTML = text;
      document.getElementById('modalMSGValue').value = text;
    }
  </script>


  </body>
</html>
