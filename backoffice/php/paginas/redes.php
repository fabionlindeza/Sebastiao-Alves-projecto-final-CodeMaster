<?php

require_once("../funcoes/funcoes.php");

if(!verificarLogado()){
    header("Location: ../login.php");
    exit();
}

$form = isset($_GET["insta"]) && isset($_GET["face"]) && isset($_GET["linkd"]);

if ($form){
    $insta = $_GET["insta"];
    $face = $_GET["face"];
    $linkd = $_GET["linkd"];
    
    iduSQL("UPDATE redessociais SET insta = '$insta', face = '$face', linkd= '$linkd'");     
}

$redes = selectSQLUnico("SELECT * FROM redessociais");

?>



<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Backoffice</title>
        <!-- CSS BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <!-- CSS LOCAL -->
        <link rel="stylesheet" href="../../css/estilo.css">
        <script src="../../js/funcoes.js"></script>
    </head>

    <body class="container-fluid">
        <header>
            <div class="row caixas mt-3">
                <div class="col-12 text-center titulo p-3 mt-4 mb-3">BACKOFFICE</div>
                <nav class="col-12 navbar navbar-expand-lg">
                    <div class="collapse navbar-collapse justify-content-center">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="inicio.php">INICIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="carousel.php">CAROUSEL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="home.php">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="autor.php">AUTOR</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="livros.php">LIVROS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="destaques.php">DESTAQUES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="imprensa.php">IMPRENSA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="contactos.php">CONTACTOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu active" aria-current="page" href="redes.php">REDES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="logoff.php">SAIR</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <br><br>

        <main>
            <?php if ($form):?>
                <div class="row caixas">
                    <div class="col-12 titulo_2 p-4">
                        <i>EDITADO COM SUCESSO!</i>
                        
                        <br><br>

                        <a href="redes.php">
                            <button>VOLTAR</button>
                        </a>
                    </div>
                </div>
                
                <br><br>
            
            <?php else: ?>
                <div class="row caixas d-flex justify-content-center">
                    <h3 class="h3_dif_cor"><b>BACKOFFICE REDES SOCIAIS</b></h3>
                    
                    <br><br><br><br>

                    <h5 class="h5_dif_cor">Instagram</h5>
                    <span style="color: black"><?= $redes["insta"]; ?></span>
                    
                    <br><br>

                    <hr>
                    
                    <br><br>

                    <h5 class="h5_dif_cor">Facebook</h5>
                    <span style="color: black"><?= $redes["face"]; ?></span>
                    
                    <br><br>

                    <hr>
                    
                    <br><br>

                    <h5 class="h5_dif_cor">LinkedIn</h5>
                    <span style="color: black"><?= $redes["linkd"]; ?></span>
                    
                    <br><br>

                    <hr>
                    
                    <br><br>
                    
                    <form action="redes_saida.php">
                        <button>EDITAR</button>
                    </form>
                </div>
    
            <?php endif; ?>

            <br><br>
        </main>

        <footer class="text-center">
            FÁBIO LINDEZA © 2023
        </footer>

        <!-- JS BOOTSTRAP -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>