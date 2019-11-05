<?php
	//SE E' DICHIARATA LA VARIABILE $visible_footer ALLORA MOSTRA FOOTER
	if(!isset($visible_footer)){
?>
		<div class="row">
			<div class="col-lg-12">
				<div class="footer-testo">Mattia Spizzo &amp; Mattia Pedron &copy; <?php echo date("Y"); ?></div>
			</div>
		</div>
<?php
	}
?>
	</div>

	<!-- BOOTSTRAP JAVASCRIPT -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		
</body>
</html>