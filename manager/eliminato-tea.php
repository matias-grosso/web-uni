<?php
	ob_start();session_start();
	
	$titolo="Cancella teaching";
	$tabella="tea";
	$tabellafile="materiale";
	$percorso="../file/tea";
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
					<strong>NESSUN TEACHING ELIMINATO!</strong><br />
						Non era stata selezionata nessun teaching da eliminare<br />
						Stai tornando a <a href="manager-pag-tea.php" class="alert-link">Gestisci teaching</a>.
						<?php header("refresh:2;url=manager-pag-tea.php"); ?>
				</div>
			</div>
		</div>
<?php
			}
			//SE E' STATO SELEZIONATO ALMENO UN ELEMENTO, ELIMINA GLI ELEMENTI SELEZIONATI
			else{
				$eliminate=cancellaTea($tabella, $tabellafile, $percorso, $elemento);
?>
			<div class="row spazio-alto">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="alert alert-success text-center alert-padding">
						<strong>TEACHING ELIMINATO/I!</strong><br>
						<?php
							foreach($eliminate as $id){
						?>
							E' stata eliminato il teaching con id=<?php echo $id; ?>!<br>
						<?php
							}
						?>
							Stai tornando a <a href="manager-pag-tea.php" class="alert-link">Gestisci teaching</a>.
							<?php header("refresh:2;url=manager-pag-tea.php"); ?>
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