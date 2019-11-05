<?php

	ob_start();session_start();
	
	$titolo="Manager";
	$visible_footer="no";
	
	include("head.php");
	include("header.php");
?>

<div class="container">

<?php
	//VERIFICA I DATI PROVENINENTI DAL FORM DELLA PAGINA PRECEDENTE
	if(isset($_POST["accesso"]) && $_POST["accesso"]=="login"){
		$user=mysql_real_escape_string($_POST['user']);
		$pass=mysql_real_escape_string($_POST['pass']);
		$autenticato = dbAutentica($user, $pass);
		if (!$autenticato){
?>
			<form method="post" action="autenticazione.php" class="form-accesso">
				<div class="alert alert-danger testo-centrato"><strong>USERNAME O PASSWORD SBAGLIATI</strong></div>
				<div class="form-scritta">
					Accesso al manager
				</div>
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					<input type="text" name="user" class="form-control" placeholder="Username" autofocus>
				</div>
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
					<input type="password" name="pass" class="form-control" placeholder="Password" />
				</div>
				<input type="hidden" name="accesso" value="login" />
				<button type="submit" name="accedi" class="btn btn-lg btn-primary btn-block">Accesso</button>
			</form>

<?php
		}
		else {
?>
			<div class="accesso-effettuato">
				<div class="alert alert-success testo-centrato"><strong>ACCESSO EFFETTUATO!</strong> Sarai indirizzato verso l'home page del manager</div>
			</div>
<?php
			header("refresh:3;url=manager-home.php");
		}
	}
	
	if(isset($_GET["accesso"]) && $_GET["accesso"]=="logout"){
		session_destroy();
?>
		<div class="accesso-effettuato">
			<div class="alert alert-success testo-centrato"><strong>HAI EFFETTUATO IL LOGOUT.</strong> Sarai indirizzato verso l'Home Page.</div>
		</div>
<?php	
		header("refresh:3;url=index.php");
	}
?>
	
</div>

<?php
	include("footer.php");
	ob_end_flush();
?>