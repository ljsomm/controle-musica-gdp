<?php
include 'class/classInstrumento.php';
$inst = new Instrumento();
$response = $inst->retornaNomes();
echo json_encode($response, JSON_UNESCAPED_UNICODE);
