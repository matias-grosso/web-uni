<?php
	ob_start();session_start();
	
	//VARIABILI PER IL RECUPERO DEI DATI DA DB
	$titolo="Modifica materiale";
	$id=$_GET['id'];
	$cid=$_GET['cid'];
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
?>

		<div class="row">
			<div class="col-lg-12">
				<ol class="breadcrumb">
					<li><a href="manager-home.php">Home</a></li>
					<li><a href="manager-pag-tea.php">Gestisci teaching</a></li>
					<li><a href="manager-materiale.php?cid=<?php echo $cid; ?>">Gestisci materiale</a></li>
					<li class="active">Modifica materiale</a></li>
				</ol>
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
				<h2 class="text-center">Modifica materiale</h2>
			</div>
		</div>
	
<?php
		//RICAVO ELEMENTO DAL PROPRIO ID
		$riga=elementoDaId($tabella, $id);
?>
	
		<div class="row spazio-alto">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				<!-- FORM CON I DATI GIA' INSERITI RECUPERATI DAL DB -->
				<form method="post" action="modificato-materiale.php" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $id; ?>" />
					<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Nome:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="text" name="nome" class="form-control" placeholder="Nome file" value="<?php echo $riga['nome']; ?>" />
						</div>
					</div>
					<div class="row spazio-sotto no-libro">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">PDF:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<?php
								if(!empty($riga['file'])){
							?>
							<a href="<?php echo $percorso."/".$riga['file']; ?>" target="_blank">File esistente</a>
							<?php
								}
							?>
							<input type="file" name="file" />
							<input type="hidden" name="file_old" value="<?php echo $riga['file']; ?>">
						</div>
					</div>
					<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
						<button type="submit" name="modifica" value="modifica" class="btn btn-lg btn-warning btn-block spazio-alto">Modifica</button>
					</div>
				</form>
			</div>
		</div>

<?php
		include("footer.php");
	}
	ob_end_flush();
?>