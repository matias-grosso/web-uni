<?php
	ob_start();session_start();
	
	$titolo="Cancella extra bio";
	$tabella="extrabio";
	if(isset($_POST['item'])){
		$elemento=$_POST['item'];
	}
	
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
		
		if($_REQUEST['cancella']){
			//SE NON E' STATO SELEZIONATO NESSUN ELEMENTO
			if(!isset($_POST['item'])){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
					<strong>NESSUN EXTRA BIO ELIMINATO!</strong><br />
						Non era stato selezionato nessun extra bio da eliminare<br />
						Stai tornando a <a href="manager-extrabiob.php" class="alert-link">Gestisci extra bio</a>.
						<?php header("refresh:2;url=manager-extrabio.php"); ?>
				</div>
			</div>
		</div>
<?php
			}
			//SE E' STATO SELEZIONATO ALMENO UN ELEMENTO, ELIMINA GLI ELEMENTI SELEZIONATI
			else{
				$eliminate=cancellaExtrabio($tabella, $elemento);
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-success text-center alert-padding">
					<strong>EXTRA BIO ELIMINATO/I!</strong><br />
					<?php
						foreach($eliminate as $id){
					?>
						E' stata eliminato l'extra bio con id=<?php echo $id; ?>!<br />
					<?php
						}
					?>
						Stai tornando a <a href="manager-extrabio.php" class="alert-link">Gestisci extra bio</a>.
						<?php header("refresh:2;url=manager-extrabio.php"); ?>
				</div>
			</div>
		</div>
<?php
			}
		}
		include("footer.php");
	}
	ob_end_flush();
?>