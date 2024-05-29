<?php
require_once("Conexao.php");
require_once("Agenda.php");

$data = $_POST['data'] ?? null;

if ($data) {
    $agenda = new Agenda();
    $horariosDisponiveis = $agenda->listarHorariosDisponiveis($data);
    echo json_encode($horariosDisponiveis);
}
?>
