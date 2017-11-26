<?php

session_start();

require_once ("aut/EMP_user.php");
require_once("../../Connections/EMP_job.php");

if ($_SESSION['logado'] != 1) {
    ?>
    <script type="text/javascript">
        document.location.href = "login.php?erro=1";
    </script>
    <?php
} else {
    ?>
<?php 

//start contador de visitantes
$EMP_arquivo = "../../cont/"."acessos.txt";
$EMP_handle = fopen($EMP_arquivo, 'r+');
$EMP_acessos = fread($EMP_handle, 512);
fclose($EMP_handle);
// end contador de visitantes

$EMP_db = Conexao::EMP_getInstance();

$EMP_resultCaregory = EMP_select("categorys","categorys", $EMP_db);
$EMP_files = 0;
foreach($EMP_resultCaregory as $EMP_lineCategory){
    $EMP_dir = "fotos/categorias/";
    $EMP_aux = count(glob($EMP_dir.$EMP_lineCategory['categorys']."/*.*"));
    $EMP_files += $EMP_aux;    
}

$EMP_resultManager = EMP_select("qtEmails","managerbr", $EMP_db);
foreach($EMP_resultManager as $EMP_lineManager)
$qtEmails = $EMP_lineManager['qtEmails'];
?>

<?php

if (isset($_POST['apagar']) == 'Excluir'  ) {
    $EMP_resultDel = EMP_delete("notes", "id", $_POST['excluir'], $EMP_db);
    if($EMP_resultDel == 1){
        echo "<script> alert('Erro ao deletar, tente novamente!')</script>";
    }else{
        echo "<script> alert('Deletado com sucesso!')</script>";
    }
    header("Location: index.php");
}
?>

<?php
if (isset($_POST['cadastra']) == 'add' /*&& $_POST['text'] > '4'*/ && $_POST['text'] != '<br>') {
    $EMP_string = $_POST['text']; 
    if($EMP_string != null){
    $EMP_numero = 24;
    $EMP_trunk = "";
    $EMP_comeco = 0;
      
    $size = strlen($EMP_string);
    $EMP_repeticao = intval($size / $EMP_numero); 
    for($i=0;$i<$EMP_repeticao+1;$i++){  
        $EMP_trunk = $EMP_trunk . substr($EMP_string,$EMP_comeco,$EMP_numero) . "<br>";  
        $EMP_comeco = $EMP_comeco + $EMP_numero;  
    } 
    $EMP_data = date('Y-m-d H:i:s.u');
    $cadastraNotes =$EMP_db->prepare('INSERT INTO notes (texto,data) VALUES (:texto, :data)');
    $cadastraNotes->bindParam(':texto', $EMP_trunk);
    $cadastraNotes->bindParam(':data', $EMP_data);
    $cadastraNotes->execute();
    header("Location: index.php");
}
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

    <title>Painel Administrativo - Gerencial</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Custom Favicon -->
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" title="Business Solution" href="http://www.emperiumcode.com">Emperium Code - Gerencial</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" title="WebMail" href="https://gmail.com/">
                        <i class="fa fa-envelope fa-fw"></i>
                    </a>
                <li class="dropdown">
                    <a class="dropdown-toggle" title="Notificações" href="">
                        <i class="fa fa-bell fa-fw"></i>
                    </a>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" title="Perfil" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?acao=sair"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Painel</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Gerencial<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="managerBR.php">BR</a>
                                </li>
                                <li>
                                    <a href="managerEUA.php">EUA</a>
                                </li>
                               <li>
                                    <a href="managerES.php">ES</a>
                                </li>                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-camera fa-fw"></i> Fotos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <?php
$EMP_ResultCategoryTwo = EMP_selectAll("categorys", $EMP_db);                            
foreach($EMP_ResultCategoryTwo as $EMP_lineCategory){
?>
                                <li>
                                    <a href="<?php echo $EMP_lineCategory['categorys']?>.php"><?php echo $EMP_lineCategory['categorys']?></a>
                                </li>
<?php
}
?>
                            </ul>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Painel Administrativo</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cloud upload fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $EMP_acessos ?></div>
                                    <div>Total de Acessos</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left">Desde 20/11/2017</span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-camera fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $EMP_files ?></div>
                                    <div>Total de fotos</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left">Álbum Virtual</span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $qtEmails?></div>
                                    <div>Total de emails</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left">Recebidos através do Site</span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-globe fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Suporte</div>
                                    <div>+55 (51) 9955-5141</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left">suporte@emperiumcode.com</span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-map-marker fa-fw"></i> Previsao do Tempo - Sul
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
<div class="embed-responsive embed-responsive-4by3">
<iframe class="embed-responsive-item" src="https://www.climatempo.com.br/tempo-no-seu-site/videos/selo/sul/640x480" allowfullscreen></iframe>
</div>
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <!-- /.panel -->
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-pencil fa-fw"></i>
                            Anotações
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="index.php">
                                            <i class="fa fa-refresh fa-fw"></i> Atualizar
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <form method="post" action="" enctype="multipart/form-data" name="contactform" id="contactform">
                            <fieldset>
                        <div class="panel-body">
                            <ul class="chat">
<?php
  $resultnotes = $EMP_db->prepare('SELECT * FROM notes ORDER BY id DESC');
   $resultnotes->execute();
   $EMP_lines = $resultnotes->fetchAll(PDO::FETCH_ASSOC);
    foreach($EMP_lines as $EMP_lineNotes){
?>                                
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="../../img/icon_chat.png" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Admin</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> <?php echo date("d/m H:i", strtotime($EMP_lineNotes['data'])) ?> <input type="hidden" name="apagar" value="excluir" /> <button class="btn btn-danger btn-sm"title="Excluir" name="excluir" id="excluir" value="<?php echo $EMP_lineNotes['id']?>">x</button>
                                            </small>
                                        </div>
                                        <br>
                                            <?php echo $EMP_lineNotes['texto'] ?>
                                    </div>
                                </li>
<?php
}
?>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="text" type="text" name="text" class="form-control input-sm" placeholder="Escreva seu lembrete aqui..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" name="cadastra" id="add">Enviar</button>
                                    <input type="hidden" name="cadastra" value="add" />
                                </span>
                            </fieldset>
                        </form>
                            </div>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <!--<script src="../js/morris-data.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>



</body>

</html>

    <?php
}

if (isset($_GET["acao"])) {

    if ($_GET["acao"] == "sair") {
        $_SESSION['logado'] = 0;
        ?>
        <script type="text/javascript">
            document.location.href = "login.php?erro=2";
        </script>
        <?php
    }
}
?>
