<?php
	ob_start();session_start();
	
	$titolo="Manager home";
	$vocemenu="home";
	
	include("head.php");
	include("header.php");
?>

	<div class="container">

<?php

	if(!isset($_SESSION["autenticato"])){
		echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12 spazio\"><div class=\"alert alert-danger text-center spazio-alto\"><strong>Per entrare in questa pagina devi essere autenticato.</strong></div></div>";
		include("footer.php");
	}
	else{
		include("menu.php");
?>
		<!-- TITOLO HOME -->
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
				<h2 class="text-center">Scegli una pagina da modificare</h2>
			</div>
		</div>	
		
		<!-- LISTA DI VARI PULSANTI PER ENTRARE NEI VARI MANAGER -->
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 spazio-alto">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<a href="modifica-info.php?id=1">
						<button type="button" class="btn btn-primary btn-lg btn-largo testo-btn">Informazioni principali, Favicon, Footer</button>
					</a>
				</div>
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 spazio-alto">
				<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
					<a href="manager-pag-home.php">
						<button type="button" class="btn btn-primary btn-lg btn-largo testo-btn">Home</button>
					</a>
				</div>
				<div class="col-lg-5 col-lg-offset-2 col-md-6 col-sm-6 col-xs-12 spazio-xs">
					<a href="manager-pag-pub.php">
						<button type="button" class="btn btn-primary btn-lg btn-largo testo-btn">Publications</button>
					</a>
				</div>
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 spazio-alto">
				<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
					<a href="manager-pag-tea.php">
						<button type="button" class="btn btn-primary btn-lg btn-largo testo-btn">Teaching</button>
					</a>
				</div>
				<div class="col-lg-5 col-lg-offset-2 col-md-6 col-sm-6 col-xs-12 spazio-xs">
					<a href="manager-pag-bio.php">
						<button type="button" class="btn btn-primary btn-lg btn-largo testo-btn">Biosketch</button>
					</a>
				</div>
			</div>
		</div>
	
	
<?php
		include("footer.php");
	}
	ob_end_flush();
?>