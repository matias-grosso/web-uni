		<!-- FOOTER -->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 distanza-sopra fascia-arancione-footer">
			&nbsp;
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fascia-marrone-footer">
			<div class="container">
				<div class="testo-footer float-left">
					<!-- STAMPO LE INFO DEL FOOTER -->
					<?php echo $info['footer_it']; ?>
				</div>
<?php
	//RICEVO DA DB I LINK DEI SOCIAL
	$tabellasocial="home";
	$idsocial=1;
	$social=elementoDaId($tabellasocial, $idsocial);
?>
				<div class="social-footer">	
					<a href="tel:<?php echo str_replace(" ", "", $riga['phone']); ?>"><div class="float-right social phone"></div></a>
					<a href="mailto:<?php echo $riga['mail']; ?>"><div class="float-right social mail"></div></a>
					<a href="<?php echo $riga['twitter_link']; ?>" target="_blank"><div class="float-right social twitter"></div></a>
					<a href="<?php echo $riga['facebook_link']; ?>" target="_blank"><div class="float-right social facebook"></div></a>
					<div class="testo-footer float-right">
						Contatta <?php echo $info['nome_prof']; ?> tramite
					</div>
				</div>
			</div>
		</div>
		
		<!-- BOOTSTRAP JAVASCRIPT -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		
	</body>
</html>