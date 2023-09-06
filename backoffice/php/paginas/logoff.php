<?php

session_start();
session_destroy();

?>


<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bakoffice</title>
        <!-- CSS LOCAL -->
        <link rel="stylesheet" href="../../css/estilo.css">
    </head>

    <body>
        <header>
            <br>

            <div class="caixas">
                <br>

                <h3 class="h3_dif_cor">SAIU DO BACKOFFICE</h3> 
                
                <a href="../../login.php">
                    <button>
                        LOGIN
                    </button>
                </a>

                <br><br>
            </div>
        </header>

        <footer class="text-center">
            FÁBIO LINDEZA © 2023
        </footer>
    </body>
</html>