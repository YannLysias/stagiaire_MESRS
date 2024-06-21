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

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Animation Css -->
    <link href="../../Dashboard1/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../../Dashboard1/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../../Dashboard1/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../Dashboard1/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-green">

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

                    Voir les personnels
                    
                </h2>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LISTE DES PERSONNELS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <a href="/personnels/create" class="ml-auto">
                                    <button type="button" class="btn btn-primary">Ajouter</button>
                                </a>
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
                                            <th>Role</th>
                                            <th>Structure</th>
                                            <th>Manipulation</th>
                                           
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        @foreach ($personnels as $index => $personnel)
                                        <tr>
                                            <td scope="row">{{ $index + 1 }}</td>
                                            <td>{{$personnel->nom}}</td>
                                            <td>{{$personnel->prenom}}</td>
                                            <td>{{$personnel->sexe}}</td>
                                            <td>{{$personnel->telephone}}</td>
                                            <td>{{$personnel->role}}</td>
                                            <td>
                                                @if($personnel->structure)
                                                    {{ $personnel->structure->code_structure }} <!-- Affiche le nom de la structure -->
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm activate-button" data-id="{{$personnel->id}}">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm deactivate-button" data-id="{{$personnel->id}}">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <a href="/personnels/{{$personnel->id}}/edit" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('personnels.show', ['personnel' => $personnel->id]) }}" class="btn btn-info btn-sm info-button">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <!-- Ajoutez d'autres lignes de tableau pour d'autres utilisateurs ici -->
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            document.querySelectorAll('.activate-button').forEach(button => {
                button.addEventListener('click', function () {
                    const personnelId = this.getAttribute('data-id');
                    fetch(`/personnels/${personnelId}/activate`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    }).then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    }).then(data => alert(data.success))
                      .catch(error => console.error('There was a problem with the fetch operation:', error));
                });
            });

            document.querySelectorAll('.deactivate-button').forEach(button => {
                button.addEventListener('click', function () {
                    const personnelId = this.getAttribute('data-id');
                    fetch(`/personnels/${personnelId}/deactivate`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    }).then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    }).then(data => alert(data.success))
                      .catch(error => console.error('There was a problem with the fetch operation:', error));
                });
            });
        });
    </script>

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