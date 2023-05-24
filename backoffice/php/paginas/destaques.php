<?php

require_once("../funcoes/funcoes.php");
require_once("../funcoes/helper.php");

if(!verificarLogado()){
    header("Location: ../login.php");
    exit();
}

$form = isset($_GET["destaque_1"]) && isset($_GET["destaque_2"]) && isset($_GET["destaque_3"]);

if($form){
    $destaque_1 = $_GET["destaque_1"];
    $destaque_2 = $_GET["destaque_2"];
    $destaque_3 = $_GET["destaque_3"];
    
    iduSQL("UPDATE home SET destaque_1 ='$destaque_1', destaque_2='$destaque_2', destaque_3='$destaque_3'"); 
}

$destaques = selectSQLUnico("SELECT destaque_1, destaque_2, destaque_3 FROM home");

$home = selectSQLUnico("SELECT * FROM home");

$livros = [];

if($home["destaque_1"] != 0){
    $livros[] = getLivroID($home["destaque_1"]);
}

if($home["destaque_2"] != 0){
    $livros[] = getLivroID($home["destaque_2"]);
}

if($home["destaque_3"] != 0){
    $livros[] = getLivroID($home["destaque_3"]);
}

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
                                <a class="nav-link menu" aria-current="page" href="inicio.php">INÍCIO</a>
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
                                <a class="nav-link menu active" aria-current="page" href="destaques.php">DESTAQUES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="imprensa.php">IMPRENSA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="contactos.php">CONTACTOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="redes.php">REDES</a>
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
                    <div class="col-12 bv_titulo p-4">
                        EDITADO COM SUCESSO!
                        <br><br>
                        <a href="destaques.php">
                            <button>VOLTAR</button>
                        </a>
                    </div>
                </div>
                    
                <br><br>
            
            <?php else: ?>
                <div class="row caixas">
                        <h3 class="h3_dif_cor"><b>BACKOFFICE DESTAQUES (MAX. 3)</b></h3>
                        <br><br>
                        <br><br>
                        <table class="mx-auto w-100 pb-5 mb-5">
                            <tr>
                                <th>IMAGEM</th>
                                <th>TITULO</th>
                                <th>OBSERVAÇÃO</th>
                                <th>DATA ACTUALIZAÇÃO</th>
                                <th>ACÇÕES</th>
                            </tr>
                            
                            <?php foreach($livros as $l): ?>
                                <tr>
                                    <td><img src="<?= $l["imagem"]; ?>" style="width: 100px"></td>
                                    <td><?= $l["titulo"]; ?></td>
                                    <td><?= $l["observacao"]; ?></td>
                                    <td><?= $_SESSION["nome"]; ?> (<?= $_SESSION["data_ultimo_acesso"]; ?>)</td>
                                    <td>
                                        <form action="destaques_saida.php">
                                            <button name="id" value="<?= $l;?>">EDITAR/ACRESCENTAR/REMOVER</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
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