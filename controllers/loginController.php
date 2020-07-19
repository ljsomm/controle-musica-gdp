<?php
include '/../class/classUser.php';
$u = new Usuario($_POST["txtLogin"], $_POST["txtSenha"]);
if($u->login() == 1){
    header("Location: ../principal.php");
}
else{
    session_start();
    header("Location: ../index.php");
    $_SESSION["errLogin"] = "Login inválido!";
}
