<?php
	error_reporting(0);
	//INCLUDO I FILE CONFIG E FUNZIONI PER IL COLLEGAMENTO CON IL DB
	include_once("../manager/config.php");
	include_once("../manager/funzioni.php");
	
	//TITOLO DELLA PAGINA
	$titolo="Biosketch";
	
	//VARIABILI PER RICAVARE DA DB GLI ELEMENTI DELLA PAGINA
	$tabella="bio";
	$tabellae="extrabio";
	$percorso="../file/bio";
	$idbio=1;
	
	//INCLUDO I FILE HEADER E MENU
	include("header.php");
	include("menu.php");
?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="container">
			<!-- TITOLO SEZIONE -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 distanza-sopra no-padding">
				<div class="titolo-bio vollkorn">
					CURRICULUM VITAE
				</div>
			</div>
			
			<!-- CONTENITORE ELEMENTI BIOSKETCH CON RELATIVO COLLAPSE -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding-xs">
				<!-- STRUTTURA SINGOLO ELEMENTO BIOSKETCH -->
				<div class="lista-bio distanza-corso">
					<!-- TITOLO -->
					<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10">
						<div class="titolo-lista-bio">BIO</div>
					</div>
					<!-- IMMAGINE + O - PER APRIRE IL COLLAPSE -->
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
						<a href="javascript:void(0)" data-toggle="collapse" data-target="#bio1" class="collapsed">
							<div class="toggle-img"></div>
						</a>
					</div>
<?php
	//STAMPO BIO DA DB
	$riga=elementoDaId($tabella, $idbio);
?>
					<!-- STRUTTURA COLLAPSE -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding-xs">
						<div id="bio1" class="collapse">
							<!-- IMMAGINE BIO -->
							<div class="col-lg-4 col-md-5 col-md-12 col-xs-12 distanza-bio">
								<img src="<?php echo $percorso."/".$riga['img']; ?>" class="img-responsive img-align-bio"/>
							</div>
							<!-- TESTO BIO -->
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
								<div class="testo-aperto-bio distanza-bio">
									<?php echo $riga['testo_en']; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- STRUTTURA SINGOLO ELEMENTO BIOSKETCH -->
				<div class="lista-bio">
					<!-- TITOLO -->
					<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10">
						<div class="titolo-lista-bio">EXPERIENCE</div>
					</div>
					<!-- IMMAGINE + O - PER APRIRE IL COLLAPSE -->
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 ruota">
						<a href="javascript:void(0)" data-toggle="collapse" data-target="#bio2" class="collapsed">
							<div class="toggle-img"></div>
						</a>
					</div>
					<!-- STRUTTURA COLLAPSE -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div id="bio2" class="collapse">
<?php
	//STAMPO ESPERIENZE DA DB
	$filtro="1";
	$totale=numeroElementiTipo($tabellae, $filtro);
	//SE LA TABELLA E' VUOTA
	if($totale==0){
?>
							<div class="no-elementi-bio">
								There isn't experience.
							</div>
<?php
	}
	//SE INVECE CONTIENE UNA O PIU' ESPERIENZE
	else{
		$risposta=elementiFiltroTipo($tabellae, $filtro);
		while($riga=mysql_fetch_array($risposta)){
?>
							<!-- STRUTTURA SINGOLA ESPERIENZA -->
							<div class="experience">
								<!-- TITOLO ESPERIENZA -->
								<div class="titolo-experience">
									<?php echo $riga['nome_en']; ?>
								</div>
								<!-- PERIODO ESPERIENZA -->
								<div class="anno-experience">
									Period: <?php echo $riga['periodo']; ?>
								</div>
								<!-- TESTO ESPERIENZA -->
								<div class="testo-aperto-bio">
									<?php echo $riga['testo_en']; ?>
								</div>
							</div>
<?php
		}
	}
?>
						</div>
					</div>
				</div>
				
				<!-- STRUTTURA SINGOLO ELEMENTO BIOSKETCH -->
				<div class="lista-bio">
					<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10">
						<div class="titolo-lista-bio">TECHNICAL SKILLS</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 ruota">
						<a href="javascript:void(0)" data-toggle="collapse" data-target="#bio3" class="collapsed">
							<div class="toggle-img"></div>
						</a>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div id="bio3" class="collapse">
<?php
	$filtro="2";
	$totale=numeroElementiTipo($tabellae, $filtro);
	if($totale==0){
?>
							<div class="no-elementi-bio">
								There isn't technical skills.
							</div>
<?php
	}
	else{
		$risposta=elementiFiltroTipo($tabellae, $filtro);
		while($riga=mysql_fetch_array($risposta)){
?>
							<div class="technical-skills">
								<div class="titolo-technical">
									<?php echo $riga['nome_en']; ?>
								</div>
								<div class="testo-aperto-bio">
									<?php echo $riga['testo_en']; ?>
								</div>
							</div>
<?php
		}
	}
?>
						</div>
					</div>
				</div>
				
				<!-- STRUTTURA SINGOLO ELEMENTO BIOSKETCH -->
				<div class="lista-bio">
					<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10">
						<div class="titolo-lista-bio">PROJECTS</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 ruota">
						<a href="javascript:void(0)" data-toggle="collapse" data-target="#bio4" class="collapsed">
							<div class="toggle-img"></div>
						</a>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div id="bio4" class="collapse">
<?php
	$filtro="3";
	$totale=numeroElementiTipo($tabellae, $filtro);
	if($totale==0){
?>
							<div class="no-elementi-bio">
								There isn't projects.
							</div>
<?php
	}
	else{
		$risposta=elementiFiltroTipo($tabellae, $filtro);
		while($riga=mysql_fetch_array($risposta)){
?>
							<div class="experience">
								<div class="titolo-experience">
									<?php echo $riga['nome_en']; ?>
								</div>
								<div class="anno-experience">
									Period: <?php echo $riga['periodo']; ?>
								</div>
								<div class="testo-aperto-bio">
									<?php echo $riga['testo_en']; ?>
								</div>
							</div>
<?php
		}
	}
?>
						</div>
					</div>
				</div>
				
				<!-- STRUTTURA SINGOLO ELEMENTO BIOSKETCH -->
				<div class="lista-bio distanza-sotto">
					<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10">
						<div class="titolo-lista-bio">CURRENT AND PAST COURSES</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 ruota">
						<a href="javascript:void(0)" data-toggle="collapse" data-target="#bio5" class="collapsed">
							<div class="toggle-img"></div>
						</a>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div id="bio5" class="collapse">
<?php
	$filtro="4";
	$totale=numeroElementiTipo($tabellae, $filtro);
	if($totale==0){
?>
							<div class="no-elementi-bio">
								There isn't courses.
							</div>
<?php
	}
	else{
		$risposta=elementiFiltroTipo($tabellae, $filtro);
		while($riga=mysql_fetch_array($risposta)){
?>
							<div class="technical-skills">
								<div class="titolo-technical">
									<?php echo $riga['nome_en']; ?>
								</div>
								<div class="testo-aperto-bio">
									<?php echo $riga['testo_en']; ?>
								</div>
							</div>
<?php
		}
	}
?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	
	
<?php
	include("footer.php");
?>