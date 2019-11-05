

<?php
	error_reporting(0);
	//INCLUDO I FILE CONFIG E FUNZIONI PER IL COLLEGAMENTO CON IL DB
	include_once("manager/config.php");
	include_once("manager/funzioni.php");
	
	//TITOLO DELLA PAGINA
	$titolo="Home";
	
	//INCLUDO I FILE HEADER E MENU
	include("/header.php");
	include("/menu.php");
	echo "iiiiiiiii";
	//VARIABILI PER RICAVARE DA DB GLI ELEMENTI DELLA PAGINA
	$tabella="home";
	$percorso="/file/home";
	$idhome=1;
	$riga=elementoDaId($tabella, $idhome);
?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="container">
			
			<!-- COLONNA DI SX -->
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-padding">
				<!-- BIO PARTE SUPERIORE -->
				<div class="col-lg-3 col-md-3 col-sm-3 distanza no-padding">
					<!-- IMG TITOLARE SITO -->
					<img src="<?php echo $percorso."/".$riga['img']; ?>" class="img-profilo img-responsive" />
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 distanza no-padding-xs">
					<div class="testo-home">
						<!-- TESTO -->
						<?php echo $riga['testo_it']; ?>
					</div>
				</div>
				<!-- DIVISORE -->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 distanza no-padding">
					<div class="linea-verde"></div>
				</div>
				<!-- POSIZIONE PARTE INFERIORE -->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 distanza no-padding">
					<div class="titolo-position titolo-home font-verde vollkorn">
						POSIZIONE
					</div>
					<div class="testo-position">
						<!-- STAMPO POSIZIONE -->
						<?php echo $riga['posizione_it']; ?>
					</div>
				</div>
				<!-- MAPPA GOOGLE MAPS -->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 distanza no-padding-xs">
					<iframe src="<?php echo $riga['mappa']; ?>" class="google-map" height="247" frameborder="0" style="border:0"></iframe>
				</div>
			</div>
			
			<!-- COLONNA DI DX -->
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 no-padding">
				<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 distanza fix-colonna-news">
					<!-- NEWS -->
					<div class="colonna-dx">
						<div class="colonna-dx-colore1">
						</div>
						<div class="titolo-colonna-dx font-verde text-center vollkorn">News</div>
<?php
	//STAMPO NEWS DA DB
	$tabellanews="news";
	$totale=numeroElementi($tabellanews);
	//SE LA TABELLA NEWS E' VUOTA
	if($totale==0){
?>
						<div class="notizia-home">
							Non sono presenti news.
						</div>
<?php
		$totale++;
	}
	//SE INVECE CONTIENE UNO O PIU' ELEMENTI, STAMPO LA/LE NEWS
	else{
		$i=0;
		$rispostanews=elementiTabellaLimit($tabellanews);
		while($riganews=mysql_fetch_array($rispostanews)){
			if($i==0){
?>
						<div class="notizia-home no-bordo">
<?php
			}
			else{
?>
						<div class="notizia-home">
<?php
			}
?>
							<a href="javascript:void(0)" data-toggle="modal" data-target="#news<?php echo $riganews['id']; ?>">
								<div class="titolo-news">
<?php
			//MAX CARATTERI
			$maxCaratteri=30; 
			$caratteri=strlen($riganews['titolo_it']); 
			if ($caratteri>$maxCaratteri){
				echo substr($riganews['titolo_it'], 0, $maxCaratteri)."...";
			}
			else{
				echo $riganews['titolo_it'];
			}
?>
								</div>
							</a>
							<div class="data-news">
<?php
			//RISCRIVERE LA DATA NEL FORMATO GIORNO-MESE-ANNO
			echo date("d-m-Y", strtotime($riganews['data']));	
?>
							</div>
						</div>
<?php
			$i++;
		}
	}
	//SE LE NEWS SONO MENO DI 4, AGGIUNGO BLOCCHI DI NEWS VUOTI
	if($totale<4){
		$manca=4-$totale;
		for($i=0;$i<$manca;$i++){
?>
						<div class="notizia-home">
							&nbsp;
						</div>
<?php
		}
	}
?>
					</div>
				</div>
			
<?php
	//STAMPO I MODAL COLLEGATI ALLE NEWS
	$totale=numeroElementi($tabellanews);
	if($totale>0){
		$rispostanews=elementiTabellaLimit($tabellanews);
		while($riganews=mysql_fetch_array($rispostanews)){
?>			
				<div class="modal fade" id="news<?php echo $riganews['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="news<?php echo $riganews['id']; ?>Label" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel">
									<?php echo $riganews['titolo_it']; ?>
								</h4>
							</div>
							<div class="modal-body">
								<div class="data-news">
									<?php echo date("d-m-Y", strtotime($riganews['data'])); ?>
								</div>
								<br /><br />
								<?php echo $riganews['testo_it']; ?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
							</div>
						</div>
					</div>
				</div>
<?php
		}
	}
?>
				<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 distanza fix-colonna-contacts">
					<!-- CONTATTI -->
					<div class="colonna-dx spazio-contact">
						<div class="colonna-dx-colore1">
						</div>
						<div class="titolo-colonna-dx font-verde text-center vollkorn">Contatti</div>
						<!-- STAMPO TUTTI I CONTATTI, CON RELATIVO LINK DA DB -->
						<div class="contact-home-first">
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 align-right">
								<img src="img/facebook.png" class="img-contact">
							</div>
							<div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
								<div class="testo-contact"><a href="<?php echo $riga['facebook_link']; ?>" target="_blank"><?php echo $riga['facebook']; ?></a></div>
							</div>
						</div>
						<div class="contact-home">
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 align-right">
								<img src="img/twitter.png" class="img-contact">
							</div>
							<div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
								<div class="testo-contact"><a href="<?php echo $riga['twitter_link']; ?>" target="_blank"><?php echo $riga['twitter']; ?></a></div>
							</div>
						</div>
						<div class="contact-home">
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 align-right">
								<img src="img/mail.png" class="img-contact">
							</div>
							<div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
								<div class="testo-contact"><a href="mailto:<?php echo $riga['mail']; ?>"><?php echo $riga['mail']; ?></a></div>
							</div>
						</div>
						<div class="contact-home-last">
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 align-right">
								<img src="img/phone.png" class="img-contact">
							</div>
							<div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
								<div class="testo-contact"><a href="tel:<?php echo str_replace(" ", "", $riga['phone']); ?>"><?php echo $riga['phone']; ?></a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php
	//INCLUDO FILE FOOTER
	include("footer.php");
?>