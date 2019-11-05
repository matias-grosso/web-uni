<?php
	ob_start();session_start();
	
	//VARIABILI PER IL DB
	$titolo="Modifica teaching";
	$id=$_GET['id'];
	$tabella="tea";
	
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
		if(empty($_POST['nome']) || empty($_POST['anno']) || empty($_POST['orari']) || empty($_POST['testo_it']) || empty($_POST['testo_en'])){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
						<strong>TEACHING NON MODIFICATO, HAI DIMENTICATO DI INSERIRE QUALCOSA...</strong>
						<br><br>
					<a href="modifica-tea.php?id=<?php echo $id; ?>" class="alert-link">Torna indietro</a>.
				</div>
			</div>
		</div>
<?php
		}
		//SE SONO STATI COMPLETATI
		else{
		
			if($_REQUEST['modifica']){
				
				//MODIFICA CORSI
				$controllo=modificaTea($tabella, $id, $_POST['nome'], $_POST['anno'], $_POST['orari'], $_POST['testo_it'], $_POST['testo_en']);
				if($controllo==1){
		?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-success text-center alert-padding">
					<strong>TEACHING MODIFICATO!</strong>
					Stai tornando a <a href="manager-pag-tea.php" class="alert-link">Gestisci teaching</a>.
					<?php header("refresh:2;url=manager-pag-tea.php"); ?>
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