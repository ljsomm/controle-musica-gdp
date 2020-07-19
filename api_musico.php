<?php
include 'class/classMusico.php';
$m = new Musico();
$a = $m->retornaMusico();
echo json_encode($a);