@component('mail::message')

Clique no botão abaixo para verificar o seu endereço de e-mail.

@component('mail::button', ['url' => $url])
Verifique seu endereço de e-mail
@endcomponent


Atenciosamente,<br>
{{ config('app.name') }}

<hr>
Caso não esteja conseguindo acessar através do botão acima, tente copiar e colar no seu navegador a url a abaixo: <br> {{$url}}
@endcomponent