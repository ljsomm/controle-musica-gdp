<?php
//CONEXÃO COM BANCO DE DADOS VIA PDO
$db_user="root";
$db_pass="usbw";
try{
    $conn = new PDO("mysql:host=localhost;port=3307;dbname=db_controle_musica;charset=utf8", $db_user, $db_pass);
}
catch (Exception $ex){
    echo "Não foi possível conectar com banco de dados. Relatório: <br>" . $ex;
}