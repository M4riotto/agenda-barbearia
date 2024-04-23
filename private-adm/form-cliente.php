<?php
include_once("sentinela-adm.php");

?>
<!DOCTYPE html>
<html lang="pt-BR">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- - - - - - - - -| CSS | - - - - - - - - -->

    <link rel="stylesheet" href="../css/style.css?v=<?php echo filemtime('../css/style.css'); ?>">
    <link rel="stylesheet" href="../css/global.css?v=<?php echo filemtime('../css/global.css'); ?>">
    <link rel="stylesheet" href="../css/private.css?v=<?php echo filemtime('../css/private.css'); ?>">
    <link rel="stylesheet" href="../css/private-produtos.css?v=<?php echo filemtime('../css/private-produtos.css'); ?>">
    <link rel="stylesheet" href="../css/portal.css?v=<?php echo filemtime('../css/portal.css'); ?>">


    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/private.css">
    <link rel="stylesheet" href="../css/portal.css">
    <link rel="stylesheet" href="../css/private-produtos.css">
    <!-- - - - - - - - -| FONTE | - - - - - - - - -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;700;900&family=Montserrat:wght@300;400:500&display=swap" rel="stylesheet">
    <!-- - - - - - - - -| ANIMAÇÃO | - - - - - - - - -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- - - - - - - - -| ÍCONE | - - - - - - - - -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- - - - - - - - -| ÍCONE | - - - - - - - - -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <!-- - - - - - - - -| TÍTULO & ÍCONE HEAD | - - - - - - - - -->
    <title>Cadastro Produto | Duhel</title>
    <link rel="icon" type="image/x-icon" href="../images/icon.png">
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
                            <a class="nav-link  " href="info-produto.php">
                                <span class="nav-icon">
                                    <span class="material-icons-round m-r">monetization_on</span>
                                </span>
                                <span class="nav-link-text f-mont f-700 f-16">Produtos</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link active" href="info-cliente.php">
                                <span class="nav-icon">
                                    <span class="material-icons-round m-r">account_circle</span>

                                </span>
                                <span class="nav-link-text f-mont f-700 f-16">Clientes</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link " href="info-servico.php">
                                <span class="nav-icon">
                                    <span class="material-icons-round m-r">content_cut</span>

                                </span>
                                <span class="nav-link-text f-mont f-700 f-16">Serviços</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link  " href="info-agenda.php">
                                <span class="nav-icon">
                                    <span class="material-icons-round m-r">event_available</span>

                                </span>
                                <span class="nav-link-text f-mont f-700 f-16">Agendamento</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link" href="info-fale-conosco.php">
                                <span class="nav-icon">
                                    <span class="material-icons m-r">contact_mail</span>

                                </span>
                                <span class="nav-link-text f-mont f-700 f-16">Mensagens</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->

                    </ul><!--//app-menu-->
                </nav><!--//app-nav-->

            </div><!--//sidepanel-inner-->
        </div><!--//app-sidepanel-->
    </header>

    <div class="anima"></div>
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end">

                            <div class="col-auto">

                                <a id="cadastroMemb" class="btn app-btn-primary" href="./form-agenda.php" class="display-f align-c justify-c">
                                    Agendar
                                </a>

                            </div>
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->
            <div class="container-xl d-flex row" id="eventos">
                <div class="content-pagina ">

                    <div class="content-body ">

                        <!-- - - -| FORMULÁRIO DE CADASTRO ✎ | - - - -->
                        <!-- - - -| FORMULÁRIO DE CADASTRO ✎ | - - - -->
                        <main class="display-f align-c justify-c">
                            <div class="bg-form ">
                                <div class="content-body">
                                    <div class="display-f align-c justify-c content-form">
                                        <div class="card">
                                            <div class="label-titulo">
                                                <label class="display-f align-c justify-c f-mont f-900 f-36 color-label">
                                                    <span class="material-icons-round m-r f-36 color-blue">account_circle</span>
                                                    Cadastro cliente
                                                </label>
                                            </div>
                                            <form method="post" action="cadastrar-cliente.php">
                                                <label class="f-mont f-500 f-18">Nome</label>
                                                <input class="f-mont f-500 f-14 input" required type="text" id="nomeCliente" name="nomeCliente" placeholder="Digite o nome do cliente">
                                                <br> <br>
                                                <label class="f-mont f-500 f-18">CPF</label>
                                                <input onkeydown="javascript: fMasc( this, mCPF );" maxlength="14" required class="f-mont f-500 f-14 input" type="text" id="cpfCliente" name="cpfCliente" placeholder="Digite o cpf do cliente">
                                                <br> <br>
                                                <label class="f-mont f-500 f-18">Celular</label>
                                                <input onkeydown="javascript: fMasc( this, mTel );" maxlength="14" class="f-mont f-500 f-14 input" type="text" id="celularCliente" required name="celularCliente" placeholder="Digite o celular do cliente">
                                                <br> <br>
                                                <input onclick="abrirAlerta()" class="button f-mont f-700 f-18" type="submit" value="Enviar">
                                                <input class="button2 f-mont f-700 f-18" type="reset" value="Limpar">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
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
    <script src="../js/script.js"></script>

</body>

</html>