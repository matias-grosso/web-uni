<?php
	ob_start();session_start();
	
	//VARIABILI PER IL DB
	$titolo="Modifica news";
	$id=$_GET['id'];
	$tabella="news";
	
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
		if(empty($_POST['titolo_it']) || empty($_POST['titolo_en']) || empty($_POST['testo_it']) || empty($_POST['testo_en'])){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
						<strong>NEWS NON MODIFICATA, HAI DIMENTICATO DI INSERIRE QUALCOSA...</strong>
						<br><br>
					<a href="modifica-news.php?id=<?php echo $id; ?>" class="alert-link">Torna indietro</a>.
				</div>
			</div>
		</div>
<?php
		}
		//SE SONO STATI COMPLETATI
		else{
		
			if($_REQUEST['modifica']){
				
				//MODIFICA NEWS
				$controllo=modificaNews($tabella, $id, $_POST['titolo_it'], $_POST['titolo_en'], $_POST['testo_it'], $_POST['testo_en']);
				if($controllo==1){
		?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-success text-center alert-padding">
					<strong>NEWS MODIFICATA!</strong>
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