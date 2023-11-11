@extends('templates.padrao')

@section('content')
    <div  class="container mx-auto py-8 w-full">
        <div class="grid justify-items-center px-3 py-3">
            <img class="rounded-full shadow-2xl md: w-64" src="{{ url('storage/minha-foto.jpg') }}" alt="">
        </div>
        <div class="container mx-auto py-2 px-3 w-full bg-gray-700 rounded-lg mt-3">
            <h1 class='text-yellow-500 text-3xl text-center'>FILIPE PIRES MACHADO</h1>
            <?php $tempoTrabalho = (date('Y') - 2016)?>
            <span style="margin: 5px;">
                <p>
                    Olá! Sou Filipe Pires Machado, um entusiasta da programação dedicado a transformar ideias em código eficiente e soluções inovadoras. Minha jornada no desenvolvimento de software é orientada pelo constante desejo de aprender e aprimorar minhas habilidades.
                </p>
                <p>
                    Atualmente, estou embarcando na emocionante jornada de estudos para me especializar em Laravel, a robusta estrutura PHP. Acredito que esta especialização abrirá novas possibilidades para criar aplicativos web escaláveis e de alta qualidade. Com experiência em <b>Programação Web, Banco de dados, versionamento de código</b>, desenvolvi uma abordagem prática para resolver problemas complexos e entregar projetos excepcionais.
                </p>
                <p>
                    Minha filosofia de desenvolvimento não se limita apenas ao código eficiente; envolve também compreender as necessidades do cliente e criar soluções que superem expectativas. Estou comprometido com o aprendizado contínuo, explorando novas funcionalidades do Laravel e acompanhando as últimas tendências da indústria.
                </p>
                <p>
                    Além do meu amor pela programação, sou extremamente compromotido com as tarefas que estão sobre minha responsabilidade e gosto sempre de discutir funcionalidades extras para esta, o que contribui para minha perspectiva única no desenvolvimento de software. Estou entusiasmado com o desafio futuro de me especializar plenamente em Laravel e confiante de que esta jornada de aprendizado trará benefícios significativos aos futuros projetos que abraçarei.
                </p>
                <p>
                   Se você está em busca de um desenvolvedor dedicado, apaixonado pela criação de experiências digitais excepcionais, estou pronto para enfrentar novos desafios e contribuir para o sucesso do seu projeto.

                </p>
            </span>

            <span class="text-yellow-500 hover:text-yellow-300 grid justify-items-center px-3 py-3"><a href="https://www.linkedin.com/in/filipe-pires-79018013b/" target="blank"><i class="fab fa-linkedin text-3xl"></i></a></span>
        </div>
    </div>
@endsection