@extends("templates.login")

@section('content')

    @include('mensagem')
    
    <div class="flex justify-center items-center h-screen">
        <div class="w-96 p-6 shadow-lg bg-gray-500 rounded-md">
            <h1 class="text-3xl block text-center font-semibold text-yellow-400"><i class="far fa-id-card"></i></i> Criar Conta</h1>
            <div class="text-yellow-400 text-center text-xs">
                <span>Os campos marcados com (*) são obrgatórios! </span>
            </div>
            <hr class="mt-3">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mt-3">
                    <label for="name" class="block text-base mb-2 font-semibold">Nome <span class="text-yellow-500">*</span></label>
                    <input type="text" name="name" class="border w-full text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira seu nome" value="{{old('name', $user['name'] ?? null)}}"/>
                </div>

                <div class="mt-3">
                    <label for="last_name" class="block text-base mb-2 font-semibold">Sobrenome</label>
                    <input type="text" name="last_name" class="border w-full text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira seu sobrenome" value="{{old('last_name', $user['last_name'] ?? null)}}"/>
                </div>

                <div class="mt-3">
                    <label for="email" class="block text-base mb-2 font-semibold">E-mail <span class="text-yellow-500">*</span></label>
                    <input type="email" name="email" class="border w-full text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira seu e-mail" value="{{old('email', $user['email'] ?? null)}}"/>
                </div>

                <div class="mt-3">
                    <label for="password" class="block text-base mb-2 font-semibold">Senha <span class="text-yellow-500">*</span></label>
                    <input style="width:300px;" type="password" id="password" name="password" class="border text-base px-2 py-1 rounded-l-lg focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira sua senha" value="{{old('password')}}"/><i class="bg-yellow-400 hover:bg-yellow-300 far fa-eye text-base px-2 py-1 rounded-r-lg" style="cursor: pointer" id="showPassword"></i>
                </div>
                
                <div class="mt-3">
                    <label for="password_confirmation" class="block text-base mb-2 font-semibold">Confirmar Senha <span class="text-yellow-500">*</span></label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="border w-full text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira novamente sua senha" value="{{old('password_confirmation')}}"/>
                </div>

                <hr class="mt-3">

                <div class="mt-3">
                    <button type="submit" class="border-2 border-yellow-400 bg-yellow-400 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-yellow-400 font-semibold">Criar Conta</button>
                </div>

            </form>
        </div>
    </div>
@endsection