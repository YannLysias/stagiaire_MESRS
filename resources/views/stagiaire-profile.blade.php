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

    <!-- Colorpicker Css -->
    <link href="../../Dashboard1/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="../../Dashboard1/plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="../../Dashboard1/plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="../../plugins/Dashboard1/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="../../plugins/Dashboard1/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="../../plugins/Dashboard1/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="../../Dashboard1/plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../Dashboard1/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../Dashboard1/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-green">

    <section>
        <!-- layouts.sidebar -->
        @include('layouts.sidebar')
        <!-- layouts.sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Profil des Personnels</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <h3 class="">Profil details</h3>
                            
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>Nom</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $stagiaire->user->nom }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>Prénom</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $stagiaire->user->prenom }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>Sexe</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $stagiaire->user->sexe }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>Email</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="email" class="form-control" value="{{ $stagiaire->user->email }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>Téléphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $stagiaire->user->telephone }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>Catégorie</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $stagiaire->user->role }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>Etablissement</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $stagiaire->ecole }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>Niveau</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $stagiaire->niveau }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>Option</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $stagiaire->filiere }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>Mois de stage</i>
                                        </span>
                                        <div class="form-line">
                                            @if($stagiaire->stages->isNotEmpty())
                                                <input type="text" class="form-control" value="{{ $stagiaire->stages->first()->mois }}" disabled>
                                            @else
                                                <input type="text" class="form-control" value="N/A" disabled>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>Type de stage</i>
                                        </span>
                                        <div class="form-line">
                                            @if($stagiaire->stages->isNotEmpty())
                                                <input type="text" class="form-control" value="{{ $stagiaire->stages->first()->type }}" disabled>
                                            @else
                                                <input type="text" class="form-control" value="N/A" disabled>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>Stage</i>
                                        </span>
                                        <div class="form-line">
                                            @if($stagiaire->stages->isEmpty())
                                            <input type="text" class="form-control" value="En attente" disabled>
                                                @else
                                                    @php
                                                        $stage = $stagiaire->stages->first();
                                                    @endphp
                                                    @if($stage->date_debut == null && $stage->date_fin == null)
                                                    <input type="text" class="form-control" value="En attente" disabled>
                                                    @elseif(\Carbon\Carbon::now()->between($stage->date_debut, $stage->date_fin))
                                                    <input type="text" class="form-control" value="En cours" disabled>
                                                    @else
                                                    <input type="text" class="form-control" value="Terminé" disabled>
                                                    @endif
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <p>
                                        <b>Structure et service</b>
                                    </p>
                                    <div class="input-group input-group-lg">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $stagiaire->user->structure->code_structure }} / {{ $stagiaire->user->service->code_service }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <p>
                                        <b>Date_debut et Date_fin de stage</b>
                                    </p>
                                    <div class="input-group input-group-lg">
                                        <div class="form-line">
                                            @if($stagiaire->stages->isNotEmpty())
                                            <input type="text" class="form-control" value="Du {{ $stagiaire->stages->first()->date_debut }} au {{ $stagiaire->stages->first()->date_debut }}" disabled>
                                        @else
                                            <input type="text" class="form-control" value="N/A" disabled>
                                        @endif  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input Group -->
            <div class="row clearfix">
        </div>

    <!-- Jquery Core Js -->
    <script src="../../Dashboard1/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../Dashboard1/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../Dashboard1/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../Dashboard1/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="../../Dashboard1/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="../../Dashboard1/plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="../../Dashboard1/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="../../Dashboard1/plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="../../Dashboard1/plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="../../Dashboard1/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="../../Dashboard1/plugins/nouislider/nouislider.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../Dashboard1/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../../Dashboard1/js/admin.js"></script>
    <script src="../../Dashboard1/js/pages/forms/advanced-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="../../Dashboard1/js/demo.js"></script>
</body>

</html>