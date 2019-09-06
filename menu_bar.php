

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand h1 mb-0">
        <img class="icone-menu" src="img/casa_de_crianca_logo.png" class="img-responsive col-sm-2 col-md-4 col-lg-6" id="icon">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsite">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsite">

            <ul class="navbar-nav">
            <div class=container>
                <li class="nav-item mr-auto texto-menu">
                        <div class="row">
                        <h2 class="text-center text-justify texto-titulo col-12"><?php echo utf8_encode($cabecalho);?></h2>


 <div class="container">
<div class="row">
    <div class="container">

    </div>
    <div class="container">


<p class="texto-cpf"><?php echo $nome ?></p>
</div>
</div>
<div class="container col-8">
<h6 class="text-center texto-nome"><?php echo "CPF: ".formatCnpjCpf($cpf) ?></h6>
</div>
</div>
                        </div>
                    </div>
                </li>
                <li class="nav-item item-li-cpf texto-menu">
                    <!-- <a href="" id="">     -->

                    <!-- </a> -->

                </li>



            </ul>

            <ul class="navbar-nav ml-auto">
            <li class="nav-item item-li">
                    <a href="index.php">
                        <h4 class="text-center texto-menu">Sair</h4>

                    </a>
                </li>

            </ul>

        </div>

    </div>
    <!---- Container Navbar-->






</nav>
