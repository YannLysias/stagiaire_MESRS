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
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SERVICES</h2>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LISTE DES SERVICES DU MESRS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <a href="/service/create" class="ml-auto">
                                    <button type="button" class="btn btn-primary">Ajouter</button>
                                </a>
                            </ul>
                        </div>

                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Code Service</th>
                                        <th>Nom Service</th>
                                        <th>Structure Associée</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $index => $service)
                                    <tr>
                                        <td scope="row">{{ $index + 1 }}</td>
                                        <td>{{$service->code_service}}</td>
                                        <td>{{$service->libelle}}</td>

                                        <td>
                                            @foreach ($service->structures as $structure)
                                                <p>{{ $structure->code_structure }}</p> <!-- Adaptez selon les colonnes de votre table structures -->
                                            @endforeach
                                        </td>
 
                                    <td><a href="/service/{{$service->id}}/edit" class="btn btn-success">Modifier</a></td>
                                        
                                    </tr>    
                                    @endforeach 
                                </tbody>
                            </table>
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