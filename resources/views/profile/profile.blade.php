@extends('templates.padrao')

@section('content')

    @include('mensagem')

    <div class="container mx-auto p-2 bg-gray-700 rounded-lg mt-3" style="width:323px;">
        <div class="text-center w-full">
            <span class="font-semibold text-yellow-500 text-xl">Configurações do Usuário</span>
        </div>
        
        <hr style="margin-block: 5px;">
        
        <form action="{{route("profile.update", ['user' => auth()->user()->id])}}" method="post">
            @csrf
            <div class="flex w-full ml-2">
                <div class="block" style="width:400px;">
                    <input type="hidden" name="id" value="{{$user->id}}">

                    <label for="name" class="block font-semibold text-yellow-500">Nome</label>
                    <input class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6 w-72" type="text" name="name" id="name" value="{{$user->name}}" placeholder="Digite seu nome">
                    
                    <label for="last_name" class="block font-semibold text-yellow-500">Sobrenome</label>
                    <input class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6 w-72" type="text" name="last_name" id="last-name" value="{{$user->last_name}}" placeholder="Digite seu sobrenome">
                    
                    <label for="email" class="block font-semibold text-yellow-500">E-mail</label>
                    <input class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6 w-72" type="text" name="last-name" id="last-name" value="{{$user->email}}" disabled>
                
                    <label for="recive_email" class="block font-semibold text-yellow-500">Deseja receber emails de atualização ?</label>
                    <select name="recive_email" id="recive_email" class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6 w-72">
                        <option value="t" <?=($user->recive_email == 't') ? 'selected' : ''?>>Sim</option>
                        <option value="f" <?=($user->recive_email == 'f') ? 'selected' : ''?>>Não</option>
                    </select>    
                </div>
            </div>
            
            <hr style="margin-block: 5px;">
    
            <div class="text-center w-full">
                <button class="bg-green-500 hover:bg-green-400 rounded-lg py-1 px-1 w-full" type="submit"><i class="fas fa-save"></i> Salvar</button>
                <a href="{{route('verification.send')}}">
                    <button class="bg-yellow-500 hover:bg-yellow-400 rounded-lg py-1 px-1 my-1 w-full" type="button"><i class="far fa-envelope"></i> Verificar email</button>
                </a>
            </div>
        </form>

    </div>
@endsection