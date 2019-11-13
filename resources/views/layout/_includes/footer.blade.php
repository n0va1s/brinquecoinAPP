
<footer class="footer">
    <a href="https://brinquecoin.com">
        <strong>  Brinquecoin.com <i class="fa fa-mouse-pointer"></i>  </strong>
    </a>
</footer>

<style>
    .footer{
        grid-area: footer;
        background: cyan;

        position: fixed;
        width: 100%;
        height: 35px;
        bottom: 0px;

        z-index: 10;

        display: flex;
        justify-content: center;
        align-items: center;

    }

    .footer a{
        color: white;
    }

    .footer a:hover{
        text-decoration: none;
        color:#000;
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
    M.updateTextFields();
  });
</script>
</body>
</html>
