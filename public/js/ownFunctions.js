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

    function modalSetText(text)
    {
      document.getElementById('modalMSG').innerHTML = text;
      document.getElementById('modalMSGValue').value = text;
    }
</script>
