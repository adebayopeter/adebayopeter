<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="storeApp">
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
		<meta property="og:image" content="/img/adebayopeterola2.jpg">
		<meta property="og:description" content="My name is Adebayo Peter Olaonipekun, a software developer in Lagos Nigeria. I am skilled in 
		.NET (C#, Visual Basis), PHP, Mean Stack, Ruby on Rails, Python, JavaScript, Ajax, CSS, HTML5 and also in RDBMS like MySQL, 
		MongoDB, SQL Server and Oracle.">

		<!-- Schema.org markup for Google+ -->
		<meta itemprop="name" content="Adebayo Peter Olaonipekun | Software Developer | Database Administrator">
		<meta itemprop="description" content="My name is Adebayo Peter Olaonipekun, a software developer in Lagos Nigeria. I am skilled in 
		.NET (C#, Visual Basis), PHP, Mean Stack, Ruby on Rails, Python, JavaScript, Ajax, CSS, HTML5 and also in RDBMS like MySQL, 
		MongoDB, SQL Server and Oracle.">
		<meta itemprop="image" content="/img/adebayopeterola2.jpg">

		<!-- Twitter Card data -->
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@adebayopekunmi">
		<meta name="twitter:title" content="Adebayo Peter Olaonipekun | Software Developer | Database Administrator">
		<meta name="twitter:description" content="My name is Adebayo Peter Olaonipekun, a software developer in Lagos Nigeria. I am skilled in 
		.NET (C#, Visual Basis), PHP, Mean Stack, Ruby on Rails, Python, JavaScript, Ajax, CSS, HTML5 and also in RDBMS like MySQL, 
		MongoDB, SQL Server and Oracle.">
		<meta name="twitter:creator" content="@adebayopekunmi">
		<meta name="twitter:image:src" content="/img/adebayopeterola2.jpg">

		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/superslides.css">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/icons.css">
		<link rel="stylesheet" href="/css/animate.min.css">
		<link rel="stylesheet" href="/css/blue.css" class="colors">
		<link rel="shortcut icon" href="/img/ico/32.png" sizes="32x32" type="image/png"/>
		<link rel="apple-touch-icon-precomposed" href="/img/ico/60.png" type="image/png"/>
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/img/ico/72.png" type="image/png"/>
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/img/ico/120.png" type="image/png"/>
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/img/ico/152.png" type="image/png"/>
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
					<a class="navbar-brand" href="{{ url('/') }}">
						<img id="navlogo" src="/img/navlogo.png" alt="Adebayo Peter Olaonipekun" width="122" height="45">
					</a>

				</div>
				<div class="collapse navbar-collapse">
					<ul id="navigation" class="nav navbar-nav navbar-right text-center">
                    <li><a href="/" class="{{ $page === 'Home' ? 'active' : '' }}">Home</a></li>
						<li><a href="/aboutme" class="{{ $page === 'About Me' ? 'active' : '' }}">About Me</a></li>
						<li><a href="/projects" class="{{ $page === 'My Work' ? 'active' : '' }}">My Work</a></li>
						<li><a href="/blog" class="{{ $page === 'Blog' ? 'active' : '' }}">Blog</a></li>
						<li><a href="/gallery" class="{{ $page === 'Gallery' ? 'active' : '' }}">Gallery</a></li>
                        <li><a href="/contact" class="{{ $page === 'Contact' ? 'active' : '' }}">Contact</a></li>
						<li class="dropdown">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">CV</button>
							<ul class="dropdown-menu">
								<li><a href="/resources/ADEBAYO_PETER_CV.pdf" target="_blank">CV/Resume</a></li>
						  	</ul>
						</li>

					</ul>
				</div>

			</div>
        </div>
        

        <!-- My Contents -->
        @yield('content')


		<footer id="main-footer" class="dark-bg light-typo">
			<div class="container">
				<p class="pull-left copyright wow fadeInUp">&copy; adebayopeter.com {{ Carbon::now()->year }}.
				<!--<br>  Designed by <a href="http://www.adebayopeter.com" target="_blank">Adebayo Peter Olaonipekun</a>.<br>-->
				</p>

				<div class="pull-right paymentMethodImg copyright wow fadeInRight">
					<!--<a class="btn btn-store outline" href="#" data-toggle="modal" data-target=".text-modal">View my Resume</a>-->
					<a class="btn btn-store outline" href="/doc/ADEBAYO_PETER_CV.pdf" target="_blank" data-toggle="modal">
					View my Resume</a>
				</div>
			</div>
		</footer>

        @if ($page !== 'My Work')
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
            <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="/js/jquery.superslides.min.js"></script>
            <script type="text/javascript" src="/js/jquery.countdown.min.js"></script>
            <script type="text/javascript" src="/js/wow.min.js"></script>
            <script type="text/javascript" src="/js/custom.js"></script>
            <script type="text/javascript" src="/js/app2.js"></script>
        @else
            <!-- This are apis for project page -->
            <!-- load jquery -->
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

            <!-- Theme js -->
            <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>   
            <script type="text/javascript" src="/js/wow.min.js"></script>
            <script type="text/javascript" src="/js/custom.js"></script>
            <!-- Theme js -->

            <!-- load cubeportfolio -->
            <script type="text/javascript" src="/js/jquery.cubeportfolio.min.js"></script>

            <!-- init cubeportfolio -->
            <script type="text/javascript" src="/>js/cubeportfolio.main.js"></script>
        @endif

	</body>
</html>