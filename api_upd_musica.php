<?php
include 'class/classMusica.php';
$m = new Musica();
$m->setCodigo($_POST["codi"]);
$m->setNome($_POST["nome"]);
$m->setInterprete($_POST["inte"]);
$m->setReferencia($_POST["obse"]);
$m->setAfinidade($_POST["afin"]);
echo json_encode($m->alterMusica());