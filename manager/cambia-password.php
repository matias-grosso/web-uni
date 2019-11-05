<?php
	ob_start();session_start();
	
	$titolo="Cambia password";
	$vocemenu="cambia";
	$id=$_SESSION['id'];
	
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
					<li class="active">Cambia password</li>
				</ol>
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
				<h2 class="text-center">Cambia password</h2>
			</div>
		</div>
	
		<div class="row spazio-alto">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				<!-- FORM PER L'INSERIMENTO DI UNA NUOVA PASSWORD -->
				<form method="post" action="cambiata-password.php?id=<?php echo $id; ?>">
					<div class="row spazio-sotto">
						<div class="col-lg-4 col-md-4 col-sm-4">Vecchia password:</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
							<input type="password" name="vecchiapass" class="form-control" />
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-4 col-md-4 col-sm-4">Nuova password:</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
							<input type="password" name="nuovapass" class="form-control" />
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-4 col-md-4 col-sm-4">Ripeti nuova password:</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
							<input type="password" name="nuovapass1" class="form-control" />
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