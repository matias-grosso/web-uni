<?php
	ob_start();session_start();
	
	$titolo="Inserisci extra bio";
	$tabella="extrabio";
	
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
		//SE NON SONO STATI COMPLETATI TUTTI I CAMPI
		if(empty($_POST['nome_it']) || empty($_POST['nome_en']) || empty($_POST['testo_it']) || empty($_POST['testo_en'])){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
					<strong>EXTRA BIO NON INSERITO, HAI DIMENTICATO DI INSERIRE QUALCOSA...</strong>
					<br><br>
					<a href="inserisci-extrabio.php" class="alert-link">Torna indietro</a>.
				</div>
			</div>
		</div>
<?php
		}
		//SE SONO STATI COMPLETATI TUTTI I CAMPI
		else{
			
			if($_REQUEST['inserisci']){
				//SALVA EXTRA BIO
				$controllo=registraExtrabio($tabella, $_POST['nome_it'], $_POST['nome_en'], $_POST['tipo'], $_POST['periodo'], $_POST['testo_it'], $_POST['testo_en']);
				if($controllo==1){
?>
		
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-success text-center alert-padding">
					<strong>EXTRA BIO INSERITO!</strong><br>
					Stai tornando a <a href="manager-extrabio.php" class="alert-link">Gestisci extra bio</a>.
					<?php header("refresh:2;url=manager-extrabio.php"); ?>
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