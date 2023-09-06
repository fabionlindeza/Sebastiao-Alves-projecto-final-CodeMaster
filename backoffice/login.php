<?php

require_once("php/funcoes/funcoes.php");

if(verificarLogado()){
    header("Location: php/paginas/inicio.php");
    exit();
}

$form = isset($_POST["login"]) && isset($_POST["senha"]);

if($form){
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    if(fazerLogin($login, $senha)){
        header("Location: php/paginas/inicio.php");
        exit();
    }
}

?>



<!DOCTYPE html>
<html lang="pt">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Backoffice</title>
        <!-- CSS do Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <!-- CSS LOCAL -->
        <link rel="stylesheet" href="css/estilo.css">
    </head>

    <body class="container-fluid">
        <br><br>

        <header>
            <div class="caixas entrada">
                Entrada backoffice
            </div>
        </header>

        <main>
            <br><br>    

            <div class="caixas login">
                <h3>LOGIN</h3>
            </div>

            <div class="caixas">
                <?php if($form): ?>
                    <h4>Login inválido, tente novamente.</h4>
                <?php endif; ?>

                <form action="" method="POST">
                    <input type="text" name="login" placeholder="Nome de utilizador" required="required" autofocus>

                    <br><br>

                    <input type="password" name="senha" placeholder="Senha" required="required">

                    <br><br>

                    <input type="submit" value="ENTRAR">

                    <br><br>
                </form>
            </div>
        </main>

        <footer class="text-center">
            FÁBIO LINDEZA © 2023
        </footer>

        <!-- JS do Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>