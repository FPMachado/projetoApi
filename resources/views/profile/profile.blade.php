@extends('templates.padrao')

@section('content')

    @include('mensagem')

    <form action="" method="post">
        @csrf
        <div class="flex container mx-auto p-2 w-full bg-gray-700 rounded-lg mt-3">
            <div class="flex">
                <div class="grid justify-items-center px-3 py-3">
                    <img class="rounded-full shadow-2xl md: w-64" src="{{ url('storage/minha-foto.jpg') }}" alt="">
                </div>

                <div>
                    <label for="name">Nome</label>
                    <input class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6" type="text" name="name" id="name" value="" placeholder="Digite seu nome">
                    
                    <label for="last-name">Sobrenome</label>
                    <input class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6" type="text" name="last-name" id="last-name" value="" placeholder="Digite seu sobrenome">
                
                    <label for="email">E-mail</label>
                    <input class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6" type="text" name="last-name" id="last-name" value="filipepmachado@gmail.com" disabled>
                
                
                    <label for="recive-email">Deseja receber emails de atualização</label>
                    <input type="checkbox" name="recive-email">
                
                
                </div>
                

            </div>
        </div>

    </form>
@endsection