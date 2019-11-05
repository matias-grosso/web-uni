<?php
	ob_start();session_start();
	
	$titolo="Cambia password";
	$id=$_GET['id'];
	$tabella="accesso_manager";
	
	include("head.php");
	include("header.php");
?>

	<div class="container">

<?php

	if (!isset($_SESSION["autenticato"])){
		echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12 spazio\"><div class=\"alert alert-danger text-center spazio-alto\"><strong>Per entrare in questa pagina devi essere autenticato.</strong></div></div>";
		include("footer.php");
	}
	else{
		include("menu.php");
		//VERIFICA CHE SIANO STATI INSERITI TUTTI I CAMPI
		if(empty($_POST['vecchiapass']) || empty($_POST['nuovapass']) || empty($_POST['nuovapass1'])){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
					<strong>PASSWORD NON MODIFICATA, HAI DIMENTICATO DI INSERIRE QUALCOSA...</strong>
					<br><br>
					<a href="cambia-password.php" class="alert-link">Torna indietro</a>.
				</div>
			</div>
		</div>
<?php
		}
		else{
		
			if($_REQUEST['modifica']){
				$vecchia=$_POST['vecchiapass'];
				$nuova=$_POST['nuovapass'];
				$nuova1=$_POST['nuovapass1'];
				//VERIFICA CHE LE PASSWORD NUOVI COINCIDANO
				if($nuova!=$nuova1){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
					<strong>PASSWORD NON MODIFICATA, LE DUE PASSWORD NUOVE SONO DIVERSE!</strong>
					<br><br>
					<a href="cambia-password.php" class="alert-link">Torna indietro</a>.
				</div>
			</div>
		</div>
<?php
				}
				else{
					//MODIFICA PASSWORD UTENTE
					$riga=verificaPass($tabella, $id);
					if(md5($vecchia)!=$riga['pass']){
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-danger text-center alert-padding">
					<strong>PASSWORD NON MODIFICATA, LE VECCHIA PASSWORD È SBAGLIATA!</strong>
					<br><br>
					<a href="cambia-password.php" class="alert-link">Torna indietro</a>.
				</div>
			</div>
		</div>
<?php
					}
					else{
						registraPass($tabella, $id, $nuova);
?>
		<div class="row spazio-alto">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="alert alert-success text-center alert-padding">
					<strong>PASSWORD MODIFICATA!</strong>
					Stai tornando a <a href="manager-home.php" class="alert-link">Manager home</a>.
					<?php header("refresh:2;url=manager-home.php"); ?>
				</div>
			</div>
		</div>
<?php
					}
				}
			}
		}
		include("footer.php");
	}
	ob_end_flush();
?>