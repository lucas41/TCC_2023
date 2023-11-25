<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>    
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <span class="icon"><ion-icon name="wallet-outline"></ion-icon></span>
                <span class="title">Se Controla</span>
            </a>
            <div class="navbar-buttons ml-auto">
                <a href="{{ route('login') }}" class="btn btn-light mr-2">Login</a>
                <a href="{{ route('registro') }}" class="btn btn-light">Registro</a>
            </div>
        </div>
    </nav>
    

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <section class="Header-site">
        <div class="container">
            <div class="row text-center">
                <div class="col-xs-12">
                    <h1 class=text-center> Bem vindo </h1>
                    <p class="lead text-center">
                    <h4>ao nosso site de controle financeiro! Otimize suas finanças com centro de custos personalizados para alcançar seus objetivos com facilidade.</h4>
                    </p>
                    <br>
                    <a href="{{ route('registro') }}" class=" btn btn-success"> Venha conferir </a>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="content-site">

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <br>
                    <h1 class="text-center">Transforme seus sonhos em realidade: domine suas finanças com nosso controle personalizado. Seu futuro financeiro começa aqui!</h1>
                    <br>
                    <p class="text-center"> Descubra a liberdade financeira em suas mãos! Nosso site oferece a praticidade de controle tanto no computador quanto no celular, permitindo que você gerencie suas finanças de qualquer lugar. Com centros de custo personalizados, você pode categorizar despesas de acordo com suas necessidades, ganhando clareza e controle. Além disso, a geração automática de relatórios mensais simplifica o acompanhamento do seu progresso, colocando você no caminho certo para alcançar seus objetivos. Transforme sua relação com o dinheiro - comece agora!</p>
                </div>
            </div>
            <br>
            <div class="row text-center">
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img style="width: 300px; height: 300px;" src="{{ asset('img/3.jpg') }}">
                        <br>
                        <div class="caption text-center">
                            <br>
                            <h3> Gerenciamento Prático </h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img style="width: 300px; height: 300px;" src="{{ asset('img/4.jpg') }}">
                        <div class="caption text-center">
                            <br>
                            <h3> Centros de custo </h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img style="width: 300px; height: 300px;" src="{{ asset('img/5.jpg') }}">
                        <div class="caption text-center">
                            <br>
                            <h3> Acesse em qualquer lugar </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <br>
    <section class="img-site">
        <div class="container">
            <div class="row text-center">
                <div class="col-xs-12">
                    <p class="lead text-center"> Obrigado por escolher nosso site para aprimorar sua gestão financeira. Estamos aqui para apoiar seus objetivos e proporcionar uma jornada tranquila rumo ao sucesso financeiro. Conte conosco para fornecer as ferramentas necessárias que o ajudarão a prosperar.
                    </p>
                    <!--<button type="button" class="btn btn-success" style="width: 200px; border: 10%;"> Acesso
                    </button>-->
                </div>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
