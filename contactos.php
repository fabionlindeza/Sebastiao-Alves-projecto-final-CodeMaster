<?php

require_once("php/funcoes/helper.php");

//header
$carousel = getTodosCarousel();
$home = getHome();
$livros = [];
$menu_livros = getTodosLivros();


//main e footer
$contactos = getContactos();
$redes = getRedes();

?>



<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <title>CONTACTOS</title>

        <!--CSS Bootstrap--> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        
        <!--JQUERY--> 
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

        <!--CSS LOCAL--> 
        <link rel="stylesheet" href="css/formatacaobase.css">
        <link rel="stylesheet" href="css/estilo.css">
        <script src="js/funcoes.js"></script>
    </head>

    <body class="container-fluid px-0">
        <header class="container-fluid px-0">
            <div class="row inicio" id="menu-home">
                <div class="col mx-auto d-none d-md-block">
                    <div class="col-12 d-flex justify-content-around titulo justify-content-md-center mt-5">sebastião alves</div>
                    <div class="col traco"></div>
                    <nav class="col-12 navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link menu" aria-current="page" href="home.php">home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu" aria-current="page" href="autor.php">autor</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="menu-dropdown" class="nav-link dropdown-toggle menu"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        livros
                                    </a>
                                    <ul class="dropdown-menu">
                                        <form action="livro.php">
                                            <?php foreach($menu_livros as $l): ?> 
                                                <li>              
                                                    <button name="livro" value="<?= $l["id"];?>" class="dropdown-item submenu mt-3"><?= $l["titulo"]; ?></button>
                                                </li>
                                            <?php endforeach; ?>
                                        </form>
                                    </ul> 
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu" aria-current="page" href="imprensa.php">imprensa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu selected" aria-current="page" href="contactos.php">contactos</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>    
            </div>  
            
            <div id="cabecalho" class="carousel slide d-none d-md-block px-0" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <?php for($i=0; $i<count($carousel); $i++): ?>    
                        <li data-bs-target="#cabecalho" data-bs-slide-to="<?= $i; ?>" class="<?= ($i == 0) ? "active" : ""; ?>" aria-current="true"></li>
                    <?php endfor; ?>
                </ol>
                <div class="carousel-inner">
                    <?php for($i=0; $i<count($carousel); $i++): ?>
                        <?php $c = $carousel[$i]; ?>    
                            <div class="carousel-item <?= ($i == 0) ? "active" : ""; ?>">
                                <img src="<?= $c["imagem_desktop"]; ?>" class="cabecalho-img d-block w-100" alt="cabecalho1">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="novidade"><?= $c["observacao"]; ?></div>
                                    <div class="titulo_cabecalho col-5 mt-2"><?= $c["titulo"]; ?></div>
                                    <div class="texto_cabecalho col-7 mt-2">
                                        <?= substr($c["texto"], 0, 250); ?>...
                                    </div>
                                    <div class="btn-text-left mt-4">
                                        <a href="<?= $c["saber_mais"]; ?>">
                                            <button class="saber_mais"></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    <?php endfor; ?>
                </div>               
            </div>

            <!--MOBILE-->

            <div class="row inicio">
                <div class="col-12 mx-auto d-block d-md-none">
                    <div class="col-12 titulo mt-5 ps-2">sebastião alves</div>
                    <div class="col traco"></div>
                    <nav class="col-12 navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link menu" aria-current="page" href="home.php">home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu" aria-current="page" href="autor.php">autor</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="menu-dropdown" class="nav-link dropdown-toggle menu"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        livros
                                    </a>
                                    <ul class="dropdown-menu">
                                        <form action="livro.php">
                                            <?php foreach($menu_livros as $l): ?> 
                                                <li>              
                                                    <button name="livro" value="<?= $l["id"];?>" class="dropdown-item submenu mt-3"><?= $l["titulo"]; ?></button>
                                                </li>
                                            <?php endforeach; ?>
                                        </form>
                                    </ul> 
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu" aria-current="page" href="imprensa.php">imprensa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu selected" aria-current="page" href="contactos.php">contactos</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>    
            </div>

            <div id="cabecalho2" class="carousel slide d-block d-md-none px-0" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <?php for($i=0; $i<count($carousel); $i++): ?>    
                        <li data-bs-target="#cabecalho2" data-bs-slide-to="<?= $i; ?>" class="<?= ($i == 0) ? "active" : ""; ?>" aria-current="true"></li>
                    <?php endfor; ?>
                </ol>
                <div class="carousel-inner">
                    <?php for($i=0; $i<count($carousel); $i++): ?>
                        <?php $c = $carousel[$i]; ?>    
                            <div class="carousel-item <?= ($i == 0) ? "active" : ""; ?>">
                                <img src="<?= $c["imagem_mobile"]; ?>" class="cabecalho-img d-block w-100" alt="cabecalho1">
                                <div class="carousel-caption d-block d-md-none">
                                    <div class="novidade"><?= $c["observacao"]; ?></div>
                                    <div class="titulo_cabecalho col-12 mt-2"><?= $c["titulo"]; ?></div>
                                    <div class="texto_cabecalho col-12 mt-2">
                                        <?= substr($c["texto"], 0, 200); ?>...
                                    </div>
                                    <div class="btn-text-left mt-5 pt-4">
                                        <a href="<?= $c["saber_mais"]; ?>">
                                            <button class="saber_mais"></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    <?php endfor; ?>  
                </div>               
            </div>
        </header>

        <main class="container-fluid px-0 foco" id="main">
            <div class="row caixabranca2">
                <div class="col-7 textocaixa2 ms-5">
                    <div class="row">
                        <div class="col novidade">contactos</div>                        
                    </div>
                    <div class="row">
                        <div class="col t1 pb-3">PODE CONTACTAR-ME ATRAVÉS DO E-MAIL OU TELEFONE</div>                       
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center text-center mt-5 d-md-block d-none">
                <div class="col-12 contactos">
                    <div class="row mt-5 d-flex justify-content-center text-center">
                        <div class="col-3 contato_titulo2">Telefone</div>
                        <div class="col-2 ms-2 contato_titulo2">morada</div>
                        <div class="col-3 ms-2 contato_titulo2">e-mail</div>
                    </div>
                    <div class="row mt-1 d-flex justify-content-center text-center">
                        <div class="col-3 contato_conteudo"><?= $contactos["telefone"] ?></div>
                        <div class="col-2 ms-2 contato_conteudo"><?= $contactos["morada"] ?></div>
                        <div class="col-3 ms-2 contato_conteudo"><?= $contactos["mail"] ?></div>
                    </div>                       
                </div>

                <div class="row d-flex justify-content-center text-center">
                    <div class="col-1 traco3 mt-5 mb-2 mx-5 d-flex"></div>
                </div>
                    
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-12">
                        <div class="row mt-5 d-flex justify-content-center text-center">
                            <div class="col-3 ms-2 contato_titulo2">Horário</div>
                        </div>
                        <div class="row mt-1 d-flex justify-content-center text-center mb-5">
                            <div class="col-3 ms-2 contato_conteudo"><?= $contactos["horario"] ?></div>
                        </div>                       
                    </div>
                </div>
            </div>

            <!--MOBILE-->

            <div class="row d-block d-md-none mt-5 px-0">
                <div class="row d-flex justify-content-center text-center mt-5">
                    <div class="row mt-3 d-flex justify-content-center text-center">
                        <div class="col-8 contato_titulo2">telefone</div>
                        <div class="col-8 mt-1 contato_conteudo"><?= $contactos["telefone"] ?></div>
                        <div class="col-8 mt-4 contato_titulo2 pt-4">morada</div>
                        <div class="col-8 mt-1 contato_conteudo"><?= $contactos["morada"] ?></div>
                        <div class="col-8 mt-4 contato_titulo2 pt-4">e-mail</div>
                        <div class="col-8 mt-1 contato_conteudo"><?= $contactos["mail"] ?></div>
                    </div>

                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-1 traco3 mt-5 mb-2 mx-5 d-flex"></div>
                    </div>
    
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-12">
                            <div class="row mt-5 d-flex justify-content-center text-center">
                                <div class="col-3 ms-2 contato_titulo2">Horário</div>
                            </div>
                            <div class="row mt-1 d-flex justify-content-center text-center mb-5">
                                <div class="col-8 ms-2 contato_conteudo mb-4">De Segunda a Sexta das 00:00h às 00:00h</div>
                            </div>                       
                        </div>
                    </div> 
                </div>
            </div>
        </main>

        <footer class="px-0">
            <div class="row baixo">
                <div class="col traco2 mt-5 mb-2 mx-5 mn_menu"></div>
                <nav class="col-12 navbar navbar-expand-lg  mn_menu">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="home.php">home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="autor.php">autor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" href="#menu-dropdown" onclick="abrir()">Livros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu" aria-current="page" href="imprensa.php">imprensa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu selected" aria-current="page" href="contactos.php">contactos</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="col traco2 mt-2 mx-5"></div>
                <div class="row d-none d-md-block mb-5">
                    <div class="row c-rs">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 t1">contactos</div>
                                <div class="row mt-3">
                                    <div class="col-5 contato_titulo">morada</div>
                                    <div class="col-3 ms-2 contato_titulo">telefone</div>
                                    <div class="col-3 ms-2 contato_titulo">e-mail</div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-5 contato_conteudo"><?= $contactos["morada"] ?></div>
                                    <div class="col-3 ms-2 contato_conteudo"><?= $contactos["telefone"] ?></div>
                                    <div class="col-3 ms-2 contato_conteudo"><?= $contactos["mail"] ?></div>
                                </div>
                            </div>                        
                        </div>
                    
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12 t1 text-center">siga-me nas redes sociais</div>
                                <div class="col-11 d-flex justify-content-center gap-4 mt-4">
                                    <div class="insta">
                                        <a href="<?= $redes["insta"] ?>" target="_blank">
                                            <img src="imagens/desktop/instagram1.svg" class="img-rs img-i1" alt="instagram1">
                                            <img src="imagens/desktop/instagram2.svg" class="img-rs img-i2" alt="instagram2">
                                        </a>
                                    </div>
                                    <div class="face">
                                        <a href="<?= $redes["face"] ?>" target="_blank">
                                            <img src="imagens/desktop/facebook1.svg" class="img-rs img-f1"alt="facebook1">
                                            <img src="imagens/desktop/facebook2.svg" class="img-rs img-f2"alt="facebook2">
                                        </a>
                                    </div>
                                    <div class="lin">
                                            <a href="<?= $redes["linkd"] ?>" target="_blank">
                                                <img src="imagens/desktop/linkedin1.svg" class="img-rs img-l1"alt="linkedin1">
                                                <img src="imagens/desktop/linkedin2.svg" class="img-rs img-l2"alt="linkedin2">
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 infolegal">
                            <img src="imagens/desktop/livroreclamacoes.svg" class="livroreclamacoes" alt="livroreclamacoes">
                            <img src="imagens/desktop/ralc.svg" class="ralc" alt="ralc">
                        </div>
                        <div class="col-4 cookies">
                            <div class="row text-center">
                                <div class="col-12 p">Politica de Cookies.</div>
                                <div class="col-12 p">Copyright © Grupo MediaMaster. Todos os direitos reservados.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
            <!--Mobile-->
       
            <div class="row d-flex justify-content-center text-center d-block d-md-none mt-5">
                <div class="col-12 t1 mt-5">siga-me nas redes sociais</div>
                <div class="col-8 d-flex justify-content-center gap-4 mt-4">
                    <div class="insta">
                        <a href="<?= $redes["insta"] ?>" target="_blank">
                            <img src="imagens/desktop/instagram1.svg" class="img-rs img-i1" alt="instagram1">
                            <img src="imagens/desktop/instagram2.svg" class="img-rs img-i2" alt="instagram2">
                        </a>
                    </div>
                    <div class="face">
                        <a href="<?= $redes["face"] ?>" target="_blank">
                            <img src="imagens/desktop/facebook1.svg" class="img-rs img-f1"alt="facebook1">
                            <img src="imagens/desktop/facebook2.svg" class="img-rs img-f2"alt="facebook2">
                        </a>
                    </div>
                    <div class="lin">
                        <a href="<?= $redes["linkd"] ?>" target="_blank">
                            <img src="imagens/desktop/linkedin1.svg" class="img-rs img-l1"alt="linkedin1">
                            <img src="imagens/desktop/linkedin2.svg" class="img-rs img-l2"alt="linkedin2">
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-12 d-flex justify-content-center d-block d-md-none mt-5">
                <img src="imagens/desktop/livroreclamacoes.svg" class="livroreclamacoes" alt="livroreclamacoes">
                <img src="imagens/desktop/ralc.svg" class="ralc" alt="ralc">
            </div>
            <div class="col-12 d-flex justify-content-center d-block d-md-none mt-5">
                <div class="row text-center">
                    <div class="col-12 p">Politica de Cookies.</div>
                    <div class="col-12 p">Copyright © Grupo MediaMaster. </div>
                    <div class="col-12 p">Todos os direitos reservados.</div>
                </div>
            </div>
        </footer>

        <br><br><br>
        
        <script src="js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>