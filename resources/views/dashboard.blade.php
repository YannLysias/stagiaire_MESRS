<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Stagiaire MESRS</title>
    <!-- Favicon-->
    <link rel="icon" href="/Acceuil/images/emblème2.jpg" type="image/x-icon" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="/Dashboard1/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="/Dashboard1/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="/Dashboard1/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="/Dashboard1/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="/Dashboard1/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="/Dashboard1/css/themes/all-themes.css" rel="stylesheet" />
</head>
<style>
        .welcome-message {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #2e7d32; /* Vert foncé */
            border-radius: 10px; /* Coins légèrement arrondis */
            text-align: center; /* Centrer le texte horizontalement */
            max-width: 600px; /* Limiter la largeur du bloc */
            margin: 0 auto; /* Centrer le bloc horizontalement */
            color: #ffffff; /* Couleur du texte en blanc pour un bon contraste */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre pour un effet de profondeur */
        }
        .welcome-message h3 {
            margin-top: 0;
            color: #ffffff; /* Couleur du titre en blanc */
        }
        .welcome-message p {
            text-align: justify; /* Justifier le texte pour une meilleure lisibilité */
            margin-top: 15px; /* Ajouter un espace entre le titre et le paragraphe */
            color: #d4edda; /* Couleur du paragraphe en vert clair */
        }
    </style>

<body class="theme-green">
    
    <section>
        <!-- Sidebar Section -->
        @include('layouts.sidebar')
    </section>

    @if (Auth::user()->role == "ChefService" || Auth::user()->role == "Stagiaire")
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2>DASHBOARD</h2>
                </div>
                
                <!-- Section de bienvenue -->
                <div class="welcome-message">
                    <h3>Bienvenue, {{ auth()->user()->nom }}!</h3>
                    <p>Nous sommes ravis de vous voir sur votre tableau de bord. Vous pouvez commencer à naviguer à partir des options disponibles sur la gauche.</p>
                </div>
                
                <!-- Le reste de votre contenu -->
                <div class="row clearfix">
                    <!-- Vos widgets et autres contenus ici -->
                </div>
            </div>
        </section>
    @else
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2>DASHBOARD</h2>
                </div>
                <!-- Widgets -->
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-green hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">location_city</i>
                            </div>
                            <div class="content">
                                <div class="text">LES STRUCTURE DU MESRS</div>
                                <div class="number">{{ $totalStructures }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-light-green hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">group</i>
                            </div>
                            <div class="content">
                                <div class="text">TOUS LES STAGIAIRES</div>
                                <div class="number">{{ $totalStagiaires }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-green hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">person_add</i>
                            </div>
                            <div class="content">
                                <div class="text">LES STAGIAIRES EN COURS</div>
                                <div class="number">{{ $stagiairesEnCours }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-light-green hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">group</i>
                            </div>
                            <div class="content">
                                <div class="text">PERSONNELS ADMINISTRATIFS</div>
                                <div class="number">{{ $totalPersonnelsAdmin }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Widgets -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>Plan de Classement des Structures et Services</h2>
                            </div>
                            <div class="body">
                                @foreach($structures as $structure)
                                    <h4>{{ $structure->libelle }}</h4>
                                    <ul>
                                        @foreach($structure->services as $service)
                                            <li>{{ $service->libelle }}</li>
                                        @endforeach
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/jquery.countTo.js"></script>
    <script>
        $(function () {
            $('.count-to').countTo();
        });
    </script>
    

    <!-- Jquery Core Js -->
    <script src="/Dashboard1/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="/Dashboard1/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="/Dashboard1/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="/Dashboard1/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="/Dashboard1/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="/Dashboard1/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="/Dashboard1/plugins/raphael/raphael.min.js"></script>
    <script src="/Dashboard1/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="/Dashboard1/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="/Dashboard1/plugins/flot-charts/jquery.flot.js"></script>
    <script src="/Dashboard1/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="/Dashboard1/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="/Dashboard1/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="/Dashboard1/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="/Dashboard1/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="/Dashboard1/js/admin.js"></script>
    <script src="/Dashboard1/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="/Dashboard1/js/demo.js"></script>
 
</body>

</html>