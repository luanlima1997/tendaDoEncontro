<?php
session_start();
require_once ("aut/EMP_user.php");

$usuarioDAO = new usuarioDAO();

if (isset($_SESSION['logado']) ? $_SESSION['logado'] : NULL == 1) {
    ?>
    <script type="text/javascript">
        document.location.href = "index.php";
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Emperium Code">

    <title>Painel Administrativo - Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Custom Favicon -->
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <br>
                 <div align="center"><img src="img/logo-emperium-code.png"></div>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" align="center">Informe suas Credênciais</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" name="frmLogin">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Lembre-me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="btnSubmit" class="btn btn-lg btn-success btn-block" value="Entrar"/>
                            </fieldset>
                            <br>
                            <center><?php echo date('Y');?> Copyright © Emperium Code</center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php
if (isset($_POST['btnSubmit'])) {

    if ($usuarioDAO->login($_POST['email'],sha1($_POST['password']))) {

        $_SESSION['logado'] = '1';
        ?>

        <script type="text/javascript">
            document.location.href = "index.php";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Usuário ou senha inválido.");
        </script>
        <?php
    }
}

if (isset($_GET['erro'])) {
    switch ($_GET['erro']) {
        case "1":
            ?>
            <script type="text/javascript">
                alert("Você não tem permissão para acessar o painel.");
            </script>
            <?php
            break;
        case "2":
            ?>
            <script type="text/javascript">
                alert("Você saiu do painel.");
            </script>
            <?php
            break;
    }
}
?>
