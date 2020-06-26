</main>

<footer class="footer cyan">
    <div class="container">
        <div class="row"></div>
    </div>
    <div class="container">
        <div class="row center">
            <div class="col s6 m6">
                <a class="grey-text text-lighten-4 left" href="\">© 2019 brinquecoin.com</a>
            </div>
            <div class="col s6 m6">
                <a class="grey-text text-lighten-4 right" href="\">Termos de uso</a>
            </div>
        </div>
    </div>
</footer>
</body>
@jquery
@toastr_js
@toastr_render

<!-- PWA -->
<script>
    // Check that service workers are supported
if ('serviceWorker' in navigator) {
  // Use the window load event to keep the page load performant
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('/sw.js');
  });
}
</script>

<script src="/js/board.js"></script>
<script src=" {{ asset('/js/app.js') }}"></script>

<!-- PWA -->
<script src="/js/install.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown(
        { constrainWidth: false }
    );
    $('select').formSelect();
    $('.modal').modal();
    M.updateTextFields();
    $('.collapsible').collapsible();
    $('.tabs').tabs();
    $('.fixed-action-btn').floatingActionButton();
});
</script>

</html>
