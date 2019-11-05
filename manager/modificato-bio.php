<?php
	ob_start();session_start();
	
	//VARIABILI PER IL DB
	$titolo="Modifica tab bio";
	$id=$_GET['id'];
	$tabella="bio";

	$percorso="../file/bio";
	
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
		if(empty($_POST['testo_it']) || empty($_POST['testo_en'])){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
						<strong>BIO NON MODIFICATO, HAI DIMENTICATO DI INSERIRE QUALCOSA...</strong>
						<br><br>
					<a href="modifica-bio.php?id=<?php echo $id; ?>" class="alert-link">Torna indietro</a>.
				</div>
			</div>
		</div>
<?php
		}
		//SE SONO STATI COMPLETATI
		else{
	
			if($_REQUEST['modifica']){
			
				$img=$_POST['img_old'];
			
				if(file_exists($_FILES['img']['tmp_name']) || is_uploaded_file($_FILES['img']['tmp_name'])){
					$tmp_nome=$_FILES["img"]["tmp_name"];
					$tipo=$_FILES["img"]["type"];
					$nome=$_FILES["img"]["name"];
				
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
				
					$img=$nome;
				}
				
				//MODIFICA BIOGRAFIA
				$controllo=modificaBio($tabella, $id, $_POST['testo_it'], $_POST['testo_en'], $img, $_POST['img_old'], $percorso);
				if($controllo==1){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-success text-center alert-padding">
					<strong>BIO MODIFICATO!</strong>
					Stai tornando a <a href="manager-pag-bio.php" class="alert-link">Gestisci biosketch</a>.
					<?php header("refresh:2;url=manager-pag-bio.php"); ?>
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