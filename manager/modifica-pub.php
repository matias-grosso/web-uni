<?php
	ob_start();session_start();
	
	//VARIABILI PER IL RECUPERO DEI DATI DA DB
	$titolo="Modifica publications";
	$id=$_GET['id'];
	$tabella="pub";
	$percorso="../file/pub";
	
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
					<li><a href="manager-pag-pub.php">Gestisci publications</a></li>
					<li class="active">Modifica publications</li>
				</ol>
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
				<h2 class="text-center">Modifica publications</h2>
			</div>
		</div>
	
<?php
		//RICAVO ELEMENTO DAL PROPRIO ID
		$riga=elementoDaId($tabella, $id);
?>
	
		<div class="row spazio-alto">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				<!-- FORM CON I DATI GIA' INSERITI RECUPERATI DAL DB -->
				<form method="post" action="modificato-pub.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Titolo:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="text" name="titolo" class="form-control" placeholder="Titolo" value="<?php echo $riga['titolo']; ?>" />
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Extra:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="text" name="extra" class="form-control" placeholder="Autori, anno..." value="<?php echo $riga['extra']; ?>" />
						</div>
					</div>
					<div class="row spazio-sotto">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Categoria:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<select name="tipo" class="form-control">
							  <option value="1" <?php if($riga['tipo']=="1") echo "selected"; ?>>Articolo</option>
							  <option value="2" <?php if($riga['tipo']=="2") echo "selected"; ?>>Libro</option>
							</select>
						</div>
					</div>
					<div class="row spazio-sotto no-articolo">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Link:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input type="text" name="link" class="form-control" placeholder="Link per comprare il libro" value="<?php echo $riga['link']; ?>"/>
						</div>
					</div>
					<div class="row spazio-sotto no-libro">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">PDF:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<?php
								if(!empty($riga['pdf'])){
							?>
							<a href="<?php echo $percorso."/".$riga['pdf']; ?>" target="_blank">File esistente</a>
							<?php
								}
							?>
							<input type="file" name="pdf" />
							<input type="hidden" name="pdf_old" value="<?php echo $riga['pdf']; ?>">
						</div>
					</div>
					<div class="row spazio-sotto no-libro">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Abstract ITA:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<textarea id="editorck_it" name="testo_it" class="form-control" placeholder="Testo"><?php echo $riga['testo_it']; ?></textarea>
							<script>CKEDITOR.replace('editorck_it');</script>
						</div>
					</div>
					<div class="row spazio-sotto no-libro">
						<div class="col-lg-2 col-md-2 col-sm-2 margin-xs">Abstract ENG:</div>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<textarea id="editorck_en" name="testo_en" class="form-control" placeholder="Testo"><?php echo $riga['testo_en']; ?></textarea>
							<script>CKEDITOR.replace('editorck_en');</script>
						</div>
					</div>
					<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
						<button type="submit" name="modifica" value="modifica" class="btn btn-lg btn-warning btn-block spazio-alto">Modifica</button>
					</div>
				</form>
			</div>
		</div>
		
		<script>
			if($("select").val()=="1"){
				$(".no-articolo").hide();
			}
			if($("select").val()=="2"){
				$(".no-libro").hide();
			}
			$("select").change(function(){
				if($("select").val()=="2"){
					$(".no-libro").fadeOut("slow");
					$(".no-articolo").fadeIn("slow");
				}
				else{
					$(".no-libro").fadeIn("slow");
					$(".no-articolo").fadeOut("slow");
				}
			});
		</script>

<?php
		include("footer.php");
	}
	ob_end_flush();
?>