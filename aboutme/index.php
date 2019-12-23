<?php
	// controller Codes Begins Here ---
	require_once('../inc/config.php');

	// View Codes - (Header) ---
	$section = "About Me";
	include(ROOT_PATH . 'inc/view/header.php');
?>
		<section id="about" class="padding-top-bottom ">
			<div class="container">
				<div class="row" style="padding-top:30px;">
					<div class="col-md-4 wow fadeInLeft">
						<header class="section-header cta-message">
							<h2>About Me</h2>
							<br><br>
							<div class="img-box speaker-photo">
								<!--<div class="hover-mask2"></div> -->
								<img src="<?php echo BASE_URL; ?>img/me.jpg" alt="Adebayo Peter Olaonipekun">
							</div>
							<br>

							<!-- My Oracle Cert -->
						  	<div data-iframe-width="250" data-iframe-height="270" data-share-badge-id="77ee478b-4465-40b5-8f23-0481829d7282"></div>
						  	<script type="text/javascript">
						    	(function() {
						      		var s = document.createElement('script');
					      			s.type = 'text/javascript';
						      		s.async = true;
					      			s.src = '//www.youracclaim.com/assets/utilities/embed.js';
						      		var o = document.getElementsByTagName('script')[0];
						      		o.parentNode.insertBefore(s, o);
						      	})();
						  	</script>
						  	<!-- My Oracle Cert -->

						</header>
					</div>
					<div class="col-md-8 cta-message wow fadeInUp">
						<p>
							My name is <b>Adebayo Peter Olaonipekun</b>, I am a Software Developer with over 6 years experience in programming.
							Graduated from the prestigious Obafemi Awolowo University Ile-Ife where I graduated with a second class upper degree in
							Economics. You might ask how then do I find myself in the ICT world.
						</p>
						<p>
							Even during my undergraduate days my love for ICT was know among my friends and collegues. So I started with the GUI designs 
							(HTML &amp; CSS) in 2008 and later graduated to writting server-side programming language (php) in 2009. With this, I was able 
							to get a job with the #1 ICT Learning Center on OAU Campus (Classic InfoTech System) as an Instructor (Web Design &amp; 
							Web Development).
						</p>
						<p>
							Worked with a company webcitti as a web developer after my NYSC service in 2012. Left in 2013 and joined Zellence Nigeria 
							Limited as a Software Developer till date.
						</p>
						<div style="display:none;" id="showme">
							<h2><b>My Objectives</b></h2>
							<p>
								I am highly resourceful, innovative, and competent software developer with extensive experience in the layout, design and 
								coding of websites specifically in .NET (C# &amp; VB), Python and PHP.
							</p>
							<p>
								Possessing considerable knowledge of the development of web applications and scripts using C#, VB, Python and PHP programming 
								language and MySQL, SQL Server &amp; Oracle databases.
							</p>
							<p>
								Experienced in developing applications and solutions for a wide range of corporate, charity and public sector clients 
								and having the enthusiasm and ambition to complete projects to the highest standard. Currently looking for an 
								opportunity to join a dynamic, ambitious, growing company and forge a career as a first class Oracle database 
								administrator. 
							</p>
						</div>
						<a class="btn btn-store outline" id="show-btn" href="#">Read more</a>
					</div>
				</div>
			</div>
		</section>
<?php
	// View Codes - (Header) ---
	include(ROOT_PATH . 'inc/view/footer.php');
?>
	</body>
</html>