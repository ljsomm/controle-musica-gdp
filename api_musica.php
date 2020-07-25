<?php
include 'class/classMusica.php';
$musica = new Musica();
echo json_encode($musica->retTodasMusicas());