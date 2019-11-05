<!-- DOCTYPE HTML5 -->
<!DOCTYPE html>
<html lang="en">
	<head>
<?php
	//DATI DA DB PER LE INFOMAZIONI PRINCIPALI DEL SITO
	$tabellainfo="info";
	$percorsoinfo="css";
	$idinfo=1;
	$info=elementoDaId($tabellainfo, $idinfo);
?>

		<!-- META TAG -->
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="Sito web personale del <?php echo $info['nome_prof']; ?>.">
	    <meta name="author" content="Mattia Spizzo e Mattia Pedron">
		
	    <link rel="icon" href="<?php echo $percorsoinfo."/".$info['favicon']; ?>">
		
		<!-- STAMPO IL TITOLO DELLA PAGINA -->
		<title><?php echo $titolo; ?></title>

	    <!-- BOOTSTRAP CSS -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	    <!-- CUSTOM CSS -->
	    <link rel="stylesheet" href="<?php echo $percorsoinfo; ?>/stile.min.css">
		
		<!-- FONT GOOGLE -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Vollkorn:400,700' rel='stylesheet' type='text/css'>
		
	    <!-- HACK FOR IE8 -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
			
		<!-- jQuery 1.11.1 -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		
	</head>