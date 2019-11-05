<?php
	ob_start();session_start();
	
	//VARIABILI PER IL RECUPERO DEI DATI DA DB
	$titolo="Modifica informazioni principali";
	$id=$_GET['id'];
	$tabella="info";
	$percorso="../css";
	
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
					<li class="active">Modifica informazioni principali</li>
				</ol>
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
				<h2 class="text-center">Modifica informazioni principali</h2>
			</div>
		</div>
	
<?php
		//RICAVO ELEMENTO DAL PROPRIO ID
		$riga=elementoDaId($tabella, $id);
?>
	
		<div class="row spazio-alto">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				<!-- FORM CON I DATI GIA' INSERITI RECUPERATI DAL DB -->
				<form method="post" action="modificato-info.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Nome docete:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="text" name="nome_prof" class="form-control" placeholder="Nome docente con prefisso" value="<?php echo $riga['nome_prof']; ?>" />
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Nome uni:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="text" name="nome_uni" class="form-control" placeholder="Nome dell'università" value="<?php echo $riga['nome_uni']; ?>" />
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Favicon:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<?php
								if(!empty($riga['favicon'])){
							?>
							<img src="<?php echo $percorso."/".$riga['favicon']; ?>" style="max-height:300px;" />
							<?php
								}
								else{
									echo "Favicon non presente.";
								}
							?>
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Nuova favicon:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<div><b>La favicon deve avere estensione <code>.ico</code> e dimensioni <code>16x16px</code> o <code>32x32px</code> o <code>48x48px</code></b></div><br />
							<input type="file" name="favicon" />
							<input type="hidden" name="favicon_old" value="<?php echo $riga['favicon']; ?>">
						</div>
					</div>
					<div class="row spazio-sotto no-libro">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Testo footer ITA:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<textarea id="editorck_it" name="footer_it" class="form-control" placeholder="Testo"><?php echo $riga['footer_it']; ?></textarea>
							<script>CKEDITOR.replace('editorck_it');</script>
						</div>
					</div>
					<div class="row spazio-sotto no-libro">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Testo footer ENG:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<textarea id="editorck_en" name="footer_en" class="form-control" placeholder="Testo"><?php echo $riga['footer_en']; ?></textarea>
							<script>CKEDITOR.replace('editorck_en');</script>
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