@component('mail::message')

<h1>Olá, {{$user->name}}!</h1>

<p>Informamos que você acabou de fazer uma alteração nos seus filmes!</p>

<div style="display: flex; justify-content: center;">
    <img src="{{$movie->img_src}}" style="width: 90px; border-radius: 5px;">
</div>
<p><b>Filme: </b>{{$movie->name}}</p>
<p><b>Nota: </b>{{$data_movies->note}}</p>
<p><b>Assitido em: </b>{{date("d/m/Y", strtotime($data_movies->assisted_in))}}</p>
<p><b>Suas Observações:</b><br>
    {{$data_movies->observation}}
</p>

<p>Saudações,<br>
Portifólio Filipe Pires
</p>
@endcomponent