<?php
	ob_start();session_start();
	
	$titolo="Inserisci materiale";
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
		
		if($_REQUEST['inserisci']){
			
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
			//SE NON E' ANDATO A BUON FINE IL CARICAMENTO DEL FILE
			if(!move_uploaded_file($tmp_nome, $percorso."/".$nome)){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
					<strong>MATERIALE NON INSERITO, HAI DIMENTICATO DI INSERIRE QUALCOSA...</strong>
					<br><br>
					<a href="inserisci-materiale.php" class="alert-link">Torna indietro</a>.
				</div>
			</div>
		</div>
<?php
			}
			//SE IL FILE E' STATO CARICATO
			else{
				//SALVA MATERIALE
				$controllo=registraMateriale($tabella, $cid, $_POST['nome'], $nome);
				if($controllo==1){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-success text-center alert-padding">
					<strong>MATERIALE CARICATO!</strong><br>
					Stai tornando a <a href="manager-materiale.php?cid=<?php echo $cid; ?>" class="alert-link">Gestisci materiale</a>.
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