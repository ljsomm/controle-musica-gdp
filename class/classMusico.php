<?php
class Musico{
    private $codigo;
    private $nome;

    public function __construct(){
        $p = func_get_args();
        $q = func_num_args();
        switch($q){
            case 0:
                $this->__construct1();
                break;
            case 1:
                $this->__construct2($p[0]);
                break;
            default:
                echo 'erro';
                break;
        }
    }
    public function __construct1(){
    }
    public function __construct2($Nome){
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
        include __DIR__.'/../database/conn_database.php';
        $id = $conn->prepare("SELECT COALESCE(MAX(cd_musico), 0) + 1 FROM tb_musico");
        $id->execute();
        $id = $id->fetchColumn();
        return $id;
    }
    public function cadMusico(){
        include __DIR__.'/../database/conn_database.php';
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
    public function retornaMusico(){
        include __DIR__.'/../database/conn_database.php';
        $stmt = $conn->prepare("SELECT nm_musico FROM tb_musico");
        $stmt->execute();
        $r;
        for($i = 0; $s = $stmt->fetchColumn(); $i++){
            $r[$i] = $s;
        }
        return $r;
    }
}