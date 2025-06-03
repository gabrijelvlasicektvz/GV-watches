<x-mail::message>
@component('mail::message')
# Nova poruka s kontakt forme

**Ime:** {{ $contact->name }}  
**Email:** {{ $contact->email }}  
**Telefon:** {{ $contact->telephone }}  
**Predmet:** {{ $contact->subject }}

**Poruka:**  
{{ $contact->message }}

@endcomponent

</x-mail::message>
