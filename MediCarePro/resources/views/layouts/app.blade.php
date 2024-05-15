<!doctype html>
<html lang="pt-br">

<head>
    <title>
        MediCarePro - @yield('title', 'Home')
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    @yield('styles')
    <style>
        footer {
            background-color: #f8f8f8;
            position: relative;
            padding: 10px 20px;
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        @include('components.navbar')
    </header>
    <main>
        @yield('content')
    </main>
    <div class="spacer"></div>
    <footer>
        @include('components.footer')
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/b5d93e2cf1.js" crossorigin="anonymous"></script>

    @yield('scripts')
    <script>
        /*
            updateSpacerHeight:
            Atualiza a altura do espaçador do rodapé
        */
        function updateSpacerHeight() {
            // Calculando a altura dos itens da página
            var footerHeight = document.querySelector('footer').offsetHeight;
            var headerHeight = document.querySelector('header').offsetHeight;
            var mainHeader = document.querySelector('main').offsetHeight;

            // Calculando a altura da tela
            var windowHeight = window.innerHeight;

            // Definindo o tamanho do espaçador de acordo com a altura da tela e os itens existentes;
            document.querySelector('.spacer').style.height = windowHeight - (footerHeight + headerHeight + mainHeader) +
                'px';
        }

        // Definindo o espaçador quando a página carrega
        updateSpacerHeight();

        // Calculando novamente o espaçador quando a página é redimensionada
        window.addEventListener('resize', updateSpacerHeight);
    </script>
</body>

</html>
