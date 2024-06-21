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

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

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


    <section class="FORM-CONTAINER d-flex justify-content-center">
        <div class="container">
            <div class="block-header">
                <h1 style="text-align: center;">Ajout des pièces</h1>
            </div>
        
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="color: red;">* Indique une question obligatoire</h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('stage.submitReclamation', $stage->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nom">Nom *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nom" id="nom" class="form-control" placeholder="Saississez votre nom" value="{{ old('nom', $user->nom) }}" required>
                                                @error('nom')
                                                    <div class="d-block text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="prenom">Prénom *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Saississez votre prénom" value="{{ old('prenom', $user->prenom) }}" required>
                                                @error('prenom')
                                                    <div class="d-block text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="telephone">Téléphone *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="telephone" id="telephone" class="form-control" placeholder="Saississez le numéro de téléphone" value="{{ old('telephone', $user->telephone) }}" required>
                                                @error('telephone')
                                                    <div class="d-block text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">Email *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Saississez l'adresse email" value="{{ old('email', $user->email) }}" required>
                                                @error('email')
                                                    <div class="d-block text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="cv">Curriculum vitae (CV) *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="cv" id="cv" class="form-control" value="{{ old('cv') }}" >
                                            </div>
                                            @error('cv')
                                                <div class="d-block text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="recommandation">Recommandation de stage ou votre dernier diplôme *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="recommandation" id="recommandation" class="form-control" value="{{ old('recommandation') }}" >
                                                @error('recommandation')
                                                    <div class="d-block text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <label for="email_address">Demande manuscrite (DPAF) *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="lettre" id="email_address" class="form-control" value="{{ old('lettre') }}">
                                                @error('lettre')
                                                    <div class="d-block text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success m-t-15 waves-effect">Soumettre</button>
                                <button type="reset" class="btn btn-primary m-t-15 waves-effect">Annuler</button>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
                var binome_oui = document.getElementById('binome_oui');
                var binome_non = document.getElementById('binome_non');
                var code_binome = document.getElementById('code_binome');
                var champ_code_binome = document.getElementById('champ_code_binome');

                binome_oui.addEventListener('change', function() {
                    if (binome_oui.checked) {
                        code_binome.style.display = 'block';
                    } else {
                        code_binome.style.display = 'none';
                        champ_code_binome.style.display = 'none';
                    }
                });

                binome_non.addEventListener('change', function() {
                    if (binome_non.checked) {
                        code_binome.style.display = 'none';
                        champ_code_binome.style.display = 'none';
                    } else {
                        code_binome.style.display = 'block';
                    }
                });

                var code_binome_oui = document.getElementById('code_binome_oui');
                var code_binome_non = document.getElementById('code_binome_non');

                code_binome_oui.addEventListener('change', function() {
                    if (code_binome_oui.checked) {
                        champ_code_binome.style.display = 'block';
                    } else {
                        champ_code_binome.style.display = 'none';
                    }
                });

                code_binome_non.addEventListener('change', function() {
                    if (code_binome_non.checked) {
                        champ_code_binome.style.display = 'none';
                    } else {
                        champ_code_binome.style.display = 'block';
                    }
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