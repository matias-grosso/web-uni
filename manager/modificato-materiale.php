<?php
	ob_start();session_start();
	
	//VARIABILI PER IL DB
	$titolo="Modifica materiale";
	$id=$_POST['id'];
	$cid=$_POST['cid'];
	$tabella="materiale";
	$percorso="../file/tea";
	
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
		if(empty($_POST['nome'])){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
						<strong>MATERIALE NON MODIFICATO, HAI DIMENTICATO DI INSERIRE QUALCOSA...</strong>
						<br><br>
					<a href="modifica-materiale.php?id=<?php echo $id; ?>&cid=<?php echo $cid; ?>" class="alert-link">Torna indietro</a>.
				</div>
			</div>
		</div>
<?php
		}
		//SE SONO STATI COMPLETATI
		else{
			
			if($_REQUEST['modifica']){
			
				$file=$_POST['file_old'];
			
				if(file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name'])){
					$tmp_nome=$_FILES["file"]["tmp_name"];
					$tipo=$_FILES["file"]["type"];
					$nome=$_FILES["file"]["name"];
				
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
				
					$file=$nome;
				}
				//MODIFICA MATERIALE
				$controllo=modificaMateriale($tabella, $id, $_POST['nome'], $file, $_POST['file_old'], $percorso);
				if($controllo==1){

?>

		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-success text-center alert-padding">
					<strong>MATERIALE MODIFICATO!</strong><br>
					Stai tornando a <a href="manager-materiale.php?cid=<?php echo $cid; ?>" class="alert-link">Gestione materiale</a>.
					<?php header("refresh:2;url=manager-materiale.php?cid=".$cid); ?>
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