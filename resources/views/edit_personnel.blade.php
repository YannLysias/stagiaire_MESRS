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
                <h2>PERSONNELS</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Modifier le personnel
                            </h2>
                        </div>
                        <div class="body">
                            <form class="" action="{{ route('personnels.update', $user->id)}}" method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                @if ($user)
                                @method('PUT')
                                <label for="email_address">Nom</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="{{$user->nom}}" name="nom" id="email_address" class="form-control" placeholder="Entrer le nom de la structure">
                                    </div>
                                    @error('nom')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <label for="prenom">Prénom</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="{{$user->prenom}}" name="prenom" id="password" class="form-control" placeholder="Entrer le code de la structure">
                                    </div>
                                    @error('prenom')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <label for="email_address">Sexe</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" value="{{$user->sexe}}" name="sexe">
                                            <option value="" selected>-- Choisir sexe --</option>
                                            <option value="Masculin" @selected($user->sexe == 'Masculin' ? true : false)>Masculin</option>
                                            <option value="Feminin" @selected($user->sexe == 'Feminin' ? true : false)>Masculin</option>
                                        </select>
                                    </div>
                                    @error('role')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror

                                </div>
                                <label for="email_address">Téléphone</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="{{$user->telephone}}" name="telephone" id="email_address" class="form-control">
                                    </div>
                                    @error('telephone')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <label for="email_address">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" value="{{$user->email}}" name="email" id="email_address" class="form-control">
                                    </div>
                                    @error('email')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <label for="email_address">ROLE</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" value="{{$user->role}}" name="role">
                                            <option value="" selected>-- Choisir le role --</option>
                                            <option value="Directeur" @selected($user->role == 'Directeur' ? true : false) >Directeur</option>
                                            <option value="Secretaire" @selected($user->role == 'Secretaire' ? true : false)>Secretaire</option>
                                            <option value="ChefService" @selected($user->role == 'ChefService' ? true : false)>Chef Service</option>
                                        </select>
                                    </div>
                                    @error('role')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="body">
                                    <div class="row clearfix ">
                                            <label for="structure">Associer à une structure</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                            <select id="structure_id" class="form-control show-tick" value="{{$user->structure_id}}" name="structure_id">
                                                <option value="" disabled selected>-- Choisir un structure --</option>
                                                    @foreach ($structures as $structure)
                                                    <option value="{{$structure->id}}" @selected($structure->id == $user->structure_id ? true : false)>{{$structure->libelle}}
                                                    @endforeach
                                            </select>
                                        </div>
                                        </div>
                                        @error('structure_id')
                                            <div class="d-block text-danger">{{$message}}</div>
                                         @enderror
                                    </div>
                                </div>
                                <div class="body">
                                    <div class="row clearfix ">
                                            <label for="service">Associer à un service</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                            <select id="service_id" value="{{$user->service_id}}" class="form-control show-tick" name="service_id">
                                                <option value="" disabled selected>-- Choisir un structure --</option>
                                                    @foreach ($services as $service)
                                                    <option value="{{$service->id}}" @selected($service->id == $user->service_id ? true : false)>{{$service->libelle}}
                                                    @endforeach
                                            </select>
                                        </div>
                                        </div>
                                        @error('service_id')
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var structureSelect = document.querySelector('select[name="structure_id"]');
            var serviceSelect = document.querySelector('select[name="service_id"]');
            var serviceOptions = serviceSelect.innerHTML;
    
            structureSelect.addEventListener("change", function() {
                var selectedStructureId = this.value;
    
                if (selectedStructureId === '') {
                    // Si aucune structure n'est sélectionnée, videz la liste des services
                    serviceSelect.innerHTML = '<option value="" selected>-- Choisir service --</option>';
                    return;
                }
    
                // Réinitialiser les options des services
                serviceSelect.innerHTML = serviceOptions;
    
                // Afficher seulement les services associés à la structure sélectionnée
                Array.from(serviceSelect.options).forEach(function(option) {
                    var associatedStructureId = option.getAttribute('data-structure-id');
                    if (associatedStructureId !== selectedStructureId && option.value !== '') {
                        option.style.display = 'none';
                    } else {
                        option.style.display = 'block';
                    }
                });           
            });
        });
    </script>

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