<?php

require_once("../funcoes/funcoes.php");

if(!verificarLogado()){
    header("Location: ../login.php");
    exit();
}

$form = isset($_GET["accao"]);

if ($form){
    $accao=$_GET["accao"];
    switch($accao){
        case "novo":
            $titulo = $_GET["titulo"];
            $imagem = $_GET["imagem"];
            $texto = $_GET["texto"];
            $data_pub = $_GET["data_pub"];
            iduSQL("INSERT INTO imprensa (titulo,imagem, texto, data_pub) VALUES ('$titulo','$imagem', '$texto', '$data_pub')");
            break;
        case "apagar":
            $id = $_GET["id"];
            iduSQL("DELETE FROM imprensa WHERE id=$id");
            break;
        case "editar":
            $id = $_GET["id"];
            $titulo = $_GET["titulo"];
            $imagem = $_GET["imagem"];
            $texto = $_GET["texto"];
            $data_pub = $_GET["data_pub"];
            iduSQL("UPDATE imprensa SET titulo = '$titulo', imagem= '$imagem', texto = '$texto', data_pub = '$data_pub' WHERE id = $id");
            break;
    }
}

$imprensa = selectSQL("SELECT * FROM imprensa");

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
                                <a class="nav-link menu" aria-current="page" href="destaques.php">DESTAQUES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu active" aria-current="page" href="imprensa.php">IMPRENSA</a>
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
                        <div class="col-12 titulo_2 p-4">
                            <i>EDITADO/APAGADO/INSERIDO COM SUCESSO!</i>
                            
                            <br><br>

                            <a href="imprensa.php">
                                <button>VOLTAR</button>
                            </a>
                        </div>
                    </div>
                    
                <br><br>
            
            <?php else: ?>
                <div class="row caixas">
                    <h3 class="h3_dif_cor"><b>BACKOFFICE IMPRENSA</b></h3>
                    
                    <br><br><br><br>

                    <table class="mx-auto w-100 pb-5 mb-5">
                        <tr>
                            <th>IMAGEM</th>
                            <th>TITULO</th>
                            <th>TEXTO</th>
                            <th>DATA PUBLICAÇÃO</th>
                            <th>DATA ACTUALIZAÇÃO</th>
                            <th>ACÇÕES</th>
                        </tr>

                        <?php foreach($imprensa as $i): ?>

                            <tr>
                                <td><img src="<?= $i["imagem"]; ?>" style="width: 100px"></td>
                                <td><?= $i["titulo"]; ?></td>
                                <td><?= $i["texto"]; ?></td>
                                <td><?= $i["data_pub"]; ?></td>
                                <td><?= $_SESSION["nome"]; ?> (<?= $_SESSION["data_ultimo_acesso"]; ?>)</td>
                                
                                <td>
                                    <form action="imprensa_saida.php">
                                        <input type="hidden" name="accao" value="editar">
                                        <button name="id" value="<?= $i["id"];?>">Editar</button>
                                    </form>
                                    
                                    <br>

                                    <form action="">
                                        <input type="hidden" name="accao" value="apagar">
                                        <button name="id" value="<?= $i["id"];?>">Apagar</button>
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </table>

                    <form action="novo_imprensa.php">
                        <input type="hidden" name="accao" value="novo">
                        <button name="id" value="<?= $i["id"];?>" style="width: 100px">Novo</button>
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