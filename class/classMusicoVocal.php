<?php

class MusicoVocal{
    private $musico;
    private $vocal;

    public function setMusico($Musico){
        $this->musico = $Musico;
    }
    public function getMusico(){
       return $this->musico;
    }
    public function setVocal($Vocal){
        $this->vocal = $Vocal;
    }
    public function getVocal(){
        return $this->vocal;
    }
    public function cadVocal(){
        include '/../database/conn_database.php';
        $m = $this->getMusico();
        $v = $this->getVocal();
        $stmt = $conn->prepare("INSERT INTO tb_musico_vocal(cd_musico, cd_tipo_vocal) VALUES ('$m', '$v')");
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

}