<x-mail::message>
# Demande rejetée

<b>Remarque :</b> {{ $remarque }}  <br>

<x-mail::button :url="$url">
    Accéder
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>