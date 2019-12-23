<!doctype html>
<html ng-app="storeApp">
	<head>
		<title>Adebayo Peter Olaonipekun | Software Developer | Database Administrator</title>
		<meta charset="utf-8">
		<meta name="author" content="Adebayo Peter Olaonipekun">
		<meta name="description" content="My name is Adebayo Peter Olaonipekun, a software developer in Lagos Nigeria. I am skilled in 
		.NET (C#, Visual Basis), PHP, Mean Stack, Ruby on Rails, Python, JavaScript, Ajax, CSS, HTML5 and also in RDBMS like MySQL, 
		MongoDB, SQL Server and Oracle.">

		<!-- Open Graph data Facebook -->
		<meta property="fb:app_id" content="248057985582942" />
		<meta property="og:title" content="Adebayo Peter Olaonipekun | Software Developer | Database Administrator">
		<meta property="og:url" content="http://adebayopeter.com/">
		<meta property="og:image" content="http://adebayopeter.com/img/adebayopeterola2.jpg">
		<meta property="og:description" content="My name is Adebayo Peter Olaonipekun, a software developer in Lagos Nigeria. I am skilled in 
		.NET (C#, Visual Basis), PHP, Mean Stack, Ruby on Rails, Python, JavaScript, Ajax, CSS, HTML5 and also in RDBMS like MySQL, 
		MongoDB, SQL Server and Oracle.">

		<!-- Schema.org markup for Google+ -->
		<meta itemprop="name" content="Adebayo Peter Olaonipekun | Software Developer | Database Administrator">
		<meta itemprop="description" content="My name is Adebayo Peter Olaonipekun, a software developer in Lagos Nigeria. I am skilled in 
		.NET (C#, Visual Basis), PHP, Mean Stack, Ruby on Rails, Python, JavaScript, Ajax, CSS, HTML5 and also in RDBMS like MySQL, 
		MongoDB, SQL Server and Oracle.">
		<meta itemprop="image" content="http://adebayopeter.com/img/adebayopeterola2.jpg">

		<!-- Twitter Card data -->
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@adebayopekunmi">
		<meta name="twitter:title" content="Adebayo Peter Olaonipekun | Software Developer | Database Administrator">
		<meta name="twitter:description" content="My name is Adebayo Peter Olaonipekun, a software developer in Lagos Nigeria. I am skilled in 
		.NET (C#, Visual Basis), PHP, Mean Stack, Ruby on Rails, Python, JavaScript, Ajax, CSS, HTML5 and also in RDBMS like MySQL, 
		MongoDB, SQL Server and Oracle.">
		<meta name="twitter:creator" content="@adebayopekunmi">
		<meta name="twitter:image:src" content="http://adebayopeter.com/img/adebayopeterola2.jpg">

		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/superslides.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/icons.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/animate.min.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/blue.css" class="colors">
		<link rel="shortcut icon" href="<?php echo BASE_URL; ?>img/ico/32.png" sizes="32x32" type="image/png"/>
		<link rel="apple-touch-icon-precomposed" href="<?php echo BASE_URL; ?>img/ico/60.png" type="image/png"/>
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo BASE_URL; ?>img/ico/72.png" type="image/png"/>
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo BASE_URL; ?>img/ico/120.png" type="image/png"/>
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo BASE_URL; ?>img/ico/152.png" type="image/png"/>
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div id="main-nav" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo BASE_URL; ?>">
						<img id="navlogo" src="<?php echo BASE_URL; ?>img/navlogo.png" alt="Adebayo Peter Olaonipekun" width="122" height="45">
					</a>

				</div>
				<div class="collapse navbar-collapse">
					<ul id="navigation" class="nav navbar-nav navbar-right text-center">
						<li><a href="<?php echo BASE_URL; ?>" class="<?php if ($section == "Home") { echo "active"; } ?>">Home</a></li>
						<li><a href="<?php echo BASE_URL; ?>aboutme/" class="<?php if ($section == "About Me") { echo "active"; } ?>">About Me</a></li>
						<li><a href="<?php echo BASE_URL; ?>projects/" class="<?php if ($section == "My Work") { echo "active"; } ?>">My Work</a></li>
						<li><a href="<?php echo BASE_URL; ?>blog/" class="<?php if ($section == "Blog") { echo "active"; } ?>">Blog</a></li>
						<li><a href="<?php echo BASE_URL; ?>gallery/" class="<?php if ($section == "Gallery") { echo "active"; } ?>">Gallery</a></li>
						<li><a href="<?php echo BASE_URL; ?>contact/" class="<?php if ($section == "Contact") { echo "active"; } ?>">Contact</a></li>
						<li class="dropdown">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">CV</button>
							<ul class="dropdown-menu">
								<li><a href="<?php echo BASE_URL; ?>resources/ADEBAYO_PETER_CV.pdf" target="_blank">CV/Resume</a></li>
						  	</ul>
						</li>

					</ul>
				</div>

			</div>
		</div>