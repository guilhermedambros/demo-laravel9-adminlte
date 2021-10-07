@component('mail::message')

Você está recebendo esse e-mail pois solicitou uma troca de senha, clique no botão para gerar uma nova senha.

@component('mail::button', ['url' => $url])
Gerar nova senha
@endcomponent

Esse link vai expirar em {{config('auth.passwords.'.config('auth.defaults.passwords').'.expire')}} minutos.
Se você não solicitou a troca de senha, não há necessidade de nenhuma ação.
<br>
Atenciosamente,
<br>
{{ config('app.name') }}

@endcomponent