<?php
	ob_start();session_start();
	
	$titolo="Manager materiale";
	$tabella="materiale";
	$cid=$_GET['cid'];
	
	include("head.php");
?>
	<!--SELEZIONA TUTTI I CHECKBOX-->
	<script type="text/javascript">
		function selezionaTutti(){
			var i=0;
			var modulo=document.modulo.elements;
			for(i=0;i<modulo.length;i++){
				if(modulo[i].type=="checkbox"){
					modulo[i].checked=!(modulo[i].checked);
				}
			}
		}
	</script>
	
<?php
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
?>

		<div class="row">
			<div class="col-lg-12">
				<ol class="breadcrumb">
					<li><a href="manager-home.php">Home</a></li>
					<li><a href="manager-pag-tea.php">Gestisci teaching</a></li>
					<li class="active">Gestisci materiale</a></li>
				</ol>
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
				<h2>Gestisci materiale</h2>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
				<a href="inserisci-materiale.php?cid=<?php echo $cid; ?>"><button type="button" class="btn btn-success btn-lg testo-btn-piccolo">Inserisci</button></a>
			</div>
		</div>
		
<?php
			//CONTO ELEMENTI TABELLA
			$totale=numeroElementiFiltroCid($tabella, $cid);
			//SE LA TABELLA E' VUOTA
			if($totale==0){
?>

		<div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
			<div class="alert alert-danger testo-centrato spazio-alto"><strong>NON SONO PRESENTI MATERIALI PER QUESTO TEACHING</strong></div>
		</div>
		
<?php
			}
			//SE INVECE CONTIENE ELEMENTI, STAMPO A VIDEO
			else{
?>
		<form name="modulo" method="post" action="eliminato-materiale.php?cid=<?php echo $cid; ?>">	
			<div class="row spazio-altino">
				
<?php
				$risposta=elementiSottoTabella($tabella, $cid);
				while($riga=mysql_fetch_array($risposta)){
?>

				<div class="riga-alta">
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center elenco-pag">
						<input type="checkbox" name="item[]" value="<?php echo $riga['id']; ?>" />
					</div>
					<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
						<div class="elenco-pag"><?php echo $riga['nome']; ?></div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
						<a href="modifica-materiale.php?id=<?php echo $riga['id']; ?>&cid=<?php echo $cid; ?>"><button type="button" class="btn btn-warning btn-largo btn-stretto"><span class="hidden-xs">Modifica</span><span class="visible-xs">Mod.</span></button></a>
					</div>
				</div>
<?php
			}
?>
			</div>
			<div class="row spazio-alto">
				<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
					<button type="submit" name="cancella" value="cancella" class="btn btn-lg btn-danger btn-block">Cancella</button>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
					<button type="button" onclick="selezionaTutti('modulo')" class="btn btn-lg btn-info btn-block"><span class="hidden-xs">Seleziona/Deseleziona tutti</span><span class="visible-xs">Sel./Des.</span></button>
				</div>
			</div>
		</form>

<?php
		}
		include("footer.php");
	}
	ob_end_flush();
?>