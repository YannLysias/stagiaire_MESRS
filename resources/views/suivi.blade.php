<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Stagiaire MESRS</title>
    <!-- Favicon-->
    <link rel="icon" href="/Acceuil/images/emblème2.jpg" type="image/x-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../Dashboard1/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../Dashboard1/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../Dashboard1/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="../../Dashboard1/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../Dashboard1/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../Dashboard1/css/themes/all-themes.css" rel="stylesheet" />
</head>
<style>
    .FORM-CONTAINRE{
       display: grid;  
    }

</style>

<body style="background-color: white">

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>


    <section class="FORM-CONTAINER d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="block-header text-center mb-4">
                <h3>Les informations de votre demande</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    @if(isset($stagiaire))
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="mb-1"><strong>Nom:</strong> {{ $stagiaire->user->nom }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="mb-1"><strong>Prénom:</strong> {{ $stagiaire->user->prenom }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="mb-1"><strong>Téléphone:</strong> {{ $stagiaire->user->telephone }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="mb-1"><strong>Sexe:</strong> {{ $stagiaire->user->sexe }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="mb-1"><strong>École:</strong> {{ $stagiaire->ecole }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="mb-1"><strong>Niveau:</strong> {{ $stagiaire->niveau }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="mb-1"><strong>État:</strong> {{ $stagiaire->etat }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="mb-1"><strong>Type:</strong> {{ $stagiaire->type }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <!-- Jquery Core Js -->
    <script src="../../Dashboard1/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../Dashboard1/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../Dashboard1/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../Dashboard1/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../Dashboard1/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../../Dashboard1/js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../../Dashboard1/js/demo.js"></script>
</body>

</html>