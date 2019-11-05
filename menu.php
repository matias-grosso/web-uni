	<body>
		
		<!-- FASCE COLORATE SOPRA IL MENU -->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fascia-arancione">
			<div class="container no-padding">
				<div class="nome-uni">
					<!--STAMPO IL NOME DELL'UNIVERSITA -->
					<?php echo $info['nome_uni']; ?>
				</div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fascia-marrone">
			&nbsp;
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 hidden-xs fascia-grigio">
			<div class="container">
				<div class="nome-prof font-verde vollkorn">
					<!-- STAMPO IL NOME DEL PROF -->
					<?php echo $info['nome_prof']; ?>
				</div>
			</div>
		</div>
		<div class="col-xs-12 visible-xs fascia-grigio">
			<div class="nome-prof font-verde vollkorn">
				<!-- STAMPO IL NOME DEL PROF -->
				<?php echo $info['nome_prof']; ?>
			</div>
		</div>
		<!-- INIZIO MENU -->
		<div class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header visible-xs">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
					</button>
					<div class="navbar-brand"><?php echo strtoupper($titolo); ?></div>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<!-- CON QUESTO METODO SELEZIONO IN AUTOMATICO QUALE VOCE DEL MENU STO VISUALIZZANDO CONFRONTANDO IL TITOLO DELLA PAGINA -->
						<li <?php if($titolo=="Home"){ ?>class="active"<?php } ?>><a href="index.php">Home</a></li>
			            <li <?php if($titolo=="Publications"){ ?>class="active"<?php } ?>><a href="publications.php">Pubblicazioni</a></li>
			            <li <?php if($titolo=="Teaching"){ ?>class="active"<?php } ?>><a href="teaching.php">Corsi</a></li>
						<li <?php if($titolo=="Biosketch"){ ?>class="active"<?php } ?>><a href="biosketch.php">Bio</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<!--<li><a href="index.php"><img src="img/ita.png" class="bandiere"></a></li>-->
						<li class="hidden-xs" style="margin-right:0;"><a href="en/index.php"><img src="img/eng.png" class="bandiere"></a></li>
						<li class="visible-xs"><a href="en/index.php"><img src="img/eng.png" class="bandiere"> English Version</a></li>
					</ul>
				</div>
			</div>
		</div>