<?php
	//INCLUDO FILE CONFIGURAZIONE DB
	include_once("config.php");

	//CONNESSIONE AL DB
	function dbConnect(){
		//$conn=mysql_connect(nome_host, nomeutente_db, password_db);
        $conn = mysqli_connect("localhost", "id11468329_matiasgrosso", "puntIgam17", "id11468329_main_db");
		echo "<br/>dbConnect2<br/>";
		if (!$conn) echo "Error: Unable to connect to MySQL.";
		mysql_select_db(nome_db, $conn) or die("Errore".mysql_error());
		return $conn;
	}
	
	//AUTENTICAZIONE UTENTE
	function dbAutentica($user, $pass){
		$conn=dbConnect();
		$sql="SELECT * FROM `accesso_manager` WHERE `user`='".$user."'";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		if($risposta && mysql_num_rows($risposta)>=1){
			$data=mysql_fetch_array($risposta);
			if($data['pass']==md5($pass)){
				$_SESSION['autenticato']=TRUE;
				$_SESSION['user']=$data['user'];
				$_SESSION['id']=$data['id'];
				return TRUE;
			}
		}
		else{
			return FALSE;
		}
	}
	
	//VERIFICA PASSWORD UTENTE
	function verificaPass($tabella, $id){
		$conn=dbConnect();
		$sql="SELECT * FROM `".$tabella."` WHERE `id`=".$id;
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		$riga=mysql_fetch_array($risposta);
		mysql_close($conn);
		return $riga;
	}
	
	//SALVA NUOVA PASSWORD
	function registraPass($tabella, $id, $nuova){
		$conn=dbConnect();
		$sql="UPDATE `".$tabella."` SET `pass`='".md5($nuova)."' WHERE `id`=".$id;
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return;
	}

	function numeroElementi($tabella){
		$conn=dbConnect();
		$sql="SELECT * FROM `".$tabella."` ORDER BY data DESC";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		$totale=mysql_num_rows($risposta);
		mysql_close($conn);
		return $totale;
	}
	
	//RICAVA NUMERO TOTALE ELEMENTI CON FILTRO cid
	function numeroElementiFiltroCid($tabella, $cid){
		$conn=dbConnect();
		$sql="SELECT * FROM `".$tabella."` WHERE `cid`='".$cid."' ORDER BY data DESC";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		$totale=mysql_num_rows($risposta);
		mysql_close($conn);
		return $totale;
	}
	
	//RICAVA NUMERO TOTALE ELEMENTI CON FILTRO tipo
	function numeroElementiTipo($tabella, $filtro){
		$conn=dbConnect();
		$sql="SELECT * FROM `".$tabella."` WHERE `tipo`='".$filtro."' ORDER BY data DESC";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		$totale=mysql_num_rows($risposta);
		mysql_close($conn);
		return $totale;
	}
	
	//RICAVA ELEMENTI
	function elementiTabella($tabella){
		$conn=dbConnect();
		$sql="SELECT * FROM `".$tabella."` ORDER BY data DESC";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $risposta;
	}
	
	//RICAVA ELEMENTI CON LIMITAZIONE
	function elementiTabellaLimit($tabella){
		$conn=dbConnect();
		$sql="SELECT * FROM `".$tabella."` ORDER BY data DESC LIMIT 4";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $risposta;
	}
	
	//RICAVA ELEMENTI CON DOPPIO ORDINAMENTO
	function elementiTabellaTipo($tabella){
		$conn=dbConnect();
		$sql="SELECT * FROM `".$tabella."` ORDER BY tipo, data";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $risposta;
	}
	
	//RICAVA ELEMENTI CON FILTRO cid
	function elementiSottoTabella($tabella, $cid){
		$conn=dbConnect();
		$sql="SELECT * FROM `".$tabella."` WHERE `cid`='".$cid."' ORDER BY data DESC";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $risposta;
	}
	
	//RICAVA ELEMENTI CON FILTRO id
	function elementoDaId($tabella, $id){
		$conn=dbConnect();
		$sql="SELECT * FROM `".$tabella."` WHERE `id`='".$id."'";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		$riga=mysql_fetch_array($risposta);
		mysql_close($conn);
		return $riga;
	}
	
	//RICAVA ELEMENTI CON FILTRO tipo
	function elementiFiltroTipo($tabella, $filtro){
		$conn=dbConnect();
		$sql="SELECT * FROM `".$tabella."` WHERE `tipo`='".$filtro."' ORDER BY data DESC";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $risposta;
	}
	
	//RICAVA ELEMENTI RAGGRUPPATI
	function elementiRaggruppati($tabella, $filtro){
		$conn=dbConnect();
		$sql="SELECT * FROM `".$tabella."` GROUP BY ".$filtro." ORDER BY ".$filtro." DESC";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $risposta;
	}
	
	//RICAVA ELEMENTI CON FILTRO anno
	function elementiFiltroAnno($tabella, $filtro){
		$conn=dbConnect();
		$sql="SELECT * FROM `".$tabella."` WHERE anno='".$filtro."' ORDER BY data DESC";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $risposta;
	}
	
	//SALVA PUBBLICAZIONE
	function registraPub($tabella, $tipo, $titolo, $extra, $link, $pdf, $testo_it, $testo_en){
		$conn=dbConnect();
		$data=date("Y-m-d H:m:s");
		if($link!=""){
			if(substr($link, 0, 3)!="htt"){
				$link="http://".$link;
			}
		}
		$sql="INSERT INTO `".$tabella."` (`data`, `tipo`, `titolo`, `extra`, `link`, `pdf`, `testo_it`, `testo_en`) VALUES(\"".$data."\", \"".$tipo."\", \"".$titolo."\", \"".$extra."\", \"".$link."\", \"".$pdf."\", \"".$testo_it."\", \"".$testo_en."\")";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $controllo=1;
	}
	
	//SALVA CORSO
	function registraTea($tabella, $nome, $anno, $orari, $testo_it, $testo_en){
		$conn=dbConnect();
		$data=date("Y-m-d H:m:s");
		$sql="INSERT INTO `".$tabella."` (`data`, `anno`, `nome`, `orari`, `testo_it`, `testo_en`) VALUES(\"".$data."\", \"".$anno."\", \"".$nome."\", \"".$orari."\", \"".$testo_it."\", \"".$testo_en."\")";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $controllo=1;
	}
	
	//SALVA MATERIALE
	function registraMateriale($tabella, $cid, $nome, $file){
		$conn=dbConnect();
		$data=date("Y-m-d H:m:s");
		$sql="INSERT INTO `".$tabella."` (`cid`, `data`, `nome`, `file`) VALUES(\"".$cid."\", \"".$data."\", \"".$nome."\", \"".$file."\")";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $controllo=1;
	}
	
	//SALVA EXTRA BIO
	function registraExtrabio($tabella, $nome_it, $nome_en, $tipo, $periodo, $testo_it, $testo_en){
		$conn=dbConnect();
		$data=date("Y-m-d H:m:s");
		$sql="INSERT INTO `".$tabella."` (`data`, `tipo`, `nome_it`, `nome_en`, `periodo`, `testo_it`, `testo_en`) VALUES(\"".$data."\", \"".$tipo."\", \"".$nome_it."\", \"".$nome_en."\", \"".$periodo."\", \"".$testo_it."\", \"".$testo_en."\")";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $controllo=1;
	}
	
	//SALVA NEWS
	function registraNews($tabella, $titolo_it, $titolo_en, $testo_it, $testo_en){
		$conn=dbConnect();
		$data=date("Y-m-d H:m:s");
		$sql="INSERT INTO `".$tabella."` (`data`, `titolo_it`, `titolo_en`, `testo_it`, `testo_en`) VALUES(\"".$data."\", \"".$titolo_it."\", \"".$titolo_en."\", \"".$testo_it."\", \"".$testo_en."\")";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $controllo=1;
	}

	//MODIFICA PUBBLICAZIONI
	function modificaPub($tabella, $id, $tipo, $titolo, $extra, $link, $pdf, $pdf_old, $testo_it, $testo_en, $percorso){
		$conn=dbConnect();
		if($pdf!=$pdf_old){
			unlink($percorso."/".$pdf_old);
		}
		if($tipo=="2"){
			unlink($percorso."/".$pdf_old);
			$testo_it="";
			$testo_en="";
		}
		if($tipo=="1"){
			$link="";
		}
		if($link!=""){
			if(substr($link, 0, 3)!="htt"){
				$link="http://".$link;
			}
		}
		$data=date("Y-m-d H:m:s");
		$sql="UPDATE `".$tabella."` SET `data`='".$data."', `tipo`='".$tipo."', `titolo`='".$titolo."', `extra`='".$extra."', `link`='".$link."', `pdf`='".$pdf."', `testo_it`='".$testo_it."', `testo_en`='".$testo_en."' WHERE `id`='".$id."'";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $controllo=1;
	}
	
	//MODIFICA CORSI
	function modificaTea($tabella, $id, $nome, $anno, $orari, $testo_it, $testo_en){
		$conn=dbConnect();
		$data=date("Y-m-d H:m:s");
		$sql="UPDATE `".$tabella."` SET `data`='".$data."', `anno`='".$anno."', `nome`='".$nome."', `orari`='".$orari."', `testo_it`='".$testo_it."', `testo_en`='".$testo_en."' WHERE `id`='".$id."'";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $controllo=1;
	}
	
	//MODIFICA MATERIALE
	function modificaMateriale($tabella, $id, $nome, $file, $file_old, $percorso){
		$conn=dbConnect();
		if($file!=$file_old){
			unlink($percorso."/".$file_old);
		}
		$data=date("Y-m-d H:m:s");
		$sql="UPDATE `".$tabella."` SET `data`='".$data."', `nome`='".$nome."', `file`='".$file."' WHERE `id`='".$id."'";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $controllo=1;
	}
	
	//MODIFICA BIOGRAFIA
	function modificaBio($tabella, $id, $testo_it, $testo_en, $img, $img_old, $percorso){
		$conn=dbConnect();
		if($img!=$img_old){
			unlink($percorso."/".$img_old);
		}
		$data=date("Y-m-d H:m:s");
		$sql="UPDATE `".$tabella."` SET `data`='".$data."', `testo_it`='".$testo_it."', `testo_en`='".$testo_en."', `img`='".$img."' WHERE `id`='".$id."'";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $controllo=1;
	}
	
	//MODIFICA EXTRA BIO
	function modificaExtrabio($tabella, $id, $nome_it, $nome_en, $tipo, $periodo, $testo_it, $testo_en){
		$conn=dbConnect();
		if($tipo=="2" || $tipo=="4"){
			$periodo="";
		}
		$data=date("Y-m-d H:m:s");
		$sql="UPDATE `".$tabella."` SET `data`='".$data."', `tipo`='".$tipo."', `nome_it`='".$nome_it."', `nome_en`='".$nome_en."', `periodo`='".$periodo."', `testo_it`='".$testo_it."', `testo_en`='".$testo_en."' WHERE `id`='".$id."'";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $controllo=1;
	}
	
	//MODIFICA INFORMAZIONI
	function modificaInfo($tabella, $id, $nome_prof, $nome_uni, $favicon, $favicon_old, $footer_it, $footer_en, $percorso){
		$conn=dbConnect();
		if($favicon!=$favicon_old){
			unlink($percorso."/".$favicon_old);
		}
		$data=date("Y-m-d H:m:s");
		$sql="UPDATE `".$tabella."` SET `data`='".$data."', `nome_prof`='".$nome_prof."', `nome_uni`='".$nome_uni."', `favicon`='".$favicon."', `footer_it`='".$footer_it."', `footer_en`='".$footer_en."' WHERE `id`='".$id."'";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $controllo=1;
	}
	
	//MODIFICA NEWS
	function modificaNews($tabella, $id, $titolo_it, $titolo_en, $testo_it, $testo_en){
		$conn=dbConnect();
		$data=date("Y-m-d H:m:s");
		$sql="UPDATE `".$tabella."` SET `data`='".$data."', `titolo_it`='".$titolo_it."', `titolo_en`='".$titolo_en."', `testo_it`='".$testo_it."', `testo_en`='".$testo_en."' WHERE `id`='".$id."'";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $controllo=1;
	}
	
	//MODIFICA HOME
	function modificaHome($tabella, $id, $testo_it, $testo_en, $img, $img_old, $posizione_it, $posizione_en, $mappa, $facebook, $facebook_link, $twitter, $twitter_link, $mail, $phone, $percorso){
		$conn=dbConnect();
		if($img!=$img_old){
			unlink($percorso."/".$img_old);
		}
		if($facebook_link!=""){
			if(substr($facebook_link, 0, 3)!="htt"){
				$facebook_link="http://".$facebook_link;
			}
		}
		if($twitter_link!=""){
			if(substr($twitter_link, 0, 3)!="htt"){
				$twitter_link="http://".$twitter_link;
			}
		}
		$data=date("Y-m-d H:m:s");
		$sql="UPDATE `".$tabella."` SET `data`='".$data."', `testo_it`='".$testo_it."', `testo_en`='".$testo_en."', `img`='".$img."', `posizione_it`='".$posizione_it."', `posizione_en`='".$posizione_en."', `mappa`='".$mappa."', `facebook`='".$facebook."', `facebook_link`='".$facebook_link."', `twitter`='".$twitter."', `twitter_link`='".$twitter_link."', `mail`='".$mail."', `phone`='".$phone."' WHERE `id`='".$id."'";
		$risposta=mysql_query($sql) or die("Errore ".mysql_error());
		mysql_close($conn);
		return $controllo=1;
	}

	//CANCELLA PUBBLICAZIONE
	function cancellaPub($tabella, $percorso, $elemento){
		$conn=dbConnect();
		$i=0;
		foreach($elemento as $id){
			if(strlen($id)>0){
				$sql="SELECT * FROM `".$tabella."` WHERE `id`='".$id."'";
				$risposta=mysql_query($sql) or die("Errore ".mysql_error());
				$riga=mysql_fetch_array($risposta);
				unlink($percorso."/".$riga['pdf']);
				$sql="DELETE FROM `".$tabella."` WHERE `id`='".$id."'";
				$risposta=mysql_query($sql) or die("Errore ".mysql_error());
				if($risposta){
					$eliminate[$i]=$id;
					$i++;
				}
				else
					echo "Errore!";
			}
		}
		mysql_close($conn);
		return $eliminate;
	}
	
	//CANCELLA CORSO
	function cancellaTea($tabella, $tabellafile, $percorso, $elemento){
		$conn=dbConnect();
		$i=0;
		foreach($elemento as $id){
			if(strlen($id)>0){
				$sql="SELECT * FROM `".$tabellafile."` WHERE `cid`='".$id."'";
				$risposta=mysql_query($sql) or die("Errore ".mysql_error());
				while($riga=mysql_fetch_array($risposta)){
					unlink($percorso."/".$riga['nome']);
					$sql="DELETE FROM `".$tabellafile."` WHERE `id`='".$riga['id']."'";
					mysql_query($sql);
				}
				$sql="DELETE FROM `".$tabella."` WHERE `id`='".$id."'";
				$risposta=mysql_query($sql) or die("Errore ".mysql_error());
				if($risposta){
					$eliminate[$i]=$id;
					$i++;
				}
				else
					echo "Errore!";	
			}
		}
		mysql_close($conn);
		return $eliminate;
	}

	//CANCELLA MATERIALE
	function cancellaMateriale($tabella, $percorso, $elemento){
		$conn=dbConnect();
		$i=0;
		foreach($elemento as $id){
			if(strlen($id)>0){
				$sql="SELECT * FROM `".$tabella."` WHERE `id`='".$id."'";
				$risposta=mysql_query($sql) or die("Errore ".mysql_error());
				$riga=mysql_fetch_array($risposta);
				unlink($percorso."/".$riga['file']);
				$sql="DELETE FROM `".$tabella."` WHERE `id`='".$id."'";
				$risposta=mysql_query($sql) or die("Errore ".mysql_error());
				if($risposta){
					$eliminate[$i]=$id;
					$i++;
				}
				else
					echo "Errore!";
			}
		}
		mysql_close($conn);
		return $eliminate;
	}

	//CANCELLA EXTRA BIO
	function cancellaExtrabio($tabella, $elemento){
		$conn=dbConnect();
		$i=0;
		foreach($elemento as $id){
			if(strlen($id)>0){
				$sql="DELETE FROM `".$tabella."` WHERE `id`='".$id."'";
				$risposta=mysql_query($sql) or die("Errore ".mysql_error());
				if($risposta){
					$eliminate[$i]=$id;
					$i++;
				}
				else
					echo "Errore!";
			}
		}
		mysql_close($conn);
		return $eliminate;
	}
	
	//CANCELLA NEWS
	function cancellaNews($tabella, $elemento){
		$conn=dbConnect();
		$i=0;
		foreach($elemento as $id){
			if(strlen($id)>0){
				$sql="DELETE FROM `".$tabella."` WHERE `id`='".$id."'";
				$risposta=mysql_query($sql) or die("Errore ".mysql_error());
				if($risposta){
					$eliminate[$i]=$id;
					$i++;
				}
				else
					echo "Errore!";
			}
		}
		mysql_close($conn);
		return $eliminate;
	}

?>