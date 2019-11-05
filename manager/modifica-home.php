<?php
	ob_start();session_start();
	
	//VARIABILI PER IL RECUPERO DEI DATI DA DB
	$titolo="Modifica home";
	$id=$_GET['id'];
	$tabella="home";
	$percorso="../file/home";
	
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
					<li><a href="manager-pag-home.php">Gestisci home</a></li>
					<li class="active">Modifica home</li>
				</ol>
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
				<h2 class="text-center">Modifica home</h2>
			</div>
		</div>
	
<?php
		//RICAVO ELEMENTO DAL PROPRIO ID
		$riga=elementoDaId($tabella, $id);
?>
	
		<div class="row spazio-alto">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				<!-- FORM CON I DATI GIA' INSERITI RECUPERATI DAL DB -->
				<form method="post" action="modificato-home.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Foto esistente:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<?php
								if(!empty($riga['img'])){
							?>
							<img src="<?php echo $percorso."/".$riga['img']; ?>" style="max-height:300px;" />
							<?php
								}
								else{
									echo "<div>Foto non presente.</div>";
								}
							?>
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Nuova foto:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<div><b>Le dimensioni della foto devono essere</b> <code>190x310px</code></div><br />
							<input type="file" name="img" />
							<input type="hidden" name="img_old" value="<?php echo $riga['img']; ?>">
						</div>
					</div>
					<div class="row spazio-sotto no-libro">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Testo bio ITA:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<textarea id="editorck_it" name="testo_it" class="form-control" placeholder="Testo"><?php echo $riga['testo_it']; ?></textarea>
							<script>CKEDITOR.replace('editorck_it');</script>
						</div>
					</div>
					<div class="row spazio-sotto no-libro">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Testo bio ENG:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<textarea id="editorck_en" name="testo_en" class="form-control" placeholder="Testo"><?php echo $riga['testo_en']; ?></textarea>
							<script>CKEDITOR.replace('editorck_en');</script>
						</div>
					</div>
					<div class="row spazio-sotto no-libro">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Testo posizione ITA:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<textarea id="editorck_pit" name="posizione_it" class="form-control" placeholder="Testo"><?php echo $riga['posizione_it']; ?></textarea>
							<script>CKEDITOR.replace('editorck_pit');</script>
						</div>
					</div>
					<div class="row spazio-sotto no-libro">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Testo posizione ENG:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<textarea id="editorck_pen" name="posizione_en" class="form-control" placeholder="Testo"><?php echo $riga['posizione_en']; ?></textarea>
							<script>CKEDITOR.replace('editorck_pen');</script>
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Mappa:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<div style="color:red;"><b>Copiare solo, dal tag iframe, il contenuto dell'attributo src senza le virgolette</b></div>
							<input type="text" name="mappa" class="form-control" placeholder="Mappa Google Maps" value="<?php echo $riga['mappa']; ?>" />
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Nome Facebook:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="text" name="facebook" class="form-control" placeholder="Nome usato su Facebook" value="<?php echo $riga['facebook']; ?>" />
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Link Facebook:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="text" name="facebook_link" class="form-control" placeholder="Link al profilo Facebook" value="<?php echo $riga['facebook_link']; ?>" />
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Nome Twitter:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="text" name="twitter" class="form-control" placeholder="Nome usato su Twitter" value="<?php echo $riga['twitter']; ?>" />
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Link Twitter:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="text" name="twitter_link" class="form-control" placeholder="Link al profilo Twitter" value="<?php echo $riga['twitter_link']; ?>" />
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Email:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="email" name="mail" class="form-control" placeholder="Email" value="<?php echo $riga['mail']; ?>" />
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Telefono:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="tel" name="phone" class="form-control" placeholder="Telefono" value="<?php echo $riga['phone']; ?>" />
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