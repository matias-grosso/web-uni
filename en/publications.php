<?php
	error_reporting(0);
	//INCLUDO I FILE CONFIG E FUNZIONI PER IL COLLEGAMENTO CON IL DB
	include_once("../manager/config.php");
	include_once("../manager/funzioni.php");
	
	//TITOLO DELLA PAGINA
	$titolo="Publications";
	
	//VARIABILI PER RICAVARE DA DB GLI ELEMENTI DELLA PAGINA
	$tabella="pub";
	$percorso="../file/pub";
	$art="1";
	$lib="2";
	
	//INCLUDO I FILE HEADER E MENU
	include("header.php");
	include("menu.php");
?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="container">
			<!-- TITOLO SEZIONE -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 distanza-sopra no-padding">
				<div class="titolo-pub vollkorn">
					ARTICLES
				</div>
			</div>
			<!-- SEZIONE ARTICOLI -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding-xs">
<?php
	//STAMPO ARTICOLI DA DB
	$totale=numeroElementiTipo($tabella, $art);
	//SE LA TABELLA E' VUOTA
	if($totale==0){
?>
				<div class="no-articolo">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						There isn't articles.
					</div>
				</div>
<?php
	}
	//SE INVECE CONTIENE UNO O PIU' ARTICOLI
	else{
		$risposta=elementiFiltroTipo($tabella, $art);
		while($riga=mysql_fetch_array($risposta)){
?>
				<!-- STRUTTURA SINGOLO ARTICOLO -->
				<div class="articolo">
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
						<!-- TITOLO -->
						<div class="titolo-articolo">
							<?php echo $riga['titolo']; ?>
						</div>
						<!-- EVENTUALI EXTRA -->
						<div class="extra-articolo">
							<?php echo $riga['extra']; ?>
						</div>
					</div>
					<!-- IMMAGINE + O - PER APRIRE IL COLLAPSE -->
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 cambio padding-img-pub icon-right">
						<a href="javascript:void(0)" data-toggle="collapse" data-target="#art<?php echo $riga['id']; ?>" class="collapsed">
							<div class="toggle-img"></div>
						</a>
					</div>
					<!-- IMMAGINE PDF PER VISUALIZZARE/SCARICARE L'ARTICOLO -->
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 icon-right">
						<a href="<?php echo $percorso."/".$riga['pdf']; ?>" target="_blank"><img src="../img/pdf.png" class="img-pub" /></a>
					</div>
					<!-- STRUTTURA COLLAPSE -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div id="art<?php echo $riga['id']; ?>" class="collapse">
							<!-- ABSTRACT ARTICOLO -->
							<div class="testo-aperto-pub">
								<?php echo $riga['testo_en']; ?>
							</div>
						</div>
					</div>
				</div>
				
<?php
		}
	}
?>
			</div>
		</div>
		<div class="container">
			<!-- TITOLO SEZIONE -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 distanza-sopra no-padding">
				<div class="titolo-pub vollkorn">
					BOOKS
				</div>
			</div>
			<!-- SEZIONE LIBRI -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 distanza-sotto no-padding-xs">
<?php
	//STAMPO LIBRI DA DB
	$totale=numeroElementiTipo($tabella, $lib);
	//SE LA TABELLA E' VUOTA
	if($totale==0){
?>
				<div class="no-articolo">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						There isn't books.
					</div>
				</div>
<?php
	}
	//SE INVECE CONTIENE UNO O PIU' LIBRI
	else{
		$risposta=elementiFiltroTipo($tabella, $lib);
		while($riga=mysql_fetch_array($risposta)){
?>
					<!-- STRUTTURA SINGOLO LIBRO -->
					<div class="articolo">
						<div class="col-lg-11 col-md-11 col-sm-11 col-xs-9">
							<!-- TITOLO LIBRO -->
							<div class="titolo-articolo">
								<?php echo $riga['titolo']; ?>
							</div>
							<!-- EVENTUALI EXTRA -->
							<div class="extra-articolo">
								<?php echo $riga['extra']; ?>
							</div>
						</div>
						<!-- IMMAGINE CARRELLO CON LINK DIRETTO PER L'ACQUISTO DEL LIBRO -->
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3 icon-right">
							<a href="<?php echo $riga['link']; ?>" target="_blank"><img src="../img/buy.png" class="img-pub" /></a>
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
	
<?php
	include("footer.php");
?>