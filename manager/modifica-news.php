<?php
	ob_start();session_start();
	
	//VARIABILI PER IL RECUPERO DEI DATI DA DB
	$titolo="Modifica news";
	$id=$_GET['id'];
	$tabella="news";
	
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
					<li><a href="manager-pag-home.php">Gestisci home</a></li>
					<li><a href="manager-news.php">Gestisci news</a></li>
					<li class="active">Modifica news</li>
				</ol>
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
				<h2 class="text-center">Modifica news</h2>
			</div>
		</div>
	
<?php
		//RICAVO ELEMENTO DAL PROPRIO ID
		$riga=elementoDaId($tabella, $id);
?>
	
	<div class="row spazio-alto">
		<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
			<!-- FORM CON I DATI GIA' INSERITI RECUPERATI DAL DB -->
			<form method="post" action="modificato-news.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
				<div class="row spazio-sotto">
					<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Titolo ITA:</div>
					<div class="col-lg-10 col-md-10 col-sm-10">
						<input type="text" name="titolo_it" class="form-control" placeholder="Titolo news" value="<?php echo $riga['titolo_it']; ?>" />
					</div>
				</div>
				<div class="row spazio-sotto">
					<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Titolo ENG:</div>
					<div class="col-lg-10 col-md-10 col-sm-10">
						<input type="text" name="titolo_en" class="form-control" placeholder="News's title" value="<?php echo $riga['titolo_en']; ?>" />
					</div>
				</div>
				<div class="row spazio-sotto">
					<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Testo ITA:</div>
					<div class="col-lg-10 col-md-10 col-sm-10">
						<textarea id="editorck_it" name="testo_it" class="form-control" placeholder="Testo"><?php echo $riga['testo_it']; ?></textarea>
						<script>CKEDITOR.replace('editorck_it');</script>
					</div>
				</div>
				<div class="row spazio-sotto">
					<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Testo ENG:</div>
					<div class="col-lg-10 col-md-10 col-sm-10">
						<textarea id="editorck_en" name="testo_en" class="form-control" placeholder="Testo"><?php echo $riga['testo_en']; ?></textarea>
						<script>CKEDITOR.replace('editorck_en');</script>
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