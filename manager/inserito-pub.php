<?php
	ob_start();session_start();
	
	$titolo="Inserisci publications";
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
		//SE NON SONO STATI COMPLETATI TUTTI I CAMPI
		if(empty($_POST['titolo']) || empty($_POST['extra'])){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
					<strong>PUBLICATIONS NON INSERITO, HAI DIMENTICATO DI INSERIRE QUALCOSA...</strong>
					<br><br>
					<a href="inserisci-pub.php" class="alert-link">Torna indietro</a>.
				</div>
			</div>
		</div>
<?php
		}
		//SE SONO STATI COMPLETATI TUTTI I CAMPI
		else{
			
			if($_REQUEST['inserisci']){
				
				if($_POST['tipo']==1){
				
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
				}
				else{
					$nome="";
				}
				//REGISTRA PUBBLICAZIONE
				$controllo=registraPub($tabella, $_POST['tipo'], $_POST['titolo'], $_POST['extra'], $_POST['link'], $nome, $_POST['testo_it'], $_POST['testo_en']);
				if($controllo==1){
?>
		
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-success text-center alert-padding">
					<strong>PUBLICATIONS INSERITA!</strong><br>
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