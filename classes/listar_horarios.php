<?php
require_once("Conexao.php");
require_once("Agenda.php");

if (isset($_GET['data'])) {
    $dataAgenda = $_GET['data'];

    $agenda = new Agenda();
    $horariosDisponiveis = $agenda->listarHorariosDisponiveis($dataAgenda);

    echo json_encode($horariosDisponiveis);
}
?>
