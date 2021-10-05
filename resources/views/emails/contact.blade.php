@component('mail::message')
# Visitor Message

Some Visitor Left a message:
<br><br>
Firstname: {{ $firstname }}
<br>
Secondname: {{ $secondname }}
<br>
Email: {{ $email }}
<br>
Subject: {{ $subject }} 
<br>
Message: {{ $message }}

@component('mail::button', ['url' => ''])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
