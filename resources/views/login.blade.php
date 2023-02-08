@extends("templates.login")

@section("content")
    <form action="" method="POST"> 
        <div class="flex justify-center items-center h-screen">
            <div class="w-96 p-6 shadow-lg bg-gray-500 rounded-md">
                <h1 class="text-3xl block text-center font-semibold text-yellow-400"><i class="fas fa-user text-yellow-400"></i> Login</h1>
                <hr class="mt-3">
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2 font-semibold">E-mail</label>
                    <input type="email" id="email" class="border w-full text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira seu e-mail"/>
                </div>

                <div class="mt-3">
                    <label for="senha" class="block text-base mb-2 font-semibold">Senha</label>
                    <input type="password" id="senha" class="border w-full text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" placeholder="Insira sua senha"/>
                </div>

                <div class="mt-3 flex justify-between items-center">
                    <div>
                    <input type="checkbox">
                    <label>Lembrar de mim</label> 
                    </div>
                    <div>
                        <a class="text-yellow-400 font-semibold" href="#">Esqueceu a senha?</a>
                    </div>
                </div>

                <div class="mt-5">
                    <button type="submit" class="border-2 border-yellow-400 bg-yellow-400 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-yellow-400 font-semibold">Entrar</button>
                </div>
                <span class="flex justify-end items-end text-yellow-400"><a href=" {{route('cadastro')}} ">Criar conta</a></span>
                <hr class="mt-3">

                <span>Ou entre com suas redes sociais</span>

                <div class="mt-3 flex justify-center items-center">
                    <a class="text-2xl text-yellow-400 px-2" href="#"><i class="fab fa-google"></i> </a>
                    <a class="text-2xl text-yellow-400 px-2" href="#"><i class="fab fa-facebook"></i> </a>
                </div> 
            </div>
        </div>
    </form> 
@endsection
