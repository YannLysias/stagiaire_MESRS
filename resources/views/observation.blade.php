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
                <h2>OBSERVATIONS</h2>
            </div>
        </div>

            <!-- Multiple Items To Be Open -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Mes observations de fin de stage
                            </h2>
                        
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                    <div class="panel-group full-body" id="accordion_19" role="tablist" aria-multiselectable="true">
                                        @foreach ($observations as $index => $observation)
                                        <div class="panel panel-col-green">
                                            <div class="panel-heading" role="tab" id="heading_{{ $observation->id }}">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" href="#collapse_{{ $observation->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse_{{ $observation->id }}">
                                                        {{-- <i>{{ $ob->type }}</i> <span style="margin-left: 420px">Date du depot : {{ $document->created_at }}</span> --}}
                                                        {{ $index + 1 }}
                                                        @if(Auth::user()->role === 'ChefService')
                                                            @if($observation->stage && $observation->stage->stagiaires)
                                                                @foreach($observation->stage->stagiaires as $stagiaire)
                                                                    {{ $stagiaire->user->nom }}  {{ $stagiaire->user->prenom }}
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_{{ $observation->id }}" class="panel-collapse collapse {{ $index === 0 ? 'in' : '' }}" role="tabpanel" aria-labelledby="heading_{{ $observation->id }}">
                                                <div class="panel-body">
                                                    <div class="row clearfix">
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Description</span>
                                                                <div class="form-line">
                                                                    {{$observation->description}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                    
                                                    <div class="row">
                                                        <div class="col-md-12 text-center"> <!-- Centrer le bouton -->
                                                            <a href="/observation/{{$observation->id}}/edit" class="btn btn-info m-t-15 waves-effect">Modifier</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <!-- #END# Multiple Items To Be Open -->
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

    <!-- Bootstrap Notify Plugin Js -->
    <script src="../../Dashboard1/plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../Dashboard1/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../../Dashboard1/js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../../Dashboard1/js/demo.js"></script>
</body>

</html>