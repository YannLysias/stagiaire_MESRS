<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
    <title>Stagiaire MESRS</title>
    <meta name="description" content="">	
	<meta name="author" content="">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


	<!-- Favicons
	================================================== -->
	<link rel="icon" href="/Acceuil/images/emblème2.jpg" type="image/x-icon" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/Acceuil/img/favicon/favicon-144x144.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/Acceuil/img/favicon/favicon-72x72.png">
	<link rel="apple-touch-icon-precomposed" href="/Acceuil/img/favicon/favicon-54x54.png">
	
	<!-- CSS
	================================================== -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="/Acceuil/css/bootstrap.min.css">
	<!-- Template styles-->
	<link rel="stylesheet" href="/Acceuil/css/style.css">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="/Acceuil/css/responsive.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="/Acceuil/css/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="/Acceuil/css/animate.css">
	<!-- Prettyphoto -->
	<link rel="stylesheet" href="/Acceuil/css/prettyPhoto.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="/Acceuil/css/owl.carousel.css">
	<link rel="stylesheet" href="/Acceuil/css/owl.theme.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="/Acceuil/css/flexslider.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="/Acceuil/css/cd-hero.css">
	<!-- Style Swicther -->
	<link id="style-switch" href="/Acceuil/css/presets/preset3.css" media="screen" rel="stylesheet" type="text/css">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>


<body>

@if (session('success'))
        <div class="custom-alert" id="custom-alert">
            <p>{{ session('success') }}</p>
            <button onclick="closeAlert()">OK</button>
        </div>
        <script>
            function closeAlert() {
                document.getElementById('custom-alert').style.display = 'none';
            }
        </script>
    @endif
	<style>
		.custom-alert {
			position: fixed;
			top: 20%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: #28a745;
			color: #fff;
			padding: 15px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			z-index: 1000;
			text-align: center;
		}
		.custom-alert button {
			background: none;
			border: none;
			color: #fff;
			font-size: 1.2rem;
			margin-left: 10px;
			cursor: pointer;
		}
	</style>

	<!-- Header start -->
	<header id="header" class="navbar-fixed-top header" role="banner">
		<div class="container">
			<div class="row">
				<!-- Logo start -->
				<div class="navbar-header">
				   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
				    <div class="navbar-brand navbar-bg">
					    <a href="index.html">
					    	<img class="img-responsive" src="/Acceuil/images/MESRS.png" alt="logo">
					    </a> 
				    </div>                   
				</div><!--/ Logo end -->
				<nav class="collapse navbar-collapse clearfix" role="navigation">
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item active"><a class="nav-link" href="#">Accueil</a></li>
						<li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#suiviModal">Suivi</a></li>
						<li class="nav-item"><a class="nav-link" href="apropos">À propos</a></li>
						<li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    </ul>
				</nav><!--/ Navigation end -->
			</div><!--/ Row end -->
		</div><!--/ Container end -->
	</header><!--/ Header end -->

	<!-- Suivi Modal -->
	<div class="modal fade" id="suiviModal" tabindex="-1" role="dialog" aria-labelledby="suiviModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="suiviModalLabel">Suivi de la demande de stage</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="suiviForm" method="POST" action="{{ route('stagiaire.suivi') }}">
						@csrf
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" id="email" name="email" required>
						</div>
						<button type="submit" class="btn btn-primary">Suivre</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Suivi Modal -->

	<!-- Slider start -->
	<section id="home" class="no-padding">	
    	<div id="main-slide" class="cd-hero">
			<ul class="cd-hero-slider">
				<li class="selected">
					<div class="overlay2">
						<img class="" src="/Acceuil/images/slider/bg1.jpg" alt="slider">
					</div>
					<div class="cd-full-width">
						<h2>Trouvez votre voie avec nos opportunités de stage</h2>
						<h3>Postulez dès maintenant !</h3>
						<a href="/stage/create" class="btn btn-primary white cd-btn">Faire une demande</a>
						<a href="/login" class="btn btn-primary solid cd-btn">Se connecter</a>
					</div> <!-- .cd-full-width -->
				</li>	
			</ul> <!--/ cd-hero-slider -->
		</div><!--/ Main slider end -->    	
    </section> <!--/ Slider end -->


    <!-- Service box start -->
	<section id="service" class="service angle">
		<div class="container">
			<div class="row">
				<div class="col-md-12 heading">
					<span class="title-icon pull-left"><i class="fa fa-cogs"></i></span>
					<h2 class="title">Ce qu'il vous faut pour faire la demande<span class="title-desc">Les documents mentionnés ci-dessus sont essentiels pour compléter votre demande avec succès. Chaque document joue un rôle spécifique dans le processus de demande, qu'il s'agisse de fournir des informations sur votre parcours académique et professionnel, de démontrer vos compétences et réalisations, ou de répondre aux exigences administratives. Assurez-vous d'avoir tous les documents requis avant de soumettre votre demande pour éviter tout retard ou toute complication dans le processus.</span></h2>
				</div>
			</div><!-- Title row end -->

			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3 col-sm-3 wow fadeInDown" data-wow-delay=".5s">
						<div class="service-content text-center">
							<span class="service-icon icon-pentagon"><i class="fa fa-file-text-o"></i></span>
							<h3>Curriculum vitae (CV)</h3>
							<p> Le curriculum vitae (CV) est un document qui résume votre parcours professionnel, vos compétences et vos réalisations. Il est utilisé lors des candidatures à des emplois ou des opportunités académiques.</p>
						</div>
					</div><!--/ End first service -->
			
					<div class="col-md-3 col-sm-3 wow fadeInDown" data-wow-delay=".8s" >
						<div class="service-content text-center">
							<span class="service-icon icon-pentagon"><i class="fa fa-file-text"></i></span>
							<h3>Lettre de recommandation de l'école pour les stages académiques. Pour les stages professionnels, votre dernier diplôme</h3>
							<p>La lettre de recommandation de l'école est un document rédigé par un membre du corps professoral ou un superviseur académique, recommandant un étudiant pour un stage académique ou professionnel. Elle met en lumière les compétences, les réalisations et les qualités professionnelles de l'étudiant.</p>
						</div>
						
					</div><!--/ End Second service -->
			
					<div class="col-md-3 col-sm-3 wow fadeInDown" data-wow-delay="1.1s">
						<div class="service-content text-center">
							<span class="service-icon icon-pentagon"><i class="fa fa-pencil"></i></span>
							<h3>Une demande manuscrite auprès de la direction de la planification d'Administration et de Finance (DPAF)*</h3>
							<p>La demande manuscrite est une lettre formelle écrite à la main adressée à la direction de la planification d'Administration et de Finance (DPAF). Elle est utilisée pour demander des informations, des autorisations ou des actions spécifiques liées à l'administration et aux finances.</p>
						</div>
					</div><!--/ End Third service -->
			
					<div class="col-md-3 col-sm-3 wow fadeInDown" data-wow-delay="1.4s">
						<div class="service-content text-center">
							<span class="service-icon icon-pentagon"><i class="fa fa-users"></i></span>
							<h3>Si vous êtes en binôme, vous allez d'abord vous inscrire et ensuite votre binôme</h3>
							<p> Cette étape concerne les étudiants inscrits en binôme. Pour commencer, un des membres du binôme doit s'inscrire, puis le deuxième membre peut s'inscrire en utilisant les informations fournies par le premier membre. Cela garantit que les deux membres sont enregistrés correctement en tant que binôme.</p>
						</div>
					</div><!--/ End 4th service -->
				</div>
			</div><!-- Content row end -->
		</div><!--/ Container end -->
	</section><!--/ Service box end -->
   			
	</footer><!-- Footer end -->
	

	<!-- Copyright start -->
	<section id="copyright" class="copyright angle">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="footer-social unstyled">
						<li>
							<a title="Twitter" href="#">
								<span class="icon-pentagon wow bounceIn"><i class="fa fa-twitter"></i></span>
							</a>
							<a title="Facebook" href="#">
								<span class="icon-pentagon wow bounceIn"><i class="fa fa-facebook"></i></span>
							</a>
							<a title="Google+" href="#">
								<span class="icon-pentagon wow bounceIn"><i class="fa fa-google-plus"></i></span>
							</a>
							<a title="linkedin" href="#">
								<span class="icon-pentagon wow bounceIn"><i class="fa fa-linkedin"></i></span>
							</a>
							
						</li>
					</ul>
				</div>
			</div><!--/ Row end -->
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="copyright-info">
         			 &copy; Copyright 2024 MESRS - Bénin. <span>Demande Stage</span>
        			</div>
				</div>
			</div><!--/ Row end -->
		   <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix">
				<button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-double-up"></i></button>
			</div>
		</div><!--/ Container end -->
	</section><!--/ Copyright end -->

	<!-- Javascript Files
	================================================== -->

	<!-- initialize jQuery Library -->
	<script type="text/javascript" src="/Acceuil/js/jquery.js"></script>
	<!-- Bootstrap jQuery -->
	<script type="text/javascript" src="/Acceuil/js/bootstrap.min.js"></script>
	<!-- Style Switcher -->
	<script type="text/javascript" src="/Acceuil/js/style-switcher.js"></script>
	<!-- Owl Carousel -->
	<script type="text/javascript" src="/Acceuil/js/owl.carousel.js"></script>
	<!-- PrettyPhoto -->
	<script type="text/javascript" src="/Acceuil/js/jquery.prettyPhoto.js"></script>
	<!-- Bxslider -->
	<script type="text/javascript" src="/Acceuil/js/jquery.flexslider.js"></script>
	<!-- CD Hero slider -->
	<script type="text/javascript" src="/Acceuil/js/cd-hero.js"></script>
	<!-- Isotope -->
	<script type="text/javascript" src="/Acceuil/js/isotope.js"></script>
	<script type="text/javascript" src="/Acceuil/js/ini.isotope.js"></script>
	<!-- Wow Animation -->
	<script type="text/javascript" src="/Acceuil/js/wow.min.js"></script>
	<!-- SmoothScroll -->
	<script type="text/javascript" src="/Acceuil/js/smoothscroll.js"></script>
	<!-- Eeasing -->
	<script type="text/javascript" src="/Acceuil/js/jquery.easing.1.3.js"></script>
	<!-- Counter -->
	<script type="text/javascript" src="/Acceuil/js/jquery.counterup.min.js"></script>
	<!-- Waypoints -->
	<script type="text/javascript" src="/Acceuil/js/waypoints.min.js"></script>
	<!-- Template custom -->
	<script type="text/javascript" src="/Acceuil/js/custom.js"></script>
	</div><!-- Body inner end -->
</body>
</html>