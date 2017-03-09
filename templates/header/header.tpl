<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">Inicio</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Estadisticas</a>
                    </li>
                    {if isset($usuario)}
                        <li>
                            <a href="#">Mantenimiento</a>
                        </li>
                        <li>
                            <a href="./preguntas.php">Preguntas</a>
                        </li>
                        <li class="pull-right">
                            <a href="./doLogout.php">Logout</a>
                        </li>
                    {else}
                        <li class="pull-right">
                            <a href="./login.php">Login</a>
                        </li>
                    {/if}
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>