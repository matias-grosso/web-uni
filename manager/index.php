<?php
	$titolo="Manager";
	$visible_footer="no";

	include("head.php");
	include("header.php");
?>

	<div class="container">

		<!-- FORM PER L'ACCESSO AL MANAGER -->
		<form method="post" action="autenticazione.php" class="form-accesso">
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

	</div>

<?php

	include("footer.php");

?>
