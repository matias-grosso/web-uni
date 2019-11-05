<?php
	ob_start();session_start();
	
	$titolo="Inserisci news";
	$tabella="news";
	
	include("head.php");
	include("header.php");
?>

	<div class="container">

<?php

	if (!isset($_SESSION["autenticato"])){
		echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12 spazio\"><div class=\"alert alert-danger text-center spazio-alto\"><strong>Per entrare in questa pagina devi essere autenticato.</strong></div></div>";
		include("footer.php");
	}
	else{
		include("menu.php");
		//SE NON SONO STATI COMPLETATI TUTTI I CAMPI
		if(empty($_POST['titolo_it']) || empty($_POST['titolo_en']) || empty($_POST['testo_it']) || empty($_POST['testo_en'])){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
					<strong>NEWS NON INSERITA, HAI DIMENTICATO DI INSERIRE QUALCOSA...</strong>
					<br><br>
					<a href="inserisci-news.php" class="alert-link">Torna indietro</a>.
				</div>
			</div>
		</div>
<?php
		}
		//SE SONO STATI COMPLETATI TUTTI I CAMPI
		else{
		
			if($_REQUEST['inserisci']){
				//SALVA NEWS
				$controllo=registraNews($tabella, $_POST['titolo_it'], $_POST['titolo_en'], $_POST['testo_it'], $_POST['testo_en']);
				if($controllo==1){
?>
		
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-success text-center alert-padding">
					<strong>NEWS INSERITA!</strong>
					Stai tornando a <a href="manager-news.php" class="alert-link">Gestisci news</a>.
					<?php header("refresh:2;url=manager-news.php"); ?>
				</div>
			</div>
		</div>

<?php
				}
			}
		}
		include("footer.php");
	}
	ob_end_flush();
?>