<?php
	ob_start();session_start();
	
	$titolo="Inserisci teaching";
	$tabella="tea";
	
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
					<li class="active">Inserisci teaching</li>
				</ol>
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
				<h2 class="text-center">Inserisci un nuovo teaching</h2>
			</div>
		</div>
	
		<div class="row spazio-alto">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				<!-- FORM PER L'INSERIMENTO DI UN CORSO -->
				<form method="post" action="inserito-tea.php" enctype="multipart/form-data">
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Nome:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="text" name="nome" class="form-control" placeholder="Nome corso" autofocus>
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Anno:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="text" name="anno" class="form-control" placeholder="Anno: es. 2015/2014">
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Orari:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="text" name="orari" class="form-control" placeholder="Orari delle lezioni">
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Programma ITA:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<textarea id="editorck_it" name="testo_it" class="form-control" placeholder="Testo"></textarea>
							<script>CKEDITOR.replace('editorck_it');</script>
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Programma ENG:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<textarea id="editorck_en" name="testo_en" class="form-control" placeholder="Testo"></textarea>
							<script>CKEDITOR.replace('editorck_en');</script>
						</div>
					</div>
					<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
						<button type="submit" name="inserisci" value="inserisci" class="btn btn-lg btn-success btn-block spazio-alto">Inserisci</button>
					</div>
				</form>
			</div>
		</div>

<?php
		include("footer.php");
	}
	ob_end_flush();
?>