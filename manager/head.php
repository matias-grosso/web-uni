<!-- INCLUDO FILE FUNZIONI -->
<?php include_once("funzioni.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
	$tabellainfo="info";
	$percorsoinfo="css";
	$idinfo=1;
	$info=elementoDaId($tabellainfo, $idinfo);
?>
	<!-- META TAG -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Manager">
	<meta name="author" content="Mattia Spizzo e Mattia Pedron">
	<link rel="shortcut icon" href="<?php echo $percorsoinfo."/".$info['favicon']; ?>">

    <title><?php echo $titolo; ?></title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	
	<!-- Custom CSS -->
	<link href="css/stile_manager.min.css" rel="stylesheet">
	
	<!-- Hack for IE8 -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!--CKEditor-->
	<script src="ckeditor/ckeditor.js"></script>
	
	<!-- jQuery 1.11.1 -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>