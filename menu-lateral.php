
<nav class="sidebar-header" id="principal">

   

<img src="img/casa_de_crianca_logo.png" class="col-6 col-md-offset-2" id="icon">


 



    <div id = "divTitulo">
<h5 id = "iconeTitulo"></h5>
    </div>
<div class = "container" id ="divmenu">
<ul id = "navmenu" class="nav flex-column" >
    <li class="nav-item item-li-cpf">
        <!-- <a href="" id="">     -->
        <h4><p><?php echo "CPF:".formatCnpjCpf($cpf) ?></p></h4>
        <h6><?php echo $nome ?></h6>
        <!-- </a> -->
        
    </li>

    <li class="nav-item item-li">
        <a href="index.php">
                <h4>Sair</h4>
                <h6>Desconectar-se do sistema</h6>
        </a>
    </li>
</ul>
</div><!----- div collapse -->
</div>
</nav>