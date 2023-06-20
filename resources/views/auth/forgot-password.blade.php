@extends('templates.login')

@section('content')
    {{-- @if ($errors->any())   
        @foreach ($errors->all() as $erro)
            <div class="text-center w-full bg-red-400 mb-3"> {{$erro}} </div>
        @endforeach
    @endif

    @if (session('message'))
        <div class="text-center w-full bg-green-400 mb-3"> {{session('message')}} </div>
    @endif --}}

    @include('mensagem')

    <form action="{{ route('password.email') }}" method="POST"> 
        @csrf
        <div class="flex justify-center items-center" style="height: 595px !important;">
            <div class="p-6 shadow-lg bg-gray-500 rounded-md" style="width:667px;">
                <h1 class="text-3xl block text-center font-semibold text-yellow-400">Esqueceu sua senha ?</h1>

                <div class="text-center">
                    <span class="text-yellow-400">Não tem problema!<br>Insira abaixo o e-mail cadastrado que enviaremos um link para a criação da nova senha. </span>
                </div>

                <hr class="mt-3 mb-3">

                <label for="email" class="block text-base mb-2 font-semibold">E-mail</label>

                <div class="flex">
                    <input type="email" style="width: 400px !important;" name="email" class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira o e-mail cadastrado"/>
                    <button type="submit" style="width: 205px !important;" class="ml-3 border-2 border-yellow-400 bg-yellow-400 text-white py-1 rounded-md hover:bg-transparent hover:text-yellow-400 font-semibold"><i class="fas fa-envelope-open-text"></i> Enviar e-mail</button>
                </div>
            </div>
        </div>
    </form> 
@endsection