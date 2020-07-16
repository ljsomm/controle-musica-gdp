<?php
class Musico{
    private $codigo;
    private $nome;

    public function __construct($Nome){
        $this->nome = $Nome;
    }
    public function setNome($Nome){
        $this->nome = $Nome;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setCodigo($Codigo){
        $this->codigo = $Codigo;
    }
    public function getCodigo(){
        return $this->codigo;
    }
    public function novoCod(){
        include '/../database/conn_database.php';
        $id = $conn->prepare("SELECT COALESCE(MAX(cd_musico), 0) + 1 FROM tb_musico");
        $id->execute();
        $id = $id->fetchColumn();
        return $id;
    }
    public function cadMusico(){
        include '/../database/conn_database.php';
        $id = $this->novoCod();
        $this->setCodigo($id);
        $id = $this->getCodigo();
        $nm_musico = $this->getNome();
        $r = $conn->prepare("INSERT INTO tb_musico(cd_musico, nm_musico) VALUES ('$id','$nm_musico')");
        if($r->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}