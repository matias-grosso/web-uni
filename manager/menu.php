<!-- MENU NAVBAR -->
<div class="navbar navbar-default">
	<!-- VERSIONE MOBILE -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="manager-home.php">Manager</a>
	</div>
	<!-- LISTA ELEMENTI MENU -->
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
			<?php if(isset($vocemenu) && $vocemenu=="home"){ ?><li class="active"><?php } else { ?><li><?php } ?><a href="manager-home.php">Home</a></li>
			<?php if(isset($vocemenu) && $vocemenu=="cambia"){ ?><li class="active"><?php } else { ?><li><?php } ?><a href="cambia-password.php">Cambia password</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a>Nome utente: <span class="colorato-rosso"><?php echo $_SESSION['user']; ?></span></a></li>
			<li><a href="autenticazione.php?accesso=logout">Logout</a></li>
      </ul>
	</div>
</div>