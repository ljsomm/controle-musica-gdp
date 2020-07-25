<?php
include 'class/classMusica.php';
$musica = new Musica();
$musica->setCodigo($musica->lastId());
$musica->setNome($_POST["musica"]);
$musica->setInterprete($_POST["interp"]);
$musica->setAfinidade($_POST["grauAf"]);
$musica->setTipo($_POST["cvaut"]);
$musica->setReferencia($_POST["ref"]);
$musica->cadMusica();


