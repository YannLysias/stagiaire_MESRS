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
        <!-- layouts.sidebar -->
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
                                Ajouter un personnel
                            </h2>
                        </div>
                        <div class="body">
                            <form class="" action="{{ route('stage.update', $stage->id)}}" method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                @if ($stage)
                                @method('PUT')
                                <label for="email_address">Nom</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="nom" value="{{$user->nom}}" id="email_address" class="form-control" placeholder="Entrer le nom de la structure">
                                    </div>
                                    @error('nom')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <label for="prenom">Prénom</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text"  name="prenom" value="{{$user->prenom}}" id="password" class="form-control" placeholder="Entrer le code de la structure">
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
                                            <option value="Masculin">Masculin</option>
                                            <option value="Feminin">Feminin</option>
                                        </select>
                                    </div>
                                    @error('role')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror

                                </div>
                                <label for="email_address">Téléphone</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="{{$user->telephone}}"  name="telephone" id="email_address" class="form-control" placeholder="Entrer le nom de la structure">
                                    </div>
                                    @error('telephone')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <label for="email_address">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" value="{{$user->email}}"  name="email" id="email_address" class="form-control" placeholder="Entrer le nom de la structure">
                                    </div>
                                    @error('email')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <label for="email_address">ROLE</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="role" value="{{$user->role}}">
                                            <option value="" selected>-- Choisir le role --</option>
                                            <option value="Directeur">Directeur</option>
                                            <option value="Secretaire">Secretaire</option>
                                            <option value="ChefService">Chef service</option>
                                        </select>
                                    </div>
                                    @error('role')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div>
                                        <label for="password">Type de Stage*</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                        <select class="form-control show-tick" value="{{$stage->type}}" name="type" required>
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
                                <div class="form-group">
                                    <div>
                                        <label for="password">Niveau d'étude*</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                        <select class="form-control show-tick" value="{{$stagiaire->niveau}}" name="niveau" required>
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
                                <div class="form-group">
                                    <label for="email">Filière *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="{{$stagiaire->filiere}}" name="filiere" id="email" class="form-control" placeholder="Saississez votre filière" required>
                                                @error('filiere')
                                                <div class="d-block text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="telephone">Ecole *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="{{$stagiaire->ecole}}" name="ecole" id="telephone" class="form-control" placeholder="Saississez le nom de votre ecole" required>
                                                @error('ecole')
                                                <div class="d-block text-danger">{{$message}}</div>
                                                @enderror
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="prenom">Mois *</label>
                                    <select class="form-control show-tick" value="{{$stage->mois}}" name="mois" required>
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
                                <div class="form-group">
                                    <label for="cv">Curriculum vitae (CV) *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" value="{{$dossier->cv}}" name="cv" id="cv" class="form-control" placeholder="Saississez le nom de la structure" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Recommandation de stage</label>
                                    <div class="form-line">
                                        <input type="file" value="{{$stage->recommandation}}" name="recommandation" id="recommandation" class="form-control" placeholder="Saississez le nom de la structure" required>
                                        @error('recommandation')
                                        <div class="d-block text-danger">{{$message}}</div>
                                         @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Demande maniscrite</label>
                                    <div class="form-line">
                                        <input type="file" value="{{$dossier->lettre}}" name="lettre" id="email_address" class="form-control" placeholder="Saississez le nom de la structure" required>
                                        @error('lettre')
                                        <div class="d-block text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Adresse</label>
                                    <div class="form-line">
                                        <input type="text" value="{{$stagiaire->adresse}}" name="adresse" id="adresse" class="form-control" placeholder="Saississez Adresse email" required>
                                        @error('adresse')
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