<?php
	ob_start();session_start();
	
	$titolo="Manager home";
	
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
					<li class="active">Gestisci home</a></li>
				</ol>
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h2>Gestisci home</h2>
			</div>
		</div>
			
		<!-- LISTA DEGLI ELEMENTI CHE SI POSSONO MODIFICARE PER QUELLA DETERMINATA PAGINA -->
		<div class="row spazio-altino">
			
			<div class="riga-alta">
				<div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
					<div class="elenco-pag">
						INFO, POSITION, CONTACTS
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
					<a href="modifica-home.php?id=1"><button type="button" class="btn btn-warning btn-largo btn-stretto"><span class="hidden-xs">Modifica</span><span class="visible-xs">Mod.</span></button></a>
				</div>
			</div>
			<div class="riga-alta">
				<div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
					<div class="elenco-pag">
						NEWS
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
					<a href="manager-news.php"><button type="button" class="btn btn-primary btn-largo btn-stretto"><span class="hidden-xs">Gestisci</span><span class="visible-xs">Gest.</span></button></a>
				</div>
			</div>
		</div>
		
<?php
		include("footer.php");
	}
	ob_end_flush();
?>