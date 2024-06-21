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
                <h1  style="text-align: center;">Demande de Stage</h1>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                                <h2 style="color: red;">* Indique une question obligatoire</h2>
                        </div>
                        <div class="body">
                            <form method="POST" action="/stage"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nom">Nom *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nom" id="nom" class="form-control" placeholder="Saississez votre nom"  value="{{ old('nom') }}" required>
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
                                                <input type="text"  name="prenom" id="prenom" class="form-control" placeholder="Saississez votre prénom"  value="{{ old('prenom') }}" required>
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
                                                <input type="text"  name="telephone" id="telephone" class="form-control" placeholder="Saississez le numéro de téléphone"  value="{{ old('telephone') }}" required>
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
                                                <input type="email"  name="email" id="email" class="form-control" placeholder="Saississez l'adresse email"  value="{{ old('email') }}" required>
                                                @error('email')
                                                <div class="d-block text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="body">
                                            <div class="row clearfix">
                                                
                                                    <label for="password">Sexe *</label>
                                                    <div class="form-group">
                                                    <div class="form-line">
                                                    <select class="form-control show-tick"  value="{{ old('sexe') }}" name="sexe" required>
                                                        <option value="" selected>-- Choisir sexe --</option>
                                                        <option value="Masculin">Masculin</option>
                                                        <option value="Feminin">Feminin</option>
                                                    </select>
                                                </div> 
                                                </div>
                                                </div>
                                                @error('sexe')
                                                <div class="col-sm-12">
                                                    <div class="d-block text-danger">{{$message}}</div>
                                                </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="body">
                                            <div class="row clearfix">  <label for="password">Mois *</label>
                                                    <div class="form-group">
                                                    <div class="form-line">
                                                    <select class="form-control show-tick"  value="{{ old('mois') }}" name="mois" required>
                                                        <option value="" selected>-- Choisir le membre de moi --</option>
                                                        <option value="1">1 Mois</option>
                                                        <option value="2">2 Mois</option>
                                                        <option value="3">3 Mois</option>
                                                        <option value="6">6 Mois</option>
                                                    </select>
                                                </div>
                                                </div>
                                                    @error('mois')
                                                    <div class="d-block text-danger">{{$message}}</div>
                                                @enderror 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="telephone">Ecole *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  value="{{ old('ecole') }}"  name="ecole" id="telephone" class="form-control" placeholder="Saississez le nom de votre ecole" required>
                                                @error('ecole')
                                                <div class="d-block text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">Filière *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  value="{{ old('filiere') }}" name="filiere" id="email" class="form-control" placeholder="Saississez votre filière" required>
                                                @error('filiere')
                                                <div class="d-block text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <label for="password">Niveau d'étude*</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                            <select class="form-control show-tick"  value="{{ old('niveau') }}" name="niveau" required>
                                                <option value="" selected>-- Choississez votre niveau d'etude --</option>
                                                <option value="1ere Année Licence">1ere Année Licence</option>
                                                <option value="2eme Année Licence">2eme Année Licence</option>
                                                <option value="3eme Année Licence">3eme Année Licence</option>
                                                <option value="1ere Année Master">1ere Année Master</option>
                                                <option value="2eme Année Master">2eme Année Master</option>
                                                <option value="Fin de formation">Fin de formation</option>
                                            </select>
                                        </div>
                                        </div>
                                            @error('niveau')
                                            <div class="d-block text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <div>
                                            <label for="password">Type de Stage*</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                            <select class="form-control show-tick"  value="{{ old('type') }}" name="type" required>
                                                <option value="" selected>-- Choisir le type de stage --</option>
                                                <option value="Academique">Académique</option>
                                                <option value="Professionnel">Professionnel</option>
                                            </select>
                                        </div>
                                        </div>
                                            @error('type')
                                            <div class="d-block text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="cv">Curriculum vitae (CV) *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file"  name="cv"  value="{{ old('cv') }}" id="cv" class="form-control" placeholder="Saississez le nom de la structure" required>
                                            </div>
                                            @error('cv')
                                                <div class="d-block text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="recommandation">Recommandation de stage ou votre dernier diplome *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file"  name="recommandation"  value="{{ old('recommandation') }}" id="recommandation" class="form-control" placeholder="Saississez le nom de la structure" required>
                                                @error('recommandation')
                                                <div class="d-block text-danger">{{$message}}</div>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <label for="email_address">Demande maniscrite (DPAF) *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="lettre" id="email_address"  value="{{ old('lettre') }}" class="form-control" placeholder="Saississez le nom de la structure" required>
                                                @error('lettre')
                                                <div class="d-block text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <label for="telephone">Adresse *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="adresse" id="adresse"  value="{{ old('adresse') }}" class="form-control" placeholder="Saississez Adresse email" required>
                                                    @error('adresse')
                                                    <div class="d-block text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                
                                        <div>
                                            <div>
                                                <label>Je suis en binôme* :</label>
                                                <input type="radio" value="oui"  name="code_binome" id="binome_oui" class="with-gap">
                                                <label for="binome_oui" class="m-l-20">Oui</label>
                                        
                                                <input type="radio" value="non" name="code_binome" id="binome_non" class="with-gap">
                                                <label for="binome_non" class="m-l-20">Non</label>
                                                @error('code_binome')
                                                <div class="d-block text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div id="code_binome" style="display: none;">
                                            <div>
                                                <label>Votre binôme est déjà enregistré* :</label>
                                                <input type="radio" value="oui" name="code" id="code_binome_oui" class="with-gap">
                                                <label for="code_binome_oui" class="m-l-20">Oui</label>
                                        
                                                <input type="radio" value="non" name="code" id="code_binome_non" class="with-gap">
                                                <label for="code_binome_non" class="m-l-20">Non</label>
                                                @error('code')
                                                <div class="d-block text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        
                                            <div id="champ_code_binome" style="display: none;">
                                                <label for="code_binome_input">Entrez le code de votre binôme :</label>
                                                <input type="text" name="code_binome_input" id="code_binome_input">
                                            </div>
                                            @error('code_binome_input')
                                                <div class="d-block text-danger">{{$message}}</div>
                                            @enderror
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