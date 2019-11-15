
</main>

<footer class="page-footer cyan">
  <div class="container">
    <div class="row"></div>
  </div>
    <div class="container">
      <a class="grey-text text-lighten-4 left" href="\">© 2019 brinquecoin.com</a>
      <a class="grey-text text-lighten-4 right" href="\">Termos de uso</a>
    </div>
</footer>

<style>
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    main {
        flex: 1 0 auto;
    }
</style>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
    $('select').formSelect();
    $('.modal').modal();
    M.updateTextFields();
    $('.collapsible').collapsible();
    $('input.autocomplete').autocomplete({
      data: {
        "Casa - Arrumar a cama": null,
        "Higiene - Escovar os dentes": null,
        "Escola - Fazer a tarefa de casa": 'https://placehold.it/250x250'
      },
    });
  });
</script>
</body>
</html>
