<?php
class Instrumento{
    private $codigo;
    private $nome;

    public function setCodigo($Cod){
        $this->codigo = $Cod;
    }
    public function getCodigo(){
        return $this->codigo;
    }
    public function setNome($Nome){
        $this->nome = $Nome;
    }
    public function getNome(){
        return $this->nome;
    }
    public function retornaNomes(){
        include '/../database/conn_database.php';
        $select = $conn->prepare("SELECT cd_instrumento, nm_instrumento FROM tb_instrumento");
        $select->execute();
        $ins;
        for ($i=0; $s = $select->fetch(PDO::FETCH_ASSOC); $i++) { 
            $ins[$i] = $s;
        }
        return $ins;
    }
}