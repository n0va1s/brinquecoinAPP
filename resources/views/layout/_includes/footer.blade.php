
</main>

<footer class="footer cyan">
  <div class="container">
    <div class="row"></div>
  </div>
    <div class="container">
      <a class="grey-text text-lighten-4 left" href="\">© 2019 brinquecoin.com</a>
      <a class="grey-text text-lighten-4 right" href="\">Termos de uso</a>
    </div>
</footer>

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
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        container: 'body',
        minDate: new Date(),
        i18n: {
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
            today: 'Hoje',
            clear: 'Limpar',
            cancel: 'Sair',
            done: 'Confirmar',
            labelMonthNext: 'Próximo mês',
            labelMonthPrev: 'Mês anterior',
            labelMonthSelect: 'Selecione um mês',
            labelYearSelect: 'Selecione um ano',
            selectMonths: true,
            selectYears: 15,
        },
    });
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
