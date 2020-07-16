<?php
include 'class/classUser.php';
include 'class/classMusico.php';
include 'class/classPosicao.php';
if(!(isset($_POST["nm_usuario"]) && isset($_POST["cd_senha"]) && isset($_POST["nm_login"]))){
    echo "ERRO, NÃO É POSSÍVEL EFETUAR PROCEDIMENTOS DE CRUD SEM DETERMINADOS PARAMETROS!";
}
else{
    $nm = $_POST["nm_usuario"];
    $us = $_POST["nm_login"];
    $pw = $_POST["cd_senha"];
    $ins = $_POST["instrumentos"];
    $user = new Usuario($nm, $us, $pw);
    $musico = new Musico($nm);
    $pos = new Posicao();
    $r_ins = true;
    $r_mus = $musico->cadMusico();
    $m = $musico->getCodigo();
    for ($i=0; $i < count($ins) ; $i++) { 
        $pos->setMusico($m);
        $pos->setInstrumento($ins[$i]);
        if($pos->cadPosicao() == false){
            $r_ins = false;
        }
    }
    echo json_encode(array("return_user"=>$user->cadUser(), "return_musico"=>$r_mus, "return_posicao"=> $r_ins));
}
?>