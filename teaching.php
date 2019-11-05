<?php
	error_reporting(0);
	//INCLUDO I FILE CONFIG E FUNZIONI PER IL COLLEGAMENTO CON IL DB
	include_once("manager/config.php");
	include_once("manager/funzioni.php");
	
	//SE NELLA BARRA URL NON VIENE PASSATO NESSUN PARAMETRO 'A'
	if(isset($_GET['a'])){
		$anno_sel=$_GET['a'];
	}

	//TITOLO DELLA PAGINA
	$titolo="Teaching";
	
	//VARIABILI PER RICAVARE DA DB GLI ELEMENTI DELLA PAGINA
	$tabella="tea";
	$tabellafile="materiale";
	$percorso="file/tea";
	$filtro="anno";
	
	//INCLUDO I FILE HEADER E MENU
	include("header.php");
	include("menu.php");
?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="container">
			<!-- COLONNA DI SX -->
			<div class="col-lg-3 col-md-4 col-sm-3 distanza-sopra no-padding bordo-dx hidden-xs">
				<!-- TITOLO COLONNA DI SX -->
				<div class="titolo-teach vollkorn">
					ANNI
				</div>
<?php
	//STAMPO ANNI DA DB
	$totale=numeroElementi($tabella);
	//SE LA TABELLA E' VUOTA
	if($totale==0){
?>
				<div class="anno-teach">
					Non sono presenti anni.
				</div>
<?php
	}
	//SE INVECE CONTIENE UNO O PIU' ANNI
	else{
		$i=0;
		$risposta=elementiRaggruppati($tabella, $filtro);
		while($riga=mysql_fetch_array($risposta)){
			//SE NON C'E' UN'ANNO PASSATRO TRAMITE GET, QUELLO SELEZIONATO SARA' QUELLO PIU' RECENTE
			if(!isset($anno_sel)){
				if($i==0){
					$anno_sel=$riga['anno'];
?>
				<div class="anno-teach anno-attivo">
<?php
				}
				else{
?>
				<div class="anno-teach">
<?php
				}
?>
					<a href="teaching.php?a=<?php echo $riga['anno']; ?>">
						<?php echo $riga['anno']; ?>
					</a>
				</div>
<?php
				$i++;
			}
			//SE C'E' UN ANNO PASSATRO TRAMITE PARAMETRO GET, QUELLO SARA' L'ANNO SELEZIONATO
			else{
				if($riga['anno']==$anno_sel){
?>
				<div class="anno-teach anno-attivo">
					<a href="teaching.php?a=<?php echo $riga['anno']; ?>">
						<?php echo $riga['anno']; ?>
					</a>
				</div>

<?php
				}
				else{
?>
				<div class="anno-teach">
					<a href="teaching.php?a=<?php echo $riga['anno']; ?>">
						<?php echo $riga['anno']; ?>
					</a>
				</div>
<?php
				}
			}
		}
	}
?>
			</div>
			
			<!-- PER UNA MIGLIORE USABILITA' NEL MOBILE, E' STATO CREATO UN DROPDOWN PER LA SELEZIONE DEGLI ANNI -->
			<div class="col-xs-12 distanza-sopra no-padding visible-xs">
				<!-- TITOLO COLONNA DI SX -->
				<div class="titolo-teach vollkorn">
					ANNI
				</div>
<?php
	//STAMPO ANNI DA DB
	$totale=numeroElementi($tabella);
	//SE LA TABELLA E' VUOTA
	if($totale==0){
?>
				<div class="anno-teach">
					Non sono presenti anni.
				</div>
				<div class="dropdown">
<?php
	}
	//SE INVECE CONTIENE UNO O PIU' ANNI
	else{
		$i=0;
		$risposta=elementiRaggruppati($tabella, $filtro);
		while($riga=mysql_fetch_array($risposta)){
			if($i==0){
				//SE NON C'E' UN'ANNO PASSATRO TRAMITE GET, QUELLO SELEZIONATO SARA' QUELLO PIU' RECENTE
				if(!isset($anno_sel)){
					$anno_sel=$riga['anno'];
				}
?>
					<!-- CREO IL BOTTONE PER IL DROPDOWN CON L'ANNO SELEZIONATO -->
					<button class="btn btn-default dropdown-toggle sel-anno" type="button" id="dropdownMenu1" data-toggle="dropdown" style="width:100%;">
						<?php echo $anno_sel; ?>&nbsp;<span class="caret"></span>
					</button>
					<!-- INIZIO LISTA ALTRI ANNI -->
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="width:100%;">
<?php
				$i++;
			}
			if($i!=0){
				//CONTROLLO PER NON VISUALIZZARE L'ANNO SELEZIONATO NEL DROPDOWN
				if($riga['anno']!=$anno_sel){
?>
						<li role="presentation">
							<a role="menuitem" tabindex="-1" href="teaching.php?a=<?php echo $riga['anno']; ?>">
								<?php echo $riga['anno']; ?>
							</a>
						</li>
<?php
				}
			}
		}
	}
?>
					</ul>
				</div>
			
			<!-- COLONNA DI DX -->
			<div class="col-lg-9 col-md-8 col-sm-9 col-xs-12 distanza padding-corsi no-padding-xs">
				<!-- TITOLO COLONNA DX -->
				<div class="titolo-teach vollkorn">
					CORSI
				</div>
				
<?php
	//STAMPO CORSI DA DB
	$totale=numeroElementi($tabella);
	//SE LA TABELLA E' VUOTA
	if($totale==0){
?>
				<div class="corso-teach distanza-corso">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="titolo-corso">Non sono presenti corsi per l'anno selezionato.</div>
					</div>
				</div>
<?php
	}
	//SE INVECE CONTIENE UNO O PIU' CORSI
	else{
		$i=0;
		$risposta=elementiFiltroAnno($tabella, $anno_sel);
		while($riga=mysql_fetch_array($risposta)){
			if($i==0){
?>
				<!-- STRUTTURA SINGOLO CORSO CON MARGIN -->
				<div class="corso-teach distanza-corso">
<?php
			}
			else{
?>
				<!-- STRUTTURA SINGOLO CORSO SENZA MARGIN -->
				<div class="corso-teach">
<?php
			}
?>
					<!-- TITOLO CORSO -->
					<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10">
						<div class="titolo-corso"><?php echo $riga['nome']; ?></div>
					</div>
					<!-- IMMAGINE + O - PER APRIRE IL COLLAPSE -->
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 padding-img-tea">
						<a href="javascript:void(0)" data-toggle="collapse" data-target="#tea<?php echo $riga['id']; ?>" class="collapsed">
							<div class="toggle-img"></div>
						</a>
					</div>
					<!-- STRUTTURA COLLAPSE -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div id="tea<?php echo $riga['id']; ?>" class="collapse testo-aperto-teach">
							<!-- PROGRAMMA CORSO -->
							<div class="titolo-aperto-teach">
								PROGRAMMA CORSO
							</div>
							<?php echo $riga['testo_it']; ?>
							<!-- ORARIO -->
							<div class="titolo-aperto-teach">
								ORARI
							</div>
							<?php echo $riga['orari']; ?>
							<!-- MATERIALE -->
							<div class="titolo-aperto-teach">
								MATERIALE
							</div>
<?php
			//STAMPO MATERIALE DA DB
			$totale=numeroElementiFiltroCid($tabellafile, $riga['id']);
			//SE LA TABELLA E' VUOTA
			if($totale==0){
?>
							<div class="padding-no-materiale">
								Non sono presenti materiali per questo corso.
							</div>
<?php
			}
			//SE INVECE CONTIENE UNO O PIU' MATERIALE
			else{
?>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<?php
				$i=1;
				//SE LA META+1 DEL METERIALE E' SUPERIORE O UGUALE A 3, CREO DUE COLONNE
				$meta=ceil($totale/2);
				$risposta=elementiSottoTabella($tabellafile, $riga['id']);
				while($riga=mysql_fetch_array($risposta)){
					if($meta+1==$i && $meta+1>=3){
?>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<?php	
					}
?>
								<!-- STRUTTRA SINGOLO MATERIALE -->
								<div class="materiale">
									<!-- LINK PER VISUALIZZARE/SCARICARE IL MATERIALE -->
									<a href="<?php echo $percorso."/".$riga['file']; ?>" target="_blank">
										<!-- ICONA FILE -->
										<span class="glyphicon glyphicon-file"></span>
										<!-- NOME FILE -->
										<?php echo $riga['nome']; ?>
									</a>
								</div>
<?php
					$i++;
				}
?>
							</div>
<?php
			}
		$i++;
?>
						</div>
					</div>	
				</div>
<?php
		}
	}
?>
			</div>
		</div>
	</div>
	
<?php
	include("footer.php");
?>