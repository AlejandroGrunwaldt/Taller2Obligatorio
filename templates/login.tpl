<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Pagina imobiliaria Taller 2">
        <meta name="author" content="Alejandro Gruwaldt & Juan B Heber">
        <title>Login</title>
        <!-- Bootstrap Core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/signin.css" rel="stylesheet">
    </head>
    <body>
      <div class="container">
        <form class="form-signin" method="POST" action="./doLogin.php">
          <h2 class="form-signin-heading">Ingrese sus credenciales</h2>
          <label for="inputEmail" class="sr-only">Usuario</label>
          <input type="text" id="usuario" class="form-control" placeholder="Usuario" required="" autofocus="" name="usuario">
          <label for="inputPassword" class="sr-only">Clave</label>
          <input type="password" id="clave" class="form-control" placeholder="Contraseña" required="" name="clave">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="recordar"> Recordarme
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesion</button>
          {if isset($error)}
              <div class="row" id="errorLogin">Usario/Clave incorrectos</div> 
          {/if}
        </form>
      </div> 
      <!-- /container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>