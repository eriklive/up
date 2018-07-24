		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	    <script type="text/javascript" src="https://descomplica.dceufabc.com/js/materialize.min.js"></script>
	    <script>
	    	$(document).ready(function() {
			    $('select').material_select();
			});
			$(document).ready(function(){
			    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
			    $('.modal').modal();
			});
			$(".button-collapse").sideNav();
			$(".bubble-wrap").click(function(){
				$(".bubble").toggleClass("active");
				$(".bubbleback").toggleClass("active");
				$(".first").toggleClass("active");
				$(".second").toggleClass("active");
				$(".third").toggleClass("active");
				$(".menuAlterado").toggleClass("active");
				$(".menu-1").toggleClass("active");
				$(".menu-2").toggleClass("active");
				$(".menu-3").toggleClass("active");
				$(".menu-4").toggleClass("active");
				$(".menu-5").toggleClass("active");

			});
			
			$(".triggerMenu").click(function(){
				$(".pageMenu").toggleClass("active");
				$(".menu-1").toggleClass("active");
				$(".menu-2").toggleClass("active");
				$(".menu-3").toggleClass("active");
				$(".menu-4").toggleClass("active");
				$(".menu-5").toggleClass("active");

			});
	    </script>

		<footer class="page-footer grey darken-3 card-movement-2">
			<div class="container">
				<div class="row">
					<div class="col m4 s12"></div>
					<div class="col m4 s12">
						<div class="row center">
							<div class="col m8 offset-m2 s6 offset-s3">
								<img src="../img/logo.png" alt="" class="responsive-img">
							</div>
						</div>
						<div class="row center">
							<span class="grey-text center">Desenvolvido por <a class="grey-text" href="https://www.facebook.com/harryerik" target="blank">Erik de Almeida</a> - <?php echo date("Y"); ?></span>
						</div>
					</div>
					<div class="col m4 12"></div>
				</div>
			</div>
		</footer>
	</body>
</html>