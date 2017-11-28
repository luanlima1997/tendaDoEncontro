<?php 

session_start(); 
// start contador de visitantes em arquivo
$EMP_arquivo = "cont/"."acessos.txt";
$EMP_handle = fopen($EMP_arquivo, 'r+');
$EMP_data = fread($EMP_handle, 512);
$EMP_cont = $EMP_data + 1;
fseek($EMP_handle, 0);
fwrite($EMP_handle, $EMP_cont);
fclose($EMP_handle);
// end contador de visitantes

// controle das categorias do album por session
$_SESSION['category'] = "";
require_once ('Connections/EMP_config.php');
require_once ('Connections/EMP_job.php');

$EMP_db = Conexao::EMP_getInstance();

$EMP_tableManager = "managerbr";
if(!isset($_COOKIE["lang"])) {
	require_once ("lang/pt.php"); }
elseif($_COOKIE["lang"] == "en") {
	require_once ("lang/en.php"); 
	$EMP_tableManager = "managereua"; }
elseif($_COOKIE["lang"] == "es") {
	require_once ("lang/es.php"); 
	$EMP_tableManager = "manageres"; }	
elseif($_COOKIE["lang"] == "pt") {
	require_once ("lang/pt.php"); }
$EMP_result = EMP_selectAll($EMP_tableManager, $EMP_db);
foreach($EMP_result as $EMP_lineManager)
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<!-- Start Meta Data -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo TITLEPAGE ?></title>
		<meta name="description" content="Tenda do encontro."> <!-- TODO: DESCRIÇÃO !!!! -->
		<meta name="keywords" content="tenda, tenda do encontro."/> <!-- TODO: MAIS PALAVRAS CHAVES !!!! -->
		<meta name="author" content=""> <!-- TODO: ?????? !!!! -->
		<!-- End Meta Data -->
		<!-- Start Meta Facebook -->
		<meta property="og:url" content="http://tendadoencontro.org" /> 
		<meta property="og:title" content="Tenda do encontro!" /> <!-- TODO: TITULO/DESCRIÇÃO !!!! -->
		<meta property="og:site_name" content="Tenda do Encontro" />
		<meta property="og:description" content="" /> <!-- TODO: DESCRIÇÃO !!!! -->
		<meta property="og:image" content="http://" /> <!-- TODO: ESCOLHER UMA IMAGEM - NO DIRETORIO DO SITE !!!! -->
		<meta property="og:image:type" content="image/jpg" /> <!-- TODO: ESCOLHER A EXTENSAO IMAGEM !!!! -->
		<meta property="og:image:width" content="1080" /> <!-- TODO: ESCOLHER A DIMENSAO !!!! -->
		<meta property="og:image:height" content="720" /> <!-- TODO: ESCOLHER A DIMENSAO !!!! -->
		<meta property="og:type" content="website" />
		<!-- End Meta Facebook -->
		<!-- Start Meta Twitter -->
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@user">  <!-- TODO: EXISTE? SE NÃO EXISTIR INSERIR WEBSITE? !!!! -->
		<meta name="twitter:title" content=""> <!-- TODO: TITULO/DESCRIÇÃO !!!! -->
		<meta name="twitter:description" content=""> <!-- TODO: DESCRIÇÃO !!!! -->
		<meta name="twitter:creator" content=""> <!-- TODO: ?????? !!!! -->
		<meta name="twitter:image" content="http://"> <!-- TODO: ESCOLHER UMA IMAGEM - NO DIRETORIO DO SITE !!!! -->
	    <!-- End Meta Twitter -->
		<!-- Start Meta Google+ -->
		<meta itemprop="name" content=""> <!-- TODO: TITULO !!!! -->
		<meta itemprop="description" content="Calçados e acessórios cheios de estilos."> <!-- TODO: DESCRIÇÃO !!!! -->
		<meta itemprop="image" content="http://"> <!-- TODO: ESCOLHER UMA IMAGEM - NO DIRETORIO DO SITE !!!! -->
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<!-- End Meta Google+ -->
		<!-- Start Web Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
		<!-- End Web Fonts -->
		<!-- Start files CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<!-- Font Awesome Icons css -->
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<!-- ionicons Icons css -->
		<link href="css/ionicons.min.css" rel="stylesheet">
		<!-- Liquid Slider 2 stlylesheet css -->
		<link rel="stylesheet" href="css/liquid-slider.css">
		<!-- blueimp Gallery styles -->
   		<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- YTPlayer stlylesheet -->
		<link href="css/YTPlayer.css" media="all" rel="stylesheet" type="text/css">
		<!-- Flexslider2 stlylesheet -->
		<link rel="stylesheet" href="css/flexslider.css">
		<!-- CubePortfolio stlylesheet -->
		<link rel="stylesheet" href="css/cubeportfolio.css">
		<!-- Custom stlylesheet -->
		<link href="css/style.css" rel="stylesheet">
		<!-- Skin Color -->
		<link rel="stylesheet" href="css/<?php echo $EMP_lineManager['color']?>.css" id="color-skins"/>
		<!-- End files CSS -->
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="js/jquery.tagcloud.js"></script>
		<script src="js/jqcloud.js"></script>
		<link href="css/jqcloud.css" rel="stylesheet">
		<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVHWCqf74nM-QB3OIGVGuMVpdYMog0qe8&callback=initMap" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

	</head>
	<body>

		<!-- Start Preloader -->
		<div class="animationload">
			<div class="loader"> <!-- TODO: DEFINIR/CRIAR UM NOVO LOADER(GIF) !!!! -->
				&nbsp;
			</div>
		</div>
		<!-- End Preloader -->
		<!-- Start Header -->
		<header id="fixed-navbar" class="header-top" style="z-index=999">
			<nav class="navbar navbar-default navbar-static-top" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
							<span class="sr-only">
								Toggle navigation
							</span>
							<span class="icon-bar">
							</span>
							<span class="icon-bar">
							</span>
							<span class="icon-bar">
							</span>
						</button>
						<img src="img/tendadoencontro_icon.png" width="205" height="30" class="navbar-brand" rel="home" alt="Tenda do Encontro" title="Tenda do Encontro">
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="main-nav">
						<ul class="nav navbar-nav  navbar-right">
							<li>
								<a href="#home-slideshow"><?php echo MENU1 ?></a>
							</li>
							<li>
								<a href="#photos"><?php echo MENU2 ?></a>
							</li>							
							<li>
								<a href="#about"><?php echo MENU4 ?></a>
							</li>
							<li>
								<a href="#events"><?php echo MENU5 ?></a>
							</li>														
							<li>
								<a href="#contact-form"><?php echo MENU6 ?></a>
							</li>
							<li>
								<a href="#map"><?php echo MENU7 ?></a>
							</li>
							<li>
								<a href="change_pt.php"> <img src="img/pt.png" width="20" title="PT" height="20"> </a>
							</li>
							<li>
								<a href="change_en.php"> <img src="img/en.png" title="EN" width="20" height="20"> </a>
							</li>		
							<li>
								<a href="change_es.php"> <img src="img/es.png" title="ES" width="20" height="20"> </a>
							</li>																					
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>
		</header>
		<!-- End Header -->
		<!-- Start Home -->
		<section id="home-slideshow" class="home-fullscreen-slider" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="">
			<div class="parallax-overlay">
			</div>
			<div class="home-container text-center">
				<div class="home-title liquid-slider" id="slider-home">
					<div>
						<h1>
							<small class="white">
								<?php echo $EMP_lineManager['slide1'] ?>
							</small>
							<br>
							<strong>
								<?php echo $EMP_lineManager['slideTitle1'] ?>
							</strong>
						</h1>
						<p class="lead">
							<?php echo $EMP_lineManager['slideSubtitle1'] ?>
						</p>
						<div class="home-btn">
							<h4 class="btn-home">
								<a href="#photos"><?php echo BUTTON_SLIDE1 ?><i class="fa fa-camera-retro"></i></a>
							</h4>
						</div>
					</div>
					<div>
						<h1>
							<small class="white">
								<?php echo $EMP_lineManager['slide2'] ?>
							</small>
							<br>
							<strong>
								<?php echo $EMP_lineManager['slideTitle2'] ?> 
							</strong>
						</h1>
						<p class="lead">
							<?php echo $EMP_lineManager['slideSubtitle2'] ?>
						</p>
						<div class="home-btn">
							<h4 class="btn-home">
								<a href="#home-slideshow"><?php echo BUTTON_SLIDE2 ?><i class="icon ion-heart"></i></a>
							</h4>
						</div>
					</div>
					<div>
						<h1>
							<small class="white">
								<?php echo $EMP_lineManager['slide3'] ?>
							</small>
							<br>
							<strong>
								<?php echo $EMP_lineManager['slideTitle3'] ?>
							</strong>
						</h1>
						<p class="lead">
							<?php echo $EMP_lineManager['slideSubtitle3'] ?>
						</p>
						<div class="home-btn">
							<h4 class="btn-home">
								<a href="#events"><?php echo BUTTON_SLIDE3 ?><i class="fa fa-file-text-o"></i></a>
							</h4>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Home -->
		<!-- Site Wrapper -->
		<div class="site-wrapper">
			<!-- Start Catalog -->
			<section id="photos">
				<div class="container">
					<div class="col-lg-12 section-title">
						<h2>
							<small>
								<?php echo TITLE1 ?>
							</small>
						</h2>
						<p class="lead">
							<?php echo SUBTITLE1 ?>
							<span class="highlight">
								<?php echo SUBTITLE1_2 ?>
							</span>
							<?php echo SUBTITLE1_3 ?>
						</p>
						<h2>
						<i class="fa fa-camera-retro"></i>
						</h2>
					</div>
					<div class=" ">
						<div id="filters-container" class="cbp-l-filters-button">
							<?php

$EMP_resultOne = EMP_selectAll("categorys", $EMP_db);
?>

<?php
$EMP_resultTwo = EMP_selectAll("categorys", $EMP_db);	
?>

<?php // MAIS FACIL DEIXAR EVENTOS FIXOS, ESTIPULAR ALGO GENERICO AQUI TEMOS ALGUNS FIXOS NO BANCO DE DADOS E COM PASTAS CRIADOS NO ADMIN
foreach($EMP_resultOne as $EMP_lineCategoryOne) {
	if(!isset($_COOKIE["lang"]) || $_COOKIE["lang"] == "pt") {
	if($EMP_lineCategoryOne['categorys'] == "Festas")
		$category_view = "Festas";
	if($EMP_lineCategoryOne['categorys'] == "Reforcos")
		$category_view = "Reforços";
	if($EMP_lineCategoryOne['categorys'] == "Brincadeiras")
		$category_view = "Brincadeiras";	
	if($EMP_lineCategoryOne['categorys'] == "Cursos")
		$category_view = "Cursos";
	}	
	else if($_COOKIE["lang"] == "en"){
	if($EMP_lineCategoryOne['categorys'] == "Festas")
		$category_view = "Festas";
	if($EMP_lineCategoryOne['categorys'] == "Reforcos")
		$category_view = "Reforços";
	if($EMP_lineCategoryOne['categorys'] == "Brincadeiras")
		$category_view = "Brincadeiras";	
	if($EMP_lineCategoryOne['categorys'] == "Cursos")
		$category_view = "Cursos";
	}
	else if($_COOKIE["lang"] == "es"){
	if($EMP_lineCategoryOne['categorys'] == "Festas")
		$category_view = "Festas";
	if($EMP_lineCategoryOne['categorys'] == "Reforcos")
		$category_view = "Reforços";
	if($EMP_lineCategoryOne['categorys'] == "Brincadeiras")
		$category_view = "Brincadeiras";	
	if($EMP_lineCategoryOne['categorys'] == "Cursos")
		$category_view = "Cursos";
	}
?>

<?php if($EMP_lineCategoryOne['categorys'] == "Festas" || $EMP_lineCategoryOne['categorys'] == "Festas" || $EMP_lineCategoryOne['categorys'] == "Festas"){ 
?>
							<div data-filter=".<?php echo $EMP_lineCategoryOne['categorys']?>" class="cbp-filter-item-active cbp-filter-item">
								<?php echo $category_view ?>
							</div>
<?php }else{ ?>
							<div data-filter=".<?php echo $EMP_lineCategoryOne['categorys']?>" class="cbp-filter-item">
								<?php echo $category_view ?>
							</div>
<?php
}
}
?>
						</div>
						<div id="grid-container" class="cbp-l-grid-projects">
							<ul class="grid cs-style-3">
	<?php 
	
foreach($EMP_resultTwo as $EMP_lineCategoryTwo) {
		$EMP_dir = "admin/pages/fotos/categorias/";
		$EMP_files = glob($EMP_dir.$EMP_lineCategoryTwo['categorys']."/*.*");
?>
	<?php
	$EMP_controller = 0;
	for ($i=0; $i<count($EMP_files); $i++) {
		$EMP_ref[$i] = substr($EMP_files[$i],0,-4);
		$EMP_ref[$i] = substr(strrchr($EMP_ref[$i], "/"), 1);			
		$num = $EMP_files[$i];
		$EMP_controller += 1;
		if($EMP_controller <= 9){
		?>
									<li class="cbp-item <?php echo $EMP_lineCategoryTwo['categorys']?>">
										<?php $catr = $EMP_lineCategoryTwo['categorys'] ?>
										<figure>
											<img src="<?php echo $EMP_files[$i]?>" alt="">
											<figcaption>
												<a href="<?php echo $EMP_files[$i]?>" class="cbp-lightbox" data-title="Referência: <?php echo $EMP_ref[$i]?>"><i class="fa fa-search fa-2x"></i></a>
											</figcaption>
										</figure>
									</li>
	<?php
	}
	}
	}
	?>

							</ul>
						</div>
            <div class="cbp-l-loadMore-button">
            	<form>
                <a href="#" onclick="this.href='loadMore.php?category='+$('#filters-container .cbp-filter-item-active').attr('data-filter');" class="cbp-l-loadMore-button-link"><?php echo BUTTON_CATALOG ?></a>
                </form>
            </div>
					</div>
				</div>
			</section>
			<!-- End Catalog -->
			<!-- Start About -->
			<section id="about">
				<div class="container content">
					<div class="col-lg-12 section-title-about">
						<h2>
							<small>
								<?php echo TITLE2 ?>
							</small>
						</h2>
						<p class="lead">
							<?php echo SUBTITLE2 ?>
							<span class="highlight">
								<?php echo SUBTITLE2_2 ?>
							</span>
							<br>
							<?php echo SUBTITLE2_3 ?>
						</p>
					</div>
					<img src="img/comunidade-logo.png" alt="" class="logo-comunity" style="">
					<a href="https://www.mundomaislimpo.org.br/" target="_blank">
						<img src="img/mundo-mais-limpo.jpg" class="mundo-mais-limpo-logo" alt="">
					</a>
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="about-row">
								<div class="about-icon">
									<i class="fa fa-eye ion-3x highlight" style="color:red;">
									</i>
								</div>
								<div class="about-info">
									<h4>
										<?php echo BLOC1_TITLE ?>
										<br>
										<small>
											<?php echo BLOC1_SUBTITLE ?>
										</small>
									</h4>
									<p class="about-description">
										<?php echo BLOC1_TEXT ?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="about-row">
								<div class="about-icon">
									<i class="fa fa-bullseye ion-3x highlight">
									</i>
								</div>
								<div class="about-info">
									<h4>
										<?php echo BLOC2_TITLE ?>
										<br>
										<small>
											<?php echo BLOC2_SUBTITLE ?>
										</small>
									</h4>
									<p class="about-description">
										<?php echo BLOC2_TEXT ?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="about-row">
								<div class="about-icon">
									<i class="fa fa-users ion-3x highlight" style="color:yellow;">
									</i>
								</div>
								<div class="about-info">
									<h4>
										<?php echo BLOC3_TITLE ?>
										<br>
										<small>
											<?php echo BLOC3_SUBTITLE ?>
										</small>
									</h4>
									<p class="about-description">
										<?php echo BLOC3_TEXT ?>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-6"></div>
					<div class="col-md-6 col-sm-6">
						  <div class="bs-example">
							<div id="demo-simple" class="demo"></div>
						  </div>
						


						<script>
											var words = [
							{text: "Lorem", weight: 13},
							{text: "Ipsum", weight: 10.5},
							{text: "Dolor", weight: 9.4},
							{text: "Sit", weight: 8},
							{text: "Amet", weight: 6.2},
							{text: "Consectetur", weight: 5},
							{text: "Adipiscing", weight: 5},
							{text: "Elit", weight: 5},
							{text: "Nam et", weight: 5},
							{text: "Leo", weight: 4},
							{text: "Sapien", weight: 4},
							{text: "Pellentesque", weight: 3},
							{text: "habitant", weight: 3},
							{text: "morbi", weight: 3},
							{text: "tristisque", weight: 3},
							{text: "senectus", weight: 3},
							{text: "et netus", weight: 3},
							{text: "et malesuada", weight: 3},
							{text: "fames", weight: 2},
							{text: "ac turpis", weight: 2},
							{text: "egestas", weight: 2},
							{text: "Aenean", weight: 2},
							{text: "vestibulum", weight: 2},
							{text: "elit", weight: 2},
							{text: "sit amet", weight: 2},
							{text: "metus", weight: 2},
							{text: "adipiscing", weight: 2},
							{text: "ut ultrices", weight: 2},
							{text: "justo", weight: 1},
							{text: "dictum", weight: 1},
							{text: "Ut et leo", weight: 1},
							{text: "metus", weight: 1},
							{text: "at molestie", weight: 1},
							{text: "purus", weight: 1},
							{text: "Curabitur", weight: 1},
							{text: "diam", weight: 1},
							{text: "dui", weight: 1},
							{text: "ullamcorper", weight: 1},
							{text: "id vuluptate ut", weight: 1},
							{text: "mattis", weight: 1},
							{text: "et nulla", weight: 1},
							{text: "Sed", weight: 1}
						];
	
	
						$( window ).load(function() {
						  // Run code
						  $('#demo-simple').jQCloud(words);
						});

						</script>
					
					
					</div>
				</div>
			</section>
			<!-- End About -->
	<!-- Donation section Starts -->
		<section id="home-slideshow" class="home-fullscreen-slider" data-stellar-background-ratio="0.7" data-stellar-vertical-offset="">
			<div class="parallax-overlay">
			</div>
			<div class="home-container text-center">
				<div class="home-title liquid-slider" id="slider-home">
					<div>
						<h2>
							<small class="white">
								<?php echo $EMP_lineManager['donationTitle'] ?>
							</small>
						</h2>
						<p class="lead">
							<?php echo $EMP_lineManager['donationSubtitle'] ?>
							<span class="highlight">
							</span>
						</p>
				</div>
					<div class="row">
						<div class="col-md-6 col-sm-6">
								<img src="img/donation1.svg" width="50" height="50" />
									<h4>
									<i class="fa fa-"></i>
										<?php echo BLOC1_DONATE_TITLE ?>
										<br>
										<small class="white">
											<?php echo BLOC1_DONATE_TEXT ?>

										</small>
										
									</h4>
						</div>
						<div class="col-md-6 col-sm-6">
								<img src="img/donation2.svg" width="50" height="50" />
									<h4>
										<?php echo BLOC2_DONATE_TITLE ?>
										<br>
										<small class="white">
											<?php echo BLOC2_DONATE_TEXT ?>
										</small>
									</h4>
						</div>
					</div>
					<br>
			</div>
		</div>
	</section>
	<!-- Video section Ends -->
			<!-- Start store -->
			<section id="events">
				<div class="container">
					<div class="col-lg-12 section-title-team">
						<h2>
							<small>
								<?php echo TITLE3 ?>
							</small>
						</h2>
						<p class="lead">
							<?php echo SUBTITLE3 ?>
							<span class="highlight">
								<?php echo SUBTITLE3_2 ?>
							</span>
						</p>
						<h2>
						<i class="fa fa-street-view"></i>
						</h2>
					</div>
					<div class="row row-events">
						<!-- event1 -->
						<div class="col-md-3 col-sm-3 animated fadeInUp visible events-slots" data-animation="fadeInUp" data-animation-delay="300">
							<div class="team-box text-center">
								<!-- img -->
								<img src="img/evento1.jpg" width="270" height="270" class="img-responsive center-text" alt="">
								<!-- Title -->
								<h4>
									ENCONTRO DE CRIANÇAS
								</h4>
								<h5>
									Brincadeiras Livres
								</h5>
								<p>
									Sábados 10h - 12h
								</p>
							</div>
						</div>
						<!-- event2 -->
						<div class="col-md-3 col-sm-3  animated fadeInUp visible events-slots" data-animation="fadeInUp" data-animation-delay="400">
							<div class="team-box text-center">
								<!-- img -->
								<img src="img/evento2.jpg" width="270" height="270" class="img-responsive center-text" alt="">
								<!-- Title -->
								<h4>
									REFORÇO ESCOLAR PARA CRIANÇAS
								</h4>
								<h5>
									Estudos extras!
								</h5>
								<p>
									Terças-Feiras 09h - 11h
								</p>
							</div>
						</div>
						<!-- event3 -->
						<div class="col-md-3 col-sm-3  animated fadeInUp visible events-slots" data-animation="fadeInUp" data-animation-delay="500">
							<div class="team-box text-center">
								<!-- img -->
								<img src="img/evento3.jpg" width="270" height="270" class="img-responsive center-text" alt="">
								<!-- Title -->
								<h4>
									MULHERES SONHADORAS
								</h4>
								<h5>
									Artesanato e partilha de vida
								</h5>
								<p>
									Sextas-Feiras 14h
								</p>
							</div>
						</div>
						<!-- event4 -->
						<div class="col-md-3 col-sm-3  animated fadeInUp visible events-slots" data-animation="fadeInUp" data-animation-delay="600">
							<div class="team-box text-center">
								<!-- img -->
								<img src="img/evento4.jpg" width="270" height="270" class="img-responsive center-text" alt="">
								<!-- Title -->
								<h4>
									ALFEBETIZAÇÃO DOS ADULTOS
								</h4>
								<h5>
									Ministrada por estagiários da Unisinos Educas
								</h5>
								<p>
									Sextas-Feiras 9h
								</p>
							</div>
						</div>
						<!-- event5 -->
						<div class="col-md-3 col-sm-3  animated fadeInUp visible events-slots" data-animation="fadeInUp" data-animation-delay="600">
							<div class="team-box text-center">
								<!-- img -->
								<img src="img/evento5.jpg" width="270" height="270" class="img-responsive center-text" alt="">
								<!-- Title -->
								<h4>
									MENINAS SONHADORAS
								</h4>
								<h5>
									Momento das adolescentes
								</h5>
								<p>
									Sábados 13h - 15h
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End store -->
			<!-- Start Separator Testimonials -->
			<section id="separator-testimonials" data-stellar-background-ratio="0.7">
				<div class="row text-center" style="position:relative;">
					<div class="parallax-overlay">
					</div>
					<div class="liquid-slider" style="z-index: 3;" id="testimonials-slider">
						<div class="col-lg-12 testimonials text-center">
							<img class="testimonial-img" src="img/testimonial-1.jpg"/>
							<h4>
								<i class="fa fa-quote-left highlight">
								</i>
								<small class="white">
									<?php echo TESTIMONY1 ?> 
									<br>
								</small>
								<span class="highlight">
									<?php echo TESTIMONY1_2 ?>
								</span>
								<small class="white">
									<?php echo TESTIMONY1_3 ?>
								</small>
								<i class="fa fa-quote-right highlight">
								</i>
							</h4>
							<p>
								<?php echo TESTIMONY1_4 ?>
							</p>
						</div>
						<!--<div class="col-lg-12 testimonials text-center">
							<img class="testimonial-img" src="img/testimonial-2.jpg"/>
							<h4>
								<i class="fa fa-quote-left highlight">
								</i>
								<small class="white">
									<?php //echo TESTIMONY2 ?>
									<br>
									<?php //echo TESTIMONY2_2 ?> 
									<br>
									<?php //echo TESTIMONY2_3 ?>
									<br>
									<?php //echo TESTIMONY2_4 ?>
								</small>
								<span class="highlight">
									 <?php //echo TESTIMONY2_5 ?>
								</span>
								<i class="fa fa-quote-right highlight">
								</i>
							</h4>
							<p>
								<?php// echo TESTIMONY2_6 ?>
							</p>
						</div>-->
						<div class="col-lg-12 testimonials text-center">
							<img class="testimonial-img" src="img/testimonial-3.jpg"/>
							<h4>
								<i class="fa fa-quote-left highlight">
								</i>
								<small class="white">
									<?php echo TESTIMONY3 ?>
									<br>
									<?php echo TESTIMONY3_2 ?>
								</small>
								<span class="highlight">
									<?php echo TESTIMONY3_3 ?>
								</span>
								<i class="fa fa-quote-right highlight">
								</i>
							</h4>
							<p>
								<?php echo TESTIMONY3_4 ?>
							</p>
						</div>
					</div>
				</div>
			</section>
			<!-- End Separator Testimonials -->
			<!-- Start Contact Form -->
			<section id="contact-form">
				<div class="container">
					<div class="col-lg-12 section-title-price">
						<h2>
							<small>
								<?php echo TITLE4 ?>
							</small>
							<br>
							<strong>
								<?php echo SUBTITLE4 ?>
							</strong>
						</h2>

						<p class="lead">
							<?php echo SUBTITLE4_2 ?>
							<span class="highlight">
								<?php echo SUBTITLE4_3 ?>
							</span>
						</p>
					</div>
					<div class="col-lg-12 text-center" id="contact">
						<div id="message">
						</div>
						<form method="post" action="contact.php" name="contactform" id="contactform">
							<fieldset>
								<div class="col-md-6">
									<input name="name" type="text" id="name" size="30" maxlength="50" value="" placeholder="<?php echo PLACEHOLDER1 ?>"/>
									<br />
									<input name="email" type="email" id="email" size="30" maxlength="50" value="" placeholder="<?php echo PLACEHOLDER2 ?>"/>
									<br />
									<input name="phone" type="tel" id="phone" size="30" maxlength="13" onKeyUp="javascript:somente_numero(this);" onkeypress="formatar_mascara(this,'## ####-#####')" placeholder="<?php echo PLACEHOLDER3 ?>"/>
								</div>
								<div class="col-md-6">
									<textarea name="comments" cols="40" rows="5" maxlength="300" id="comments" placeholder="<?php echo PLACEHOLDER4 ?>"></textarea>
								</div>
								<div class="col-md-12 text-center">
									<button type="submit" class="btn btn-primary btn-lg btn-responsive"><?php echo BUTTON_CONTACT ?> <i class="fa fa-rocket"></i></button>
									<a type="button" href="https://www.aquirs.com.br/telefones-uteis-sao-leopoldo/" class="btn btn-primary btn-lg btn-responsive">Telefones Úteis <i class="fa fa-rocket"></i></a>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</section>
			<!-- End Contact Form -->

			<!-- Start Google Map -->
			<section>
				<div id="map">
				</div>
			</section>
			<!-- End Google Map -->

			<!-- Start Footer -->
			<footer id="footer">
				<div class="col-lg-12 text-center">
					<div class="how-to-get">
						<a data-toggle="modal" data-target="#modalMaps"><i class="fa fa-map-marker"></i> Como chegar?
						</a>
					</div>
				</div>
				<div class="container text-center">
					<div class="row">
						<div class="col-md-12 footer-social">
							<ul class="connected-icons text-center">
								<li class="connected-icon">
									<a target="_blank" href="https://www.facebook.com/tendadoencontro.org/"><i class="fa fa-facebook fa-2-5x"></i></a>
								</li>
															
								<li class="connected-icon">
									<a target="_blank" href="http://voluntariadoemacao.blogspot.com.br/"><i class="fa fa-pencil-square-o fa-2-5x"></i></a>
								</li>								
							</ul>
						</div>
						<p>
							<?php echo date('Y');?> Copyright © - Tenda do Encontro - <?php echo FOOTER ?> <?php echo $EMP_lineManager['phone'] ?>
						</p>
						<h5 class="footer-logo">
						<small>
							<a href="emperiumcode.com">Emperium Code</a>
						</small>
						</h5>
					</div>
				</div>
			</footer>
			<!-- End Footer -->
		</div>
<!-- ModalMaps -->
<div id="modalMaps" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modalmaps content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-street-view"></i>Veja abaixo como chegar até a "Tenda do Encontro"</h4>
      </div>
      <div class="modal-body">
      
								<p> 1- Após chegar na Rua Ermelindo Varnieiri: Vire à Esquerda </p>
								<p> 2 - Na segunda Rua Sem Denominação: dobre a Direita </p>
								<p> 3 - Dobre a Primeira a Direita </p>
								<p> 4 - Dobre a Primeira a Esquerda </p>
								<p> 5 - Dobre a Primeira a Esquerda </p>
								<p> 6 - E dobre a Primeira a Direita </p>
								<p> 7 - A Tenda do Encontro é a segunda estrutura a Esquerda </p>
							<img class="img-responsive center-text" src="img/routeMaps.JPG"  alt="Como chegar na tenda" title="Tenda do Encontro">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>


		<!-- Start jQuery Plugins -->
		
	
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.liquid-slider.js"></script>
		<script src="js/jquery.stellar.js" type="text/javascript"></script>
		<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
		<script src="js/jquery.sticky.js" type="text/javascript"></script>
		<script src="js/waypoints.min.js" type="text/javascript"></script>
		<script src="js/wow.min.js" type="text/javascript"></script>
		<script src="js/jquery.counterup.min.js" type="text/javascript"></script>
		<script src="js/jquery.fitvids.js" type="text/javascript"></script>
		<script src="js/modernizr.custom.js"></script>
		<script src="js/toucheffects.js"></script>
		<script src="js/jquery.easing.1.3.min.js"></script>
		<script src="js/jquery.touchSwipe.min.js"></script>
		<script src="js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
		<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
		<script src="js/jquery.mb.YTPlayer.js" type="text/javascript"></script>
		<script src="js/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="js/gmap3.min.js"></script>
		<script type="text/javascript" src="js/gmap3.js"></script>
		<script src="js/scripts.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.appear.js"></script>
		<script type="text/javascript" src="js/jquery.vegas.min.js"></script>
		<script type="text/javascript" src="js/jquery.baraja.js"></script>
		<script type="text/javascript" src="js/jquery.nav.js"></script>
		<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
		<script src="http://mistic100.github.io/jQCloud/dist/jqcloud2/dist/jqcloud.min.js"></script>
		<script src="http://mistic100.github.io/jQCloud/dist/demo-words.js"></script>
		<script type="text/javascript">

function formatar_mascara(src, mascara) {
 var campo = src.value.length;
 var saida = mascara.substring(0,1);
 var texto = mascara.substring(campo);
 if(texto.substring(0,1) != saida) {
 src.value += texto.substring(0,1);
 }
}

function somente_numero(campo){  
var digits="0123456789.-/ "  
var campo_temp   
    for (var i=0;i<campo.value.length;i++){  
        campo_temp=campo.value.substring(i,i+1)   
        if (digits.indexOf(campo_temp)==-1){  
            campo.value = campo.value.substring(0,i);  
        }  
    }  
} 

</script>

		
<!-- End jQuery Plugins -->
	</body>
</html>
