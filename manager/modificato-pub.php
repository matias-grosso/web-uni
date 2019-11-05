<?php
	ob_start();session_start();
	
	//VARIABILI PER IL DB
	$titolo="Modifica publications";
	$id=$_GET['id'];
	$tabella="pub";

	$percorso="../file/pub";
	
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
		if(empty($_POST['titolo']) || empty($_POST['extra'])){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
						<strong>PUBLICATIONS NON MODIFICATO, HAI DIMENTICATO DI INSERIRE QUALCOSA...</strong>
						<br><br>
					<a href="modifica-pub.php?id=<?php echo $id; ?>" class="alert-link">Torna indietro</a>.
				</div>
			</div>
		</div>
<?php
		}
		//SE SONO STATI COMPLETATI
		else{
	
			if($_REQUEST['modifica']){
			
				$pdf=$_POST['pdf_old'];
			
				if(file_exists($_FILES['pdf']['tmp_name']) || is_uploaded_file($_FILES['pdf']['tmp_name'])){
					$tmp_nome=$_FILES["pdf"]["tmp_name"];
					$tipo=$_FILES["pdf"]["type"];
					$nome=$_FILES["pdf"]["name"];
				
					if(file_exists($percorso."/".$nome)){
						$k=1;
						$nome_old=$nome;
						do{
							$nome=$k."-".$nome_old;
							$k++;
						}
						while(file_exists($percorso."/".$nome));
					}
				
					move_uploaded_file($tmp_nome, $percorso."/".$nome);
				
					$pdf=$nome;
				}
				
				//MODIFICA PUBBLICAZIONE
				$controllo=modificaPub($tabella, $id, $_POST['tipo'], $_POST['titolo'], $_POST['extra'], $_POST['link'], $pdf, $_POST['pdf_old'], $_POST['testo_it'], $_POST['testo_en'], $percorso);
				if($controllo==1){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-success text-center alert-padding">
					<strong>PUBLICATIONS MODIFICATO!</strong>
					Stai tornando a <a href="manager-pag-pub.php" class="alert-link">Gestisci publications</a>.
					<?php header("refresh:2;url=manager-pag-pub.php"); ?>
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