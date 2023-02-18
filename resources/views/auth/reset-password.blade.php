<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title>Projeto API</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="{{url('js/jquery.js')}}"></script>
</head>
<body class="bg-gray-900">

    @if ($errors->any())   
        @foreach ($errors->all() as $erro)
            <div class="text-center w-full bg-red-400"> {{$erro}} </div>
        @endforeach
    @endif

    @if (session('message'))
        <div class="text-center w-full bg-green-400 mb-3"> {{session('message')}} </div>
    @endif

    <div class="flex justify-center items-center h-screen">
        <div class="w-96 p-6 shadow-lg bg-gray-500 rounded-md">
            <h1 class="text-3xl block text-center font-semibold text-yellow-400"><i class="fas fa-unlock-alt"></i> Crie sua nova senha</h1>
            <hr class="mt-3">
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2 font-semibold">E-mail</label>
                    <input type="email" name="email" class="border w-full text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira seu e-mail" value="{{old('email', $request->email)}}" required autofocus/>
                </div>

                <div class="mt-3">
                    <label for="password" class="block text-base mb-2 font-semibold">Senha</label>
                    <input style="width:300px;" type="password" id="password" name="password" class="border text-base px-2 py-1 rounded-l-lg focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira novamente sua senha" value="{{old('password')}}" required/><i class="bg-yellow-400 hover:bg-yellow-300 far fa-eye-slash text-base px-2 py-1 rounded-r-lg" style="cursor: pointer" id="showPassword"></i>
                </div>
                
                <div class="mt-3">
                    <label for="password_confirmation" class="block text-base mb-2 font-semibold">Confirmar Senha</label>
                    <input type="password" name="password_confirmation" class="border w-full text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira sua senha" value="{{old('password_confirmation')}}" required/>
                </div>

                <hr class="mt-3">

                <div class="mt-3">
                    <button type="submit" class="border-2 border-yellow-400 bg-yellow-400 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-yellow-400 font-semibold">Alterar Senha</button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>