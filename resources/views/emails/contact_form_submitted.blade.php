@component('mail::message')
# Nouveau message de contact

**Nom** : {{ $contact->name }}

**Email** : {{ $contact->email }}

**Téléphone** : {{ $contact->phone }}

**Sujet** : {{ $contact->subject }}

**Message** :

{{ $contact->message }}

@endcomponent
