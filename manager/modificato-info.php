<?php
	ob_start();session_start();
	
	//VARIABILI PER IL DB
	$titolo="Modifica informazioni principali";
	$id=$_GET['id'];
	$tabella="info";
	$percorso="../css";
	
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
		if(empty($_POST['nome_prof']) || empty($_POST['nome_uni']) || empty($_POST['footer_it']) || empty($_POST['footer_en'])){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
						<strong>INFORMAZIONI NON MODIFICATE, HAI DIMENTICATO DI INSERIRE QUALCOSA...</strong>
						<br><br>
					<a href="modifica-info.php?id=<?php echo $id; ?>" class="alert-link">Torna indietro</a>.
				</div>
			</div>
		</div>
<?php
		}
		//SE SONO STATI COMPLETATI
		else{
	
			if($_REQUEST['modifica']){
			
				$favicon=$_POST['favicon_old'];
			
				if(file_exists($_FILES['favicon']['tmp_name']) || is_uploaded_file($_FILES['favicon']['tmp_name'])){
					$tmp_nome=$_FILES["favicon"]["tmp_name"];
					$tipo=$_FILES["favicon"]["type"];
					$nome=$_FILES["favicon"]["name"];
				
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
				
					$favicon=$nome;
				}
				//MODIFICA INFO
				$controllo=modificaInfo($tabella, $id, $_POST['nome_prof'], $_POST['nome_uni'], $favicon, $_POST['favicon_old'], $_POST['footer_it'], $_POST['footer_en'], $percorso);
				if($controllo==1){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-success text-center alert-padding">
					<strong>INFORMAZIONI MODIFICATE!</strong>
					Stai tornando alla <a href="manager-home.php" class="alert-link">Home</a>.
					<?php header("refresh:2;url=manager-home.php"); ?>
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