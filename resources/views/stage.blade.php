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

    <!-- JQuery DataTable Css -->
    <link href="../../Dashboard1/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../../Dashboard1/css/style.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../Dashboard1/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-green">
    <section>

            <!-- layouts.sidebar -->
            @include('layouts.sidebar')
            <!-- layouts.sidebar -->


            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2023 - 2024 <a href="javascript:void(0);">MESRS Bénin</a>.
                </div>
            </div>
            <!-- #Footer -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>

                    Voir les demande
                    
                </h2>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LISTE 
                            </h2>
                            
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Sexe</th>
                                            <th>Téléphone</th>
                                            <th>Type</th>
                                            <th>Etat</th>
                                            <th>Demande</th>
                                            <th>Manupilation</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        @foreach ($stages as $index => $stage)
                                            @foreach ($stage->stagiaires as $stagiaire)
                                                <tr>
                                                    <td scope="row">{{ $index + 1 }}</td>
                                                    <td>{{ $stagiaire->user->nom }}</td>
                                                    <td>{{ $stagiaire->user->prenom }}</td>
                                                    <td>{{ $stagiaire->user->sexe }}</td>
                                                    <td>{{ $stagiaire->user->telephone }}</td>
                                                    <td>{{ $stage->type }}</td>
                                                    <td>{{ $stage->etat }}</td>
                                                    <td>
                                                        <a class="btn btn-info" href="{{ route('stage.show', ['stage' => $stage->id]) }}">
                                                            <i class="fas fa-eye"></i> Voir
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="/stage/{{$stage->id}}/edit" class="btn btn-success">
                                                            <i class="fas fa-edit"></i> Modifier
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../Dashboard1/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../Dashboard1/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../Dashboard1/Dashboard1/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../Dashboard1/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../Dashboard1/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../Dashboard1/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../Dashboard1/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../Dashboard1/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../Dashboard1/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../Dashboard1/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../Dashboard1/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../Dashboard1/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../Dashboard1/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../Dashboard1/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../../Dashboard1/js/admin.js"></script>
    <script src="../../Dashboard1/js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../../Dashboard1/js/demo.js"></script>
</body>

</html>