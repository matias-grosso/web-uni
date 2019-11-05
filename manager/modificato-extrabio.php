<?php
	ob_start();session_start();
	
	//VARIABILI PER IL DB
	$titolo="Modifica extra bio";
	$id=$_GET['id'];
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
		
		//SE TUTTI I CAMPI NON SONO STATI COMPLETATI
		if(empty($_POST['nome_it']) || empty($_POST['nome_en']) || empty($_POST['testo_it']) || empty($_POST['testo_en'])){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
						<strong>EXTRA BIO NON MODIFICATO, HAI DIMENTICATO DI INSERIRE QUALCOSA...</strong>
						<br><br>
					<a href="modifica-extrabio.php?id=<?php echo $id; ?>" class="alert-link">Torna indietro</a>.
				</div>
			</div>
		</div>
<?php
		}
		//SE SONO STATI COMPLETATI
		else{
	
			if($_REQUEST['modifica']){
				//MODIFICA EXTRA BIO
				$controllo=modificaExtrabio($tabella, $id, $_POST['nome_it'], $_POST['nome_en'], $_POST['tipo'], $_POST['periodo'], $_POST['testo_it'], $_POST['testo_en']);
				if($controllo==1){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-success text-center alert-padding">
					<strong>EXTRA BIO MODIFICATO!</strong>
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