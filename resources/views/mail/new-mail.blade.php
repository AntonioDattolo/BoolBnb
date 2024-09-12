<x-mail::message>
	Hai ricevuto un nuovo messaggio, ecco qui i dettagli:<br>
	Suite: {{ $message->suite->title }}<br>
	Nome: {{ $message->name }}<br>
	Email: {{ $message->email }}<br>
	Messaggio:
	{{ $message->text }}<br>
	Data: {{ $message->date }}<br>


	Thanks
	{{ config('app.name') }}
</x-mail::message>
