<?php
class Posicao{
    private $musico;
    private $instrumento;

    public function setMusico($Musico){
        $this->musico = $Musico;
    }
    public function getMusico(){
        return $this->musico;
    }
    public function setInstrumento($Inst){
        $this->instrumento = $Inst;
    }
    public function getInstrumento(){
        return  $this->instrumento;
    }
    public function cadPosicao(){
        include __DIR__.'/../database/conn_database.php';
        $stmt = $conn->prepare("SELECT COALESCE(MAX(cd_posicao), 0) + 1 FROM tb_posicao");
        $stmt->execute();
        $id = $stmt->fetchColumn();
        $m = $this->getMusico();
        $i = $this->getInstrumento();
        $stmt = $conn->prepare("INSERT INTO tb_posicao (cd_posicao, cd_musico, cd_instrumento) VALUES('$id', '$m', '$i')");
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}