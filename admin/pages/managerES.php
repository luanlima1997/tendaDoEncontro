<?php

session_start();

require_once ("/aut/EMP_user.php");
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


$EMP_db = Conexao::EMP_getInstance();

$EMP_result = EMP_selectAll("manageres", $EMP_db);
foreach($EMP_result as $EMP_lineManager)
?> 
<!DOCTYPE html>
<html lang="pt-br">
<?php
    if (isset($_POST['alterar'])) {
        try{
        $atualiza = $EMP_db->prepare('UPDATE manageres SET slide1 = :slide1, slide2 = :slide2, slide3 = :slide3, slideTitle1 = :slideTitle1, slideTitle2 = :slideTitle2, slideTitle3 = :slideTitle3,
                                     slideSubtitle1 = :slideSubtitle1, slideSubtitle2 = :slideSubtitle2, slideSubtitle3 = :slideSubtitle3, phone = :phone, donationTitle = :donationTitle,
                                     donationSubtitle = :donationSubtitle, color = :color WHERE id = "1"');
        $atualiza->bindParam(':slide1', $_POST['slide1']);
        $atualiza->bindParam(':slide2', $_POST['slide2']);
        $atualiza->bindParam(':slide3', $_POST['slide3']);
        $atualiza->bindParam(':slideTitle1', $_POST['slideTitle1']);
        $atualiza->bindParam(':slideTitle2', $_POST['slideTitle2']);
        $atualiza->bindParam(':slideTitle3', $_POST['slideTitle3']);
        $atualiza->bindParam(':slideSubtitle1', $_POST['slideSubtitle1']);
        $atualiza->bindParam(':slideSubtitle2', $_POST['slideSubtitle2']);
        $atualiza->bindParam(':slideSubtitle3', $_POST['slideSubtitle3']);
        $atualiza->bindParam(':phone', $_POST['phone']);
        $atualiza->bindParam(':donationTitle', $_POST['donationTitle']);
        $atualiza->bindParam(':donationSubtitle', $_POST['donationSubtitle']);
        $atualiza->bindParam(':color', $_POST['color']);
        $atualiza->execute();
        ?>
            <script type="text/javascript">
                alert("Alterações realizadas com sucesso! :)");
            </script>
            <?php
             echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=managerBR.php'>";        
} catch (PDOException $ex) {
    ?>
            <script type="text/javascript">
                alert("Ops ocorreu algum erro, por favor tente novamente! :(");
            </script>
            <?php
            echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=managerBR.php'>";
   echo 'ERRO: '.$ex->getMessage();
}
}
?>  
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Emperium Code">

    <title>Painel Administrativo - Gerenciador de conteúdo ES</title>

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

    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    
    <!-- Custom Favicon -->
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon"> 

    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="css/jquery.fileupload.css">
    <link rel="stylesheet" href="css/jquery.fileupload-ui.css">

    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                    <h1 class="page-header">Gerenciador de conteúdo - ES</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
 
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-camera fa-fw"></i> Gerenciamento de imagens dos slides (#1,#2,#3)
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                <ul>
                <li>O tamanho máximo das imagens para uploads é de <strong>500KB</strong>.</li>
                <li>Somente imagens <strong>JPG</strong>.</li>
                <li>Você pode <strong>Arrastar e Soltar</strong> imagens do seu desktop nesta página.</li>
                <li>Respeite as nomenclaturas <strong>slide-1.jpg / slide-2.jpg e slide-3.jpg</strong></li>
                <li>Para os slides carregue no máximo<strong>3 (três) </strong>imagens.</li>
            </ul>

   <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="" method="POST" enctype="multipart/form-data">
        <!-- Redirect browsers with JavaScript disabled to the origin page -->
        <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="col-lg-7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Adicionar</span>
                    <input type="file" name="files[]" multiple>
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Carregar</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancelar</span>
                </button>
                <button type="button" class="btn btn-danger delete">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Deletar</span>
                </button>
                <input type="checkbox" class="toggle">
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
            <!-- The global progress state -->
            <div class="col-lg-5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress state -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    </form>
    <br>
</div>
<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processando...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Enviar</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancelar</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.icon_slidesUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.icon_slidesUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.icon_slidesUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Deletar</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancelar</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>                            
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <form method="post" action="" name="contactform" id="contactform">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-cog fa-fw"></i> Configurações Slide #1
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <div class="form-group">
                                            <label>Chamada</label>
                                            <input class="form-control" name="slide1" id="slide1" value="<?php echo $EMP_lineManager['slide1']?>" maxlength="50">
                                            <label>Título</label>
                                            <input class="form-control" name="slideTitle1" id="slideTitle1" value="<?php echo $EMP_lineManager['slideTitle1']?>" maxlength="50">
                                            <label>SubTítulo</label>
                                            <input class="form-control" name="slideSubtitle1" id="slideSubtitle1" value="<?php echo $EMP_lineManager['slideSubtitle1']?>" maxlength="50">                                                                                 
                                        </div>
                    </div>
                    </div>
                    </div>
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-cog fa-fw"></i> Configurações Slide #2
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <div class="form-group">
                                            <label>Chamada</label>
                                            <input class="form-control" name="slide2" id="slide2" value="<?php echo $EMP_lineManager['slide2']?>" maxlength="50">
                                            <label>Título</label>
                                            <input class="form-control" name="slideTitle2" id="slideTitle2" value="<?php echo $EMP_lineManager['slideTitle2']?>" maxlength="50">
                                            <label>SubTítulo</label>
                                            <input class="form-control" name="slideSubtitle2" id="slideSubtitle2" value="<?php echo $EMP_lineManager['slideSubtitle2']?>" maxlength="50">                                                                                 
                                        </div>
                    </div>
                    </div>
                    </div> 
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-cog fa-fw"></i> Configurações Slide #3
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <div class="form-group">
                                            <label>Chamada</label>
                                            <input class="form-control" name="slide3" id="slide3" value="<?php echo $EMP_lineManager['slide3']?>" maxlength="50">
                                            <label>Título</label>
                                            <input class="form-control" name="slideTitle3" id="slideTitle3" value="<?php echo $EMP_lineManager['slideTitle3']?>" maxlength="50">
                                            <label>SubTítulo</label>
                                            <input class="form-control" name="slideSubtitle3" id="slideSubtitle3" value="<?php echo $EMP_lineManager['slideSubtitle3']?>" maxlength="50">                                                                                 
                                        </div>
                    </div>
                    </div>
                    </div>                                         
                    <!-- config geral -->
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-cog fa-fw"></i> Geral
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <div class="form-group">
                                            <label>Título - Doação</label>
                                            <input class="form-control" name="donationTitle" id="donationTitle" value="<?php echo $EMP_lineManager['donationTitle']?>" maxlength="50">
                                            <label>SubTítulo - Doação</label>
                                            <input class="form-control" name="donationSubtitle" id="donationSubtitle" value="<?php echo $EMP_lineManager['donationSubtitle']?>" maxlength="50">  
                                            <label>Telefones</label>
                                            <input class="form-control" name="phone" id="phone" value="<?php echo $EMP_lineManager['phone']?>" maxlength="70">
                                            <label>Seleciona a cor</label>
                                            <select id="color" name="color" class="form-control" >
                                                <option value="<?php echo $EMP_lineManager['color']?>"><?php echo $EMP_lineManager['color']?></option>
                                                <option>vinho</option>
                                                <option>azul</option>
                                                <option>amarelo</option>
                                                <option>marrom</option>
                                                <option>verde</option>
                                                <option>preto e azul</option>
                                            </select>                                                                                                                    
                                        </div>
                    </div>
                    </div>
                    </div>
                                                            <div class="text-center">
                                <button type="submit" name="alterar" class="btn btn-primary btn-lg btn-responsive">Salvar  <i class="fa fa-save"></i></button>
                    <br>
                    </div>
                </form>
                </div>
                        <!-- /.panel-footer -->
            </div>
                    <!-- /.panel .chat-panel -->
        </div>
                <!-- /.col-lg-4 -->
    </div>
        <!-- /#page-wrapper -->
</div>
<!-- The blueimp Gallery widget -->

    <!-- /#wrapper -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
 <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- blueimp Gallery script -->
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="js/jquery.fileupload-ui.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
<!-- Morris Charts JavaScript -->
<script src="../bower_components/raphael/raphael-min.js"></script>
<script src="../bower_components/morrisjs/morris.min.js"></script>
<!--<script src="../js/morris-data.js"></script>-->
<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
<!-- The main application script -->
<script src="js/main_slides.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
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
