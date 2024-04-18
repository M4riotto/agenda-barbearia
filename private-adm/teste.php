<?php
include_once("sentinela-adm.php");

require_once("../classes/Conexao.php");
require_once("../classes/Produto.php");
try {
    $produto = new Produto();
    $listaproduto = $produto->listar();
    $contaProduto = $produto->contar();
} catch (Exception $e) {
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">


<head>
    <title>Produtos | Duhel</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/private.css">
    <link rel="stylesheet" href="../css/private-produtos.css">
    <link rel="stylesheet" href="../css/conteudo-pag.css">
    <link rel="stylesheet" href="../css/portal.css">
    <link rel="stylesheet" href="../css/alert.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;700;900&family=Montserrat:wght@300;400:500&display=swap" rel="stylesheet">
    <!-- - - - - - - - -| ANIMAÇÃO | - - - - - - - - -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- - - - - - - - -| ÍCONE | - - - - - - - - -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <!-- - - - - - - - -| TÍTULO & ÍCONE HEAD | - - - - - - - - -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

    <style>
        .switch {
            position: absolute;
            margin-left: -9999px;
            visibility: hidden;
        }

        .switch+label {
            display: block;
            position: relative;
            cursor: pointer;
            outline: none;
            user-select: none;
        }

        /* tamanho fundo */
        .switch--shadow+label {
            padding: 2px;
            width: 70px;
            height: 30px;
            background-color: #dddddd;
            border-radius: 60px;
        }

        .switch--shadow+label:before,
        .switch--shadow+label:after {
            display: block;
            position: absolute;
            top: 1px;
            left: 1px;
            bottom: 1px;
            content: '';
        }

        .switch--shadow+label:before {
            right: 1px;
            background-color: #f1f1f1;
            border-radius: 60px;
            transition: all 0.4s;
        }

        /* tamanho bolinha */
        .switch--shadow+label:after {
            width: 30px;
            background-color: #fff;
            border-radius: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            transition: all 0.4s;
        }

        .switch--shadow:checked+label:before {
            background-color: #8ce196;
        }

        /* tamano animação */
        .switch--shadow:checked+label:after {
            transform: translateX(37px);
        }
    </style>

</head>

<body class="app" onload="loadEventosDashboard()">
    <header class="app-header fixed-top">
        <div class="app-header-inner">
            <div class="container-fluid py-2">
                <div class="app-header-content">
                    <div class="row justify-content-between">

                        <div class="col-auto">
                            <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
                                    <title>Menu</title>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                                </svg>
                            </a>
                        </div><!--//col-->
                        <div class="app-search-box col">
                            <div class="display-f justify-bt align-c header-inicio content-header-list f-mont f-700 f-20">
                                <p>Listagem de produtos</p>
                                <a href="./form-produto.php" class="display-f align-c justify-c">
                                    Cadastrar produtos
                                </a>
                            </div>
                        </div><!--//app-search-box-->

                        <div class="app-utilities col-auto">

                            <div class="header-final principal">
                                <a href="../logout-login.php" class="display-f align-c justify-c">
                                    <span class="material-icons-round m-r">power_settings_new</span>
                                    Sair
                                </a>
                            </div>
                        </div><!--//app-utilities-->
                    </div><!--//row-->
                </div><!--//app-header-content-->
            </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel sidepanel-hidden">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <div class="sidepanel-inner d-flex flex-column">
                <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">×</a>
                <div class="app-branding">
                    <a class="app-logo" href="index.php">
                        <img class="logo-icon me-2" src="../images/logo.png" alt="Logo barbearia Duhel"></a>


                </div><!--//app-branding-->

                <div class="display-f justify-c">
                    <div class="circulo"></div>
                </div>

                <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">

                    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                        <div class="display-f justify-c">
                            <p class="f-mont f-700 f-18 color-white">Olá, Helinda!</p>
                        </div>
                        <div class="display-f justify-c">
                            <div class="linha"></div>
                        </div>
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link " href="index.php">
                                <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"></path>
                                        <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-text f-mont f-700 f-16">Overview</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link" href="docs.php">
                                <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z"></path>
                                        <path fill-rule="evenodd" d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-text f-mont f-700 f-16">Docs</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link" href="membros.php">
                                <span class="nav-icon">
                                    <img src="../img/members.svg" width="1em" height="1em" class="bi bi-question-circle" fill="currentColor" alt="">
                                </span>
                                <span class="nav-link-text f-mont f-700 f-16">Membros</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link " href="comunidade.php">
                                <span class="nav-icon">
                                    <img src="../img/members.svg" width="1em" height="1em" class="bi bi-question-circle" fill="currentColor" alt="">
                                </span>
                                <span class="nav-link-text f-mont f-700 f-16">Comunidade</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link" href="empresas.php">
                                <span class="nav-icon">
                                    <img src="../img/company.svg" width="1em" height="1em" class="bi bi-question-circle" fill="currentColor" alt="">
                                </span>
                                <span class="nav-link-text f-mont f-700 f-16">Empresas</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link active" href="eventos.php">
                                <span class="nav-icon">
                                    <img src="../img/members.svg" width="1em" height="1em" class="bi bi-question-circle" fill="currentColor" alt="">
                                </span>
                                <span class="nav-link-text f-mont f-700 f-16">Eventos</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->


                    </ul><!--//app-menu-->
                </nav><!--//app-nav-->

            </div><!--//sidepanel-inner-->
        </div><!--//app-sidepanel-->
    </header>

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <p>
                        <?php
                        foreach ($contaProduto as $linha) {
                            echo ("<label class='f-kanit f-900 f-20 m-b color-grey-ligth'> Existe: " . $linha['Quantidade'] . " produtos cadastrados</label>");
                        }
                        ?>
                    </p>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end">

                            <div class="col-auto">

                                <a id="cadastroMemb" class="btn app-btn-primary" href="./form-produto.php" class="display-f align-c justify-c">
                                    Cadastrar produtos
                                </a>

                            </div>
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->
            <div class="container-xl d-flex row" id="eventos">
                <div class="content-pagina " >
                    <div class="content-body ">




                        <!-- - - -| ESTRUTURA QUE PUXA AS INFORMAÇÕES DO BANCO ⬇️ | - - - -->
                        <?php
                        echo ("<div class='display-f align-c w-100 content-card-content justify-content-center'>");
                        foreach ($listaproduto as $linha) {
                            echo ("
                            <div class='card-pag animate_card'>
                                <img src=" . $linha['fotoProduto'] . ">
                                <div class='content-card'>
                                    <div class='t-center f-kanit f-900 f-20 upper m-b'>" . $linha['nomeProduto'] . "</div>
                                    <div class='t-center f-mont f-200 f-14'>
                                        <p>" . $linha['descProduto'] . "</p>
                                    </div>
    
                                    <div class='m-t'>
                                        <a href='excluir.php?excProduto=" . $linha['idProduto'] . "'> 
                                            <div class='f-kanit botao-excluir display-f justify-c align-c'>
                                                <span class='material-icons-round'>delete_forever</span>
                                                Excluir 
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class='card-pag animate_card'>
                                <img src=" . $linha['fotoProduto'] . ">
                                <div class='content-card'>
                                    <div class='t-center f-kanit f-900 f-20 upper m-b'>" . $linha['nomeProduto'] . "</div>
                                    <div class='t-center f-mont f-200 f-14'>
                                        <p>" . $linha['descProduto'] . "</p>
                                    </div>
    
                                    <div class='m-t'>
                                        <a href='excluir.php?excProduto=" . $linha['idProduto'] . "'> 
                                            <div class='f-kanit botao-excluir display-f justify-c align-c'>
                                                <span class='material-icons-round'>delete_forever</span>
                                                Excluir 
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class='card-pag animate_card'>
                                <img src=" . $linha['fotoProduto'] . ">
                                <div class='content-card'>
                                    <div class='t-center f-kanit f-900 f-20 upper m-b'>" . $linha['nomeProduto'] . "</div>
                                    <div class='t-center f-mont f-200 f-14'>
                                        <p>" . $linha['descProduto'] . "</p>
                                    </div>
    
                                    <div class='m-t'>
                                        <a href='excluir.php?excProduto=" . $linha['idProduto'] . "'> 
                                            <div class='f-kanit botao-excluir display-f justify-c align-c'>
                                                <span class='material-icons-round'>delete_forever</span>
                                                Excluir 
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        ");
                        }
                        echo ("</div>");
                        ?>
                    </div>
                </div>
            </div><!--//app-card-->


        </div><!--//container-fluid-->
    </div><!--//app-content-->

    <footer class=" app-footer">
        <div class="container text-center py-3">
            <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <!-- <i class="fas fa-heart" style="color: #fb866a;"></i>  -->
            <small class="copyright">©️ <a class="app-link" href="#" target="_blank">barbearia Duhel </a> </small>

        </div>
    </footer><!--//app-footer-->

    </div><!--//app-wrapper-->

    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./plugins/popper.min.js"></script>
    <script src="./plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Page Specific JS -->
    <script src="./js/app.js"></script>

</body>

</html>