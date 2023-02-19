@extends("templates.login")

@section("content")
    @if ($errors->any())   
        @foreach ($errors->all() as $erro)
            <div class="text-center w-full bg-red-400 mb-3"> {{$erro}} </div>
        @endforeach
    @endif

    @if (session('message'))
        <div class="text-center w-full bg-green-400 mb-3"> {{session('message')}} </div>
    @endif

    <form action="{{route('login')}}" method="POST"> 
        @csrf
        <div class="flex justify-center items-center h-screen">
            <div class="w-96 p-6 shadow-lg bg-gray-500 rounded-md">
                <h1 class="text-3xl block text-center font-semibold text-yellow-400"><i class="fas fa-user text-yellow-400"></i> Login</h1>
                <hr class="mt-3">
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2 font-semibold">E-mail</label>
                    <input type="email" name="email" class="border w-full text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira seu e-mail"/>
                </div>

                <div class="mt-3">
                    <label for="password" class="block text-base mb-2 font-semibold">Senha</label>
                    <input style="width:300px;" type="password" id="password" name="password" class="border text-base px-2 py-1 rounded-l-lg focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira sua senha" value="{{old('password')}}"/><i class="bg-yellow-400 hover:bg-yellow-300 far fa-eye text-base px-2 py-1 rounded-r-lg" style="cursor: pointer" id="showPassword"></i>
                </div>

                <div class="mt-3 flex justify-between items-center">
                    <div>
                        <input type="checkbox" name="remember" id="remember-me">
                        <label for="remember-me">Lembrar de mim</label> 
                    </div>
                    <div>
                        <a class="text-yellow-400 font-semibold hover:text-yellow-200" href="{{route('password.request')}}">Esqueceu a senha?</a>
                    </div>
                </div>

                <div class="mt-5">
                    <button type="submit" class="border-2 border-yellow-400 bg-yellow-400 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-yellow-400 font-semibold">Entrar</button>
                </div>
                <span class="flex justify-end items-end text-yellow-400 hover:text-yellow-200"><a href=" {{route('register')}} ">Criar conta</a></span>
                <hr class="mt-3">

                <span>Ou entre com suas redes sociais</span>

                <div class="mt-3 flex justify-center items-center">
                    <a class="text-2xl text-yellow-400 px-2" title="Login com o Github" href="{{route('social.login', ['driver' => 'github'])}}"><i class="fab fa-github"></i> </a>
                    <a class="text-2xl text-yellow-400 px-2" title="Login com o Facebook" href="{{route('social.login', ['driver' => 'facebook'])}}"><i class="fab fa-facebook"></i> </a>
                </div> 
            </div>
        </div>
    </form> 
@endsection