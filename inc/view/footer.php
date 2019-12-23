		<footer id="main-footer" class="dark-bg light-typo">
			<div class="container">
				<p class="pull-left copyright wow fadeInUp">&copy; adebayopeter.com <?php echo date("Y"); ?>.
				<!--<br>  Designed by <a href="http://www.adebayopeter.com" target="_blank">Adebayo Peter Olaonipekun</a>.<br>-->
				</p>

				<div class="pull-right paymentMethodImg copyright wow fadeInRight">
					<!--<a class="btn btn-store outline" href="#" data-toggle="modal" data-target=".text-modal">View my Resume</a>-->
					<a class="btn btn-store outline" href="<?php echo BASE_URL; ?>resources/ADEBAYO_PETER_CV.pdf" target="_blank" data-toggle="modal">
					View my Resume</a>
				</div>
			</div>
		</footer>

<?php if ($section != 'My Work') { ?>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<!--<script type="text/javascript" src="<?php echo BASE_URL; ?>js/jquery.singlePageNav.min.js"></script>-->
		<script type="text/javascript" src="<?php echo BASE_URL; ?>js/jquery.superslides.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>js/jquery.countdown.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>js/wow.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>js/custom.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>js/app.js"></script>

<?php } else { ?>

	<!-- This are apis for project page -->
    <!-- load jquery -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    <!-- Theme js -->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>   
	<script type="text/javascript" src="<?php echo BASE_URL; ?>js/wow.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>js/custom.js"></script>
	<!-- Theme js -->

    <!-- load cubeportfolio -->
    <script type="text/javascript" src="<?php echo BASE_URL; ?>js/jquery.cubeportfolio.min.js"></script>

    <!-- init cubeportfolio -->
    <script type="text/javascript" src="<?php echo BASE_URL; ?>js/cubeportfolio.main.js"></script>

<?php } ?>