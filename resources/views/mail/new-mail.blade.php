{{-- <x-mail::message> --}}
<p style="text-align:center">
    <br>
    <br>
    <img title="a title" alt="BoolBnb S.R.L." src="{{ url('/img/BoolBnb.png') }}" style="height: 75px;">
    <br>
    <br>
    &#10024; &#x2728;&#10024; &#x2728;&#10024; &#x2728; <br>
    <br>
    
        You have received a new message, here are the details:<br>
    <br>
    <strong>
        Suite:
    </strong>
    {{ $message->suite->title }}<br>
    <br>
    <strong>
        Name:
    </strong>
    {{ $message->name }}<br>
    <br>
    <strong>
        Email:
    </strong>
    {{ $message->email }}<br>
    <br>
    <strong>Message:</strong><br>
    {{ $message->text }}<br>
    <br>
    Date: {{ $message->date }}<br>

    <br>
    Thanks, &#x1F680 <br>

    BoolBnb ,TEAM 7 &#128640
    {{-- {{ config('app.name') }} --}}
</p>
{{-- </x-mail::message> --}}
