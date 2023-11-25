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
    <!--<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('registro') }}">Registro</a>
                </li>
            </ul>
        </div>
    </nav>-->
    
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
                    <h4>Aqui inserimos um texto ou logo do estabelecimento ou uma frase marcante que sabe</h4>
                    </p>
                    <br>
                    <a href="#" class=" btn btn-success"> Venha conferir </a>
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
                    <h1 class="text-center"> "But I must explain to you how all this mistaken idea of denouncing
                        pleasure and praising pain was born and I will gi </h1>
                    <p class="text-center"> "But I must explain to you how all this mistaken idea of denouncing pleasure
                        and praising pain was born and I will give you a complete account of the system, and expound the
                        actual teachings of the great explorer of the truth, the master-builder of human happiness. No
                        one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who
                        do not know how to pursue pleasure rationally encounter consequences that are extremely painful.
                        Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it
                        is pain, but because occasionally circumstances occur in which toil and pain can procure him
                        some great pleasure. To take a trivial example, which of us ever undertakes laborious physical
                        exercise, except to obtain some advantage from it? But who has any right to find fault with a
                        man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain
                        that produces no resultant pleasure?"</p>
                </div>
            </div>
            <br>
            <div class="row text-center">
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img style="width: 300px; height: 400px;" src="{{ asset('img/3.jpg') }}">
                        <br>
                        <div class="caption text-center">
                            <br>
                            <h3> Figura 1 </h3>
                            <p> Desc figura 1 </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img style="width: 300px; height: 400px;" src="{{ asset('img/4.jpg') }}">
                        <div class="caption text-center">
                            <br>
                            <h3> Figura 2 </h3>
                            <p> Desc figura 2 </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img style="width: 300px; height: 400px;" src="{{ asset('img/5.jpg') }}">
                        <div class="caption text-center">
                            <br>
                            <h3> Figura 3 </h3>
                            <p> Desc figura 3 </p>
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
                    <h1 class=text-center> Venha conferir </h1>
                    <p class="lead text-center"> But I must explain to you how all this mistaken idea of denouncing
                        pleasure and praising pain was born and I will give you a complete account of the system, and
                        expound the </p>
                    <button type="button" class="btn btn-success" style="width: 200px; border: 10%;"> Acesso
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-site">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p class="text-center">todos os direitos reservados </p>
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
