<?php
	ob_start();session_start();
	
	//VARIABILI PER IL DB
	$titolo="Modifica news";
	$id=$_GET['id'];
	$tabella="home";

	$percorso="../file/home";
	
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
		if(empty($_POST['testo_it']) || empty($_POST['testo_en']) || empty($_POST['posizione_it']) || empty($_POST['posizione_en']) || empty($_POST['mappa']) || empty($_POST['facebook']) || empty($_POST['facebook_link']) || empty($_POST['twitter']) || empty($_POST['twitter_link']) || empty($_POST['mail']) || empty($_POST['phone'])){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
						<strong>HOME NON MODIFICATA, HAI DIMENTICATO DI INSERIRE QUALCOSA...</strong>
						<br><br>
					<a href="modifica-home.php?id=<?php echo $id; ?>" class="alert-link">Torna indietro</a>.
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
				//MODIFICA HOME
				$controllo=modificaHome($tabella, $id, $_POST['testo_it'], $_POST['testo_en'], $img, $_POST['img_old'], $_POST['posizione_it'], $_POST['posizione_en'], $_POST['mappa'], $_POST['facebook'], $_POST['facebook_link'], $_POST['twitter'], $_POST['twitter_link'], $_POST['mail'], $_POST['phone'], $percorso);
				if($controllo==1){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-success text-center alert-padding">
					<strong>HOME MODIFICATA!</strong>
					Stai tornando a <a href="manager-pag-home.php" class="alert-link">Gestisci home</a>.
					<?php header("refresh:2;url=manager-pag-home.php"); ?>
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