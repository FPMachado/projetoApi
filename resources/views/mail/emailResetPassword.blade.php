@component('mail::message')
    
<h1>Olá {{$user->name}}!</h1>
<p>Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.</p>

@component('mail::button', ['url' => route('password.reset', ['token' => $token, 'email' => $user->email])])
    Modificar Senha
@endcomponent

<p>Este link de redefinição de senha expirará em 60 minutos.</p>
<p>Se você não solicitou a redefinição de senha, nenhuma ação adicional será necessária.</p>
<p>Saudações,</p>
<p>Portifólio Filipe Pires</p>
<hr>
<p>Caso tenha problemas para clicar no botão, insira o link a seguir no seu navegador</p>
<a href="{{route('password.reset', ['token' => $token, 'email' => $user->email])}}">http://localhost:8000/reset-password/{{$token}}?email={{$user->email}}</a>
@endcomponent

