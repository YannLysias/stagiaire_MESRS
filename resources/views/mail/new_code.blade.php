<x-mail::message>
# STAGIAIRE MESRS

Votre enregistrement a été effectué avec succès. Étant donné que vous êtes en binôme, vous devez utiliser ce code pour enregistrer votre binôme.

Code pour notre binôme : <b>{{ $code["code"] }}</b>



Cliquez ici pour accéder a notre plateforme : 
<x-mail::button :url="$url">
    Accéder
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
