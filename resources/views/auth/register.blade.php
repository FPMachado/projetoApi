@extends("templates.login")

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="w-96 p-6 shadow-lg bg-gray-500 rounded-md">
            <h1 class="text-3xl block text-center font-semibold text-yellow-400"><i class="far fa-id-card"></i></i> Criar Conta</h1>
            <hr class="mt-3">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mt-3">
                    <label for="nome" class="block text-base mb-2 font-semibold">Nome</label>
                    <input type="text" name="nome" class="border w-full text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira seu nome"/>
                </div>

                <div class="mt-3">
                    <label for="email" class="block text-base mb-2 font-semibold">E-mail</label>
                    <input type="email" name="email" class="border w-full text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira seu e-mail"/>
                </div>

                <div class="mt-3">
                    <label for="password" class="block text-base mb-2 font-semibold">Senha</label>
                    <input type="password" name="password" class="border w-full text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira sua senha"/>
                </div>

                <div class="mt-3">
                    <label for="password_confirmation" class="block text-base mb-2 font-semibold">Confirmar Senha</label>
                    <input type="password" name="password_confirmation" class="border w-full text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira novamente sua senha"/>
                </div>

                <div class="mt-5">
                    <button type="submit" class="border-2 border-yellow-400 bg-yellow-400 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-yellow-400 font-semibold">Criar Conta</button>
                </div>

            </form>
        </div>
    </div>
@endsection