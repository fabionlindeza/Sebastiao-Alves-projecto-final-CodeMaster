<?php

require_once("../funcoes/funcoes.php");

if(!verificarLogado()){
    header("Location: ../login.php");
    exit();
}

$form = isset($_GET["id"]);

if ($form){
    $id = $_GET["id"];
    $imprensa = selectSQLUnico("SELECT * FROM imprensa WHERE id = '$id'");
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

        <!-- Editor de texto -->
        <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
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
            <div class="row caixas">
                <div class="col-12 titulo_2 p-4">
                    <b>EDITAR IMPRENSA</b>

                    <br><br>

                    <form action="imprensa.php" >
                        <label>Título imprensa:</label>
                        
                        <br>

                        <input type="text" name="titulo" value="<?= $imprensa["titulo"]; ?>" required="required" autofocus placeholder="Título">
                        
                        <br><br>

                        <label>Link da imagem da imprensa:</label>
                        
                        <br>

                        <input type="text" name="imagem" value="<?= $imprensa["imagem"]; ?>" required="required" placeholder="Link imagem desktop">
                        <button> 
                            <a href="../../../gestor/tinyfilemanager.php" target="_blank">
                                CARREGAR IMAGEM
                            </a>
                        </button>
                        
                        <br><br>

                        <label>Texto da imprensa:</label>
                        <textarea name="texto" id="texto" cols="30" rows="10" placeholder="Escreva aqui a sua descrição..."><?= $imprensa["texto"]; ?></textarea>
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#texto' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script>
                        
                        <br><br>

                        <label>Data da Publicação:</label>
                        
                        <br>

                        <input type="text" name="data_pub" value="<?= $imprensa["data_pub"]; ?>" required="required" autofocus placeholder="Título">
                        
                        <br><br>

                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <input type="hidden" name="accao" value="editar">
                        <input type="submit" value="EDITAR">
                        
                    </form>
                </div>
            </div>
        </main>

        <footer class="text-center">
            FÁBIO LINDEZA © 2023
        </footer>
        
        <!-- JS BOOTSTRAP -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>