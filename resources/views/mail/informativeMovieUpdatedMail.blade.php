@component('mail::message')

<h1>Olá, {{$user->name}}!</h1>

<p>Informamos que você acabou de fazer uma alteração nos seus filmes</p>

<img src="{{$data_personal_list->img_src}}">
<p><b>Filme: </b>{{$data_personal_list->name}}</p>
<p><b>Nota: </b>{{$data_personal_list->note}}</p>
<p><b>Assitido em: </b>{{date("d/m/Y", strtotime($data_personal_list->assisted_in))}}</p>
<p><b>Suas Observações</b><br>
    {{$data_personal_list->observation}}
</p>

<p>Saudações,<br>
Portifólio Filipe Pires
</p>
@endcomponent