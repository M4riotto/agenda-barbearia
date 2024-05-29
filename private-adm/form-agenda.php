<?php
// include_once("sentinela-adm.php");
require_once("../classes/Agenda.php");
require_once("../classes/Cliente.php");
require_once("../classes/Servico.php");

try {
    $cliente = new Cliente();
    $listacliente = $cliente->listar();

    $servico = new Servico();
    $listaservico = $servico->listar();

    // Lista os horários disponíveis
    $agenda = new Agenda();
    $dataSelecionada = $_POST['dataAgenda'] ?? null;
    $horariosDisponiveis = $dataSelecionada ? $agenda->listarHorariosDisponiveis($dataSelecionada) : [];
} catch (Exception $e) {
    echo $e->getMessage();
}
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
    <link rel="stylesheet" href="../css/private-agenda.css?v=<?php echo filemtime('../css/private-agenda.css'); ?>">
    <link rel="stylesheet" href="../css/portal.css?v=<?php echo filemtime('../css/portal.css'); ?>">
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

<body class="app">
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
                                <p>Agendamento</p>
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
                            <a class="nav-link active " href="info-produto.php">
                                <span class="nav-icon">
                                    <span class="material-icons-round m-r">monetization_on</span>
                                </span>
                                <span class="nav-link-text f-mont f-700 f-16">Produtos</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link " href="info-cliente.php">
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
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->
            <div class="container-xl d-flex row" id="eventos">
                <div class="content-pagina ">

                    <div class="content-body ">

                        <!-- - - -| FORMULÁRIO DE CADASTRO ✎ | - - - -->
                        <main class="display-f align-c justify-c">
                            <div class="bg-form ">
                                <div class="content-body">
                                    <div class="display-f align-c justify-c content-form">
                                        <div class="card">
                                            <div class="label-titulo">
                                                <label class="display-f align-c justify-c f-mont f-900 f-36 color-label">
                                                    <span class="material-icons-round m-r color-blue">event_available</span>
                                                    Agendamento
                                                </label>
                                            </div>

                                            <form method="post" action="cadastrar-agenda.php">
                                                <label class="f-mont f-500 f-18">Data</label>
                                                <input class="f-mont f-500 f-14 input" type="date" name="dataAgenda" id="dataAgenda">
                                                <br><br>
                                                
                                                <label class="f-mont f-500 f-18">Hora</label>
                                                <select class="f-mont f-500 f-14 input" name="horaAgenda" id="horaAgenda">
                                                    <option value="">Selecione uma data para ver os horários disponíveis</option>
                                                </select>
                                                <br><br>

                                                <select class="f-mont f-500 f-14 input" name="servicoAgenda">
                                                    <option value="0" selected>-Selecione um serviço-</option>
                                                    <?php foreach ($listaservico as $linhas) { ?>
                                                        <option value="<?= $linhas['idServico'] ?>"><?= $linhas['nomeServico'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <br><br>

                                                <select class="f-mont f-500 f-14 input" name="clienteAgenda">
                                                    <option value="0" selected>-Selecione um cliente-</option>
                                                    <?php foreach ($listacliente as $linhas) { ?>
                                                        <option value="<?= $linhas['idCliente'] ?>"><?= $linhas['nomeCliente'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <br><br>

                                                <select class="f-mont f-500 f-14 input" name="userAgenda" id="userAgenda">
                                                    <option value="0" selected>-Selecione o profissional-</option>
                                                    <option value="2">Vitor Moreira</option>
                                                </select>
                                                <br><br>

                                                <input class="button f-mont f-700 f-18" type="submit" value="Agendar">
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

    <script>
        document.getElementById('dataAgenda').addEventListener('change', function() {
            var data = this.value;

            fetch('../classes/listar_horarios_disponiveis.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'data=' + data,
                })
                .then(response => response.json())
                .then(data => {
                    var horaSelect = document.getElementById('horaAgenda');
                    horaSelect.innerHTML = '';

                    if (data.length) {
                        data.forEach(function(hora) {
                            var option = document.createElement('option');
                            option.value = hora;
                            option.textContent = hora;
                            horaSelect.appendChild(option);
                        });
                    } else {
                        var option = document.createElement('option');
                        option.value = '';
                        option.textContent = 'Nenhum horário disponível';
                        horaSelect.appendChild(option);
                    }
                })
                .catch(error => console.error('Erro:', error));
        });

        function updateAvailableTimes(date) {
            fetch('listar_horarios.php?data=' + date)
                .then(response => response.json())
                .then(data => {
                    const horaSelect = document.getElementById('horaAgenda');
                    horaSelect.innerHTML = '<option value="" selected>-Selecione um horário-</option>';
                    data.forEach(hora => {
                        const option = document.createElement('option');
                        option.value = hora;
                        option.textContent = hora;
                        horaSelect.appendChild(option);
                    });
                });
        }
    </script>

</body>

</html>