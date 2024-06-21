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
                <h2>Gestionnaire des stagiaires</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <h3 class="">Profil Stagaire</h3>
                            
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i >Nom</i>
                                        </span>
                                        <div class="form-line">
                                            @if (count($stage->stagiaires) > 1)
                                                <div>{{ $stage->stagiaires[0]->user['nom'] }}</div>
                                                <div>{{ $stage->stagiaires[1]->user['nom'] }}</div>
                                            @else
                                                <div>{{ $stage->stagiaires[0]->user['nom'] }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i >Prenom</i>
                                        </span>
                                        <div class="form-line">
                                            @if (count($stage->stagiaires) > 1)
                                                <div>{{ $stage->stagiaires[0]->user['prenom'] }}</div>
                                                <div>{{ $stage->stagiaires[1]->user['prenom'] }}</div>
                                            @else
                                                <div>{{ $stage->stagiaires[0]->user['prenom'] }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i >Sexe</i>
                                        </span>
                                        <div class="form-line">
                                            @if (count($stage->stagiaires) > 1)
                                                <div>{{ $stage->stagiaires[0]->user['sexe'] }}</div>
                                                <div>{{ $stage->stagiaires[1]->user['sexe'] }}</div>
                                            @else
                                                <div>{{ $stage->stagiaires[0]->user['sexe'] }}</div>
                                            @endif
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i>Ecole</i>
                                    </span>
                                    <div class="form-line">                                        
                                        <div>{{ $stage->stagiaires[0]->ecole }}</div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i>Niveau</i>
                                </span>
                                <div class="form-line">
                                    <div>{{ $stage->stagiaires[0]->niveau }}</div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i >Filière</i>
                            </span>
                            <div class="form-line">
                                    <div>{{ $stage->stagiaires[0]->filiere }}</div>
                            </div>
                            </div>
                    </div>
                </div>
                            <h3 class="">Par rapport au stage</h3>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Mois</span>
                                        <div class="form-line">
                                            {{$stage->mois }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Type </span>
                                        <div class="form-line">
                                            {{ $stage->type }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Etat</span>
                                        <div class="form-line">
                                            {{ $stage->etat }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <p>
                                        <b>Recommandation de l'école</b>
                                    </p>
                                    <div class="input-group input-group-lg">
                                        <div class="form-line">
                                            <a href="{{ asset('storage/recommandations/' . $stage->recommandation) }}" target="_blank">Voir la recommandation</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <p>
                                        <b>Curriculum Vitae</b>
                                    </p>
                                    <div class="input-group input-group-lg">
                                        <div class="form-line">
                                            @if (count($stage->dossiers) > 1)
                                            <div><a href="{{ asset('storage/cvs/'.$stage->dossiers[0]->cv) }}" target="_blank">Voir le Curriculum Vitae</a>&nbsp;&&nbsp;</div>
                                            <div><a href="{{ asset('storage/cvs/'.$stage->dossiers[1]->cv) }}" target="_blank">Voir le Curriculum Vitae</a></div>
                                            @else
                                            <a href="{{ asset('storage/cvs/'.$stage->dossiers[0]->cv) }}" target="_blank">Voir le Curriculum Vitae</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        <b>Demande manuscrite</b>
                                    </p>
                                    <div class="input-group input-group-lg">
                                        <div class="form-line">
                                            @if (count($stage->dossiers) > 1)
                                                <div><a href="{{ asset('storage/lettres/'.$stage->dossiers[0]->lettre) }}" target="_blank">Voir la demande maniscrite</a>&nbsp;&&nbsp;</div>
                                                <div><a href="{{ asset('storage/lettres/'.$stage->dossiers[1]->lettre) }}" target="_blank">Voir la demande maniscrite</a></div>
                                            @else
                                                <a href="{{ asset('storage/lettres/'.$stage->dossiers[0]->lettre) }}" target="_blank">Voir la demande maniscrite</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        <b>Date de la demande</b>
                                    </p>
                                    <div class="input-group input-group-lg">
                                        <div class="form-line">
                                            {{ $stage->created_at }}
                                        </div>
                                    </div>
                                </div>
                                @if ($stage->etat === 'Rejeté')
                                    <div class="col-md-4">
                                        <p>
                                            <b>Remarque de la demande rejetée</b>
                                        </p>
                                        <div class="input-group input-group-lg">
                                            <div class="form-line">
                                                {{ $stage->remarque }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            <div style="margin-left: 100px; margin-right: 80px;">
                                <button type="button" class="btn btn-success m-t-15 waves-effect" data-toggle="modal" data-target="#modalValidation">Valider</button>
                                <button type="button" class="btn btn-danger m-t-15 waves-effect" data-toggle="modal" data-target="#myModal">Rejetter</button>
                                <button type="button" class="btn btn-info m-t-15 waves-effect" data-toggle="modal" data-target="#traiterModal">traiter</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input Group -->
            <div class="row clearfix">
        </div>
        
        <!-- Modal de rejet -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="rejectionForm" action="{{ route('stage.reject', ['id' => $stage->id]) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Motif du rejet</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <!-- Champs du formulaire pour le motif de rejet -->
                            <div class="form-group">
                                <label for="remarque">Remarque :</label>
                                <textarea class="form-control" id="remarque" name="remarque" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-danger">Rejeter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal de traitement -->
        <div class="modal fade" id="traiterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="traiterDemandeForm" action="{{ route('stage.traite', ['id' => $stage->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" id="stageId" name="id" value="{{ $stage->id }}">
                        <!-- Champ caché pour stocker l'ID du stage -->
        
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Traiter la demande</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Une fois que la demande est bien traitée, le Directeur va valider la demande et affecté le stagaiaire dans une structure. 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-info">Traiter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Votre modal de validation -->
    <div class="modal fade" id="modalValidation" tabindex="-1" role="dialog" aria-labelledby="modalValidationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalValidationLabel">Validation de la demande de stage</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="validationForm" action="{{ route('stage.validate', ['id' => $stage->id]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="dateDebut">Date de début de stage :</label>
                            <input type="date" class="form-control" id="dateDebut" name="date_debut" required>
                            @error('date_debut')
                                <div class="d-block text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="structure">Structure affectée :</label>
                            <select id="structure_id" class="form-control show-tick" name="structure_id" required>
                                <option value="" disabled selected>-- Choisir structure --</option>
                                @foreach ($structures as $structure)
                                    <option value="{{ $structure->id }}" {{ old('structure_id') == $structure->id ? 'selected' : '' }}>
                                        {{ $structure->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service">Service Affecté:</label>
                            <select id="service_id" class="form-control show-tick" name="service_id" required>
                                <option value="" disabled selected>-- Choisir service --</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" data-structure-id="{{ $service->structure_id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                        {{ $service->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <input type="hidden" name="controller_url" value="{{ action('App\Http\Controllers\StageController@validate') }}"> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-success">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Succès</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        @if(session('success'))
            $(document).ready(function() {
                $('#successModal').modal('show');
            });
        @endif
    </script>

    <script>
    $(document).ready(function () {
    $('#validationForm').submit(function (event) {
        event.preventDefault();

        // Récupérer l'ID de l'utilisateur depuis le bouton "Valider"
        var userId = $('#modalValidation').data('id');
        console.log("ID de l'utilisateur:", userId);

        // Ajouter l'ID de l'utilisateur au champ caché dans le formulaire
        $(this).append('<input type="hidden" name="id" value="' + userId + '">');

        var formData = $(this).serialize();
        console.log("Données du formulaire:", formData);
        
        // Récupérer l'URL du contrôleur depuis le champ caché
        var controllerUrl = $(this).find('input[name="controller_url"]').val();
        console.log("URL du contrôleur:", controllerUrl);

        $.ajax({
            type: 'POST',
            url: controllerUrl,
            data: formData,
            success: function (response) {
                // Gérer la réponse du serveur si nécessaire
                console.log("Réponse du serveur:", response);
                // Fermer le formulaire modal
                $('#modalValidation').modal('hide');
            },
            error: function (xhr, status, error) {
                // Gérer les erreurs si nécessaire
                console.error("Erreur:", error);
                }
            });
        });
    });
    </script>
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
        $(document).ready(function() {
            $('#rejectionForm').submit(function(event) {
                event.preventDefault();
    
                var remarque = $('#remarque').val();
                var stageId = $('#stageId').val();
    
                // Envoyer les données du formulaire via AJAX
                $.ajax({
                    url: '/stage/reject/' + stageId,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        remarque: remarque
                    },
                    success: function(response) {
                        // Si la soumission est réussie, vous pouvez afficher un message ou effectuer d'autres actions nécessaires
                        console.log(response);

                        // Fermer le modal après le rejet
                        $('#myModal').modal('hide');

                        // Afficher une alerte de succès
                        $('#successAlert').fadeIn().delay(3000).fadeOut(); // Affiche l'alerte pendant 3 secondes
                    },
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#traiterDemandeForm').submit(function(event) {
                event.preventDefault(); // Empêcher le formulaire de se soumettre normalement
                
                // Récupérer les données du formulaire
                var formData = $(this).serialize();
                
                // Envoyer les données du formulaire via AJAX
                $.ajax({
                    url: $(this).attr('action'), // Récupérer l'URL d'action du formulaire
                    method: $(this).attr('method'), // Récupérer la méthode d'envoi du formulaire
                    data: formData, // Utiliser les données du formulaire sérialisées
                    success: function(response) {
                        // Gérer la réponse du serveur si nécessaire
                        console.log(response);
                        // Fermer le modal après le traitement
                        $('#traiterModal').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        // Gérer les erreurs de soumission du formulaire
                        console.error(xhr.responseText);
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