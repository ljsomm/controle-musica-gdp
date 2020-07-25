<?php

class grauAfinidade{
    private $sg_grau;
    public function setSg($Sg){
        $this->sg_grau = $Sg;
    }
    public function getSg(){
        return $this->sg_grau;
    }
    public function retAfinidade(){
        include '/../database/conn_database.php';
        $stmt = $conn->prepare("SELECT cd_grau_afinidade as codigo, sg_grau_afinidade as sigla, nm_grau_afinidade as nome, ds_grau_afinidade as dsc FROM tb_grau_afinidade");
        $stmt->execute();
        $afinidades = false;
        for ($i=0; $s = $stmt->fetch(PDO::FETCH_ASSOC) ; $i++) { 
            $afinidades[$i] = $s;
        }
        return $afinidades;
    }
}