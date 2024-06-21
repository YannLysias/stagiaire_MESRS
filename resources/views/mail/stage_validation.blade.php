<x-mail::message>
# Demande validée

<p>Votre demande de stage auprès du MESRS a été validée avec succès et vous avez été affecté.</p>

<p>Structure : <b>{{ $structure->libelle }}</b></p>
<p>Dans le service : <b>{{ $service->libelle }}</b></p>

<p>La date de votre début de stage est prévue pour le</p>
<p>Date début stage : <b>{{ $stage->date_debut }}</b></p>

<p>Un compte vous a été créé par défaut</p>
<p>Email : <b>{{ $user->email }}</b></p>
<p>Mot de passe : <b>{{ $generated_password }}</b></p>


Cliquez ici pour accéder à notre plateforme : 
<x-mail::button :url="$url">
    Accéder
</x-mail::button>

Cordialement,<br>
{{ config('app.name') }}
</x-mail::message>
