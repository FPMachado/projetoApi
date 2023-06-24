@extends('templates.padrao')

@section('content')

    @include('mensagem')

    <form action="" method="post">
        @csrf
        <div class="flex container mx-auto p-2 bg-gray-700 rounded-lg mt-3" style="width:335px;">
            <div class="grid justify-items-start px-3 py-3">
                <label for="name" class="block font-semibold text-yellow-500">Nome</label>
                <input class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6 w-72" type="text" name="name" id="name" value="{{$user->name}}" placeholder="Digite seu nome">
                
                <label for="last-name" class="block font-semibold text-yellow-500">Sobrenome</label>
                <input class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6 w-72" type="text" name="last-name" id="last-name" value="{{$user->last_name}}" placeholder="Digite seu sobrenome">

                <label for="email" class="block font-semibold text-yellow-500">E-mail</label>
                <input class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6 w-72" type="text" name="last-name" id="last-name" value="{{$user->email}}" disabled>
                            
                <label for="recive_email" class="block font-semibold text-yellow-500">Deseja receber emails de atualização ?</label>
                <select name="recive_email" id="recive_email" class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6 w-72">
                    <option value="t" <?=($user->recive_email == 't') ? 'selected' : ''?>>Sim</option>
                    <option value="f" <?=($user->recive_email == 'f') ? 'selected' : ''?>>Não</option>
                </select>               
            </div>
        </div>

    </form>
@endsection