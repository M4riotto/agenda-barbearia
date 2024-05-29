<?php
require_once("../classes/Conexao.php");
require_once("../classes/Agenda.php");
require_once("../classes/Cliente.php");
require_once("../classes/Servico.php");

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Valide e sane os dados recebidos do formulário
    $dataAgenda = filter_input(INPUT_POST, 'dataAgenda', FILTER_SANITIZE_STRING);
    $horaInicio = filter_input(INPUT_POST, 'horaInicio', FILTER_SANITIZE_STRING);
    $horaTermino = filter_input(INPUT_POST, 'horaTermino', FILTER_SANITIZE_STRING);
    $frequencia = filter_input(INPUT_POST, 'frequencia', FILTER_VALIDATE_INT);

    // Verifique se todos os campos obrigatórios foram preenchidos
    if ($dataAgenda && $horaInicio && $horaTermino && $frequencia) {
        // Converta as horas para objetos DateTime para facilitar o cálculo
        $inicio = new DateTime($horaInicio);
        $termino = new DateTime($horaTermino);

        // Gere os horários entre o intervalo especificado
        $interval = new DateInterval('PT' . $frequencia . 'M');
        $period = new DatePeriod($inicio, $interval, $termino);

        // Tente cadastrar cada horário gerado
        try {
            foreach ($period as $hora) {
                $agenda = new Agenda();
                $agenda->setDataAgenda($dataAgenda);
                $agenda->setHoraAgenda($hora->format('H:i:s'));
                $agenda->cadastrarHorario($agenda);
            }

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
