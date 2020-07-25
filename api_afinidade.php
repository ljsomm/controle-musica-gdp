<?php
include 'class/classGrauAfinidade.php';
$afinidade = new grauAfinidade();
$af = $afinidade->retAfinidade();
echo json_encode($af);
