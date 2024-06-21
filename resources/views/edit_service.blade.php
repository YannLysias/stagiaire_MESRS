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

<body class="theme-red">

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
    <!-- #END# Search Bar -->

    <section>
        <<!-- layouts.sidebar -->
        @include('layouts.sidebar')
        <!-- layouts.sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Formulaire de modification</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Modifier un service
                            </h2>
                        </div>
                        <div class="body">
                            <form class="" action="{{ route('service.update', $service->id)}}" method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                @if ($service)
                                @method('PUT')
                                <label for="email_address">Code service</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="code_service" value="{{$service->code_service}}" id="email_address" class="form-control" placeholder="Entrer le nom de la service">
                                    </div>
                                    @error('code_service')
                                        <div class="d-block text-danger">{{$message}}</div>
                                        @enderror
                                </div>
                                <label for="password">Nom service</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="password" name="libelle" value="{{$service->libelle}}" class="form-control" placeholder="Entrer le code de la service">
                                    </div>
                                    @error('libelle')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="body">
                                    <div class="row clearfix ">
                                            <label for="password">Associer à une structure</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                            <select class="form-control show-tick" value="{{$service->structure_id}}" name="structure_id">
                                                <option value="" disabled selected>-- Choisir un structure --</option>
                                                    @foreach ($structures as $structure)
                                                    <option value="{{$structure->id}}" @selected($structure->id == $service->structure_id ? true : false)>{{$structure->libelle}}
                                                    @endforeach
                                            </select>
                                        </div>
                                        </div>
                                        @error('structure_id')
                                            <div class="d-block text-danger">{{$message}}</div>
                                         @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success m-t-15 waves-effect">Soumettre</button>
                                <button type="reset" class="btn btn-primary m-t-15 waves-effect">Annuler</button>
                            @endif
                            </form>
                        </div>
                    </div>
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