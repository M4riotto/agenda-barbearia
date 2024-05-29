<?php
require_once("../classes/Conexao.php");
require_once("../classes/Agenda.php");
require_once("../classes/Cliente.php");
require_once("../classes/Servico.php");

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Valide e sane os dados recebidos do formulário
    $dataAgenda = filter_input(INPUT_POST, 'dataAgenda', FILTER_SANITIZE_STRING);
    $horaAgenda = filter_input(INPUT_POST, 'horaAgenda', FILTER_SANITIZE_STRING);
    $clienteAgenda = filter_input(INPUT_POST, 'clienteAgenda', FILTER_VALIDATE_INT);
    $servicoAgenda = filter_input(INPUT_POST, 'servicoAgenda', FILTER_VALIDATE_INT);

    // Verifique se todos os campos obrigatórios foram preenchidos
    if ($dataAgenda && $horaAgenda && $clienteAgenda && $servicoAgenda) {
        // Crie uma nova instância de Agenda e configure os valores
        $agenda = new Agenda();
        $agenda->setDataAgenda($dataAgenda);
        $agenda->setHoraAgenda($horaAgenda);

        // Crie uma nova instância de Cliente e configure o ID
        $cliente = new Cliente();
        $cliente->setIdCliente($clienteAgenda);

        // Crie uma nova instância de Servico e configure o ID
        $servico = new Servico();
        $servico->setIdServico($servicoAgenda);

        // Associe o cliente e o serviço à agenda
        $agenda->setServico($servico);
        $agenda->setCliente($cliente);

        // Tente cadastrar a agenda
        try {
            $agenda->cadastrar($agenda);
            // Redirecione o usuário de volta para o formulário após o cadastro
            header("Location: form-agenda.php?status=success");
            exit();
        } catch (Exception $e) {
            // Em caso de erro, redirecione com uma mensagem de erro
            header("Location: form-agenda.php?status=error&message=" . urlencode($e->getMessage()));
            exit();
        }
    } else {
        // Redirecione se os dados forem inválidos
        header("Location: form-agenda.php?status=error&message=" . urlencode("Preencha todos os campos obrigatórios."));
        exit();
    }
} else {
    // Redirecione se o acesso ao script for feito sem enviar o formulário
    header("Location: form-agenda.php?status=error&message=" . urlencode("Método de requisição inválido."));
    exit();
}
?>
