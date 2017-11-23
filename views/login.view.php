<!DOCTYPE html>
<html lang="es">
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/jquery.dataTables.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" type="png" href="img/favicon.png" /> 
    <title>LitoApps</title>
</head>

<body>
    <main class="container">
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col s12 m4 offset-m4 center">
                <img class="responsive-img" src="images/logo_b.png" alt="Litoprocess">
            </div>
        </div>

        <br><br>

        <form method="POST" class="formulario" id="login" name="login">

            <div class="row">

                <div class="input-field col s12 m4 offset-m4">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="usuario" name="usuario" type="text" class="validate">
                    <label for="icon_prefix">Usuario</label>
                </div>

            </div>
            <div class="row">

                <div class="input-field col s12 m4 offset-m4">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="password" name="password" type="password" class="validate">
                    <label for="icon_prefix">Contraseña</label>
                </div>

            </div>
            <div class="row">
                <div class="col m4 s12 offset-m4 center">
                    <button class="btn waves-effect waves-light" type="submit" name="action">
						Entrar
					</button>
                </div>
            </div>
        </form>
    </main>

    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/login.js"></script>

</body>
</html>
