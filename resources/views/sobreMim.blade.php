@extends('templates.padrao')

@section('content')
    <div  class="container mx-auto py-8 w-full">
        <div class="grid justify-items-center px-3 py-3">
            <img class="rounded-full shadow-2xl md: w-64" src="{{ url('storage/minha-foto.jpg') }}" alt="">
        </div>
        <div class="container mx-auto py-2 w-full bg-gray-700 rounded-lg mt-3">
            <h1 class='text-yellow-500 text-3xl text-center'>FILIPE PIRES MACHADO</h1>
            <?php $idade = (date('Y') - 1997)?>
            <?php $tempoTrabalho = (date('Y') - 2016)?>
            <span>
                <p>
                    Olá, bem vindo ao meu portifólio. 
                </p>
                <p>
                    Me chamo Filipe Pires Machado, atualmente tenho <?= $idade ?> anos e moro no Rio de Janeiro,
                    tenho formação técnica em informática e sou graduado em Sistemas de informação, tenho <?= $tempoTrabalho ?> ano de experiência nessa área
                    de tecnologia. E desde o início do curso técnico me apaixonei especificamente pela área de programação onde.
                </p>
                <p>
                    Pretendo me especializar na linguagem PHP e no framework Laravel
                </p>
            </span>

            <span class="text-yellow-500 hover:text-yellow-300 grid justify-items-center px-3 py-3"><a href="https://www.linkedin.com/in/filipe-pires-79018013b/" target="_blank"><i class="fab fa-linkedin text-3xl"></i></a></span>
        </div>
    </div>
@endsection