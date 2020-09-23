<?php
include "class/classMusica.php";
$m = new Musica();
$m->setCodigo($_POST["cd_musica"]);
echo json_encode($m->delMusica());
