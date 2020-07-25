<?php

class Musica{
    private $codigo;
    private $nome;
    private $interprete;
    private $referencia;
    private $tipo;
    private $afinidade;

    public function setCodigo($Codigo){
        $this->codigo = $Codigo;
    }
    public function getCodgio(){
        return  $this->codigo;
    }
    public function setNome($Nome){
        $this->nome = $Nome;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setInterprete($Interprete){
        $this->interprete = $Interprete;
    }
    public function getInterprete(){
        return $this->interprete;
    }
    public function setReferencia($Referencia){
        $this->referencia = $Referencia;
    }
    public function getReferencia(){
        return $this->referencia;
    }
    public function setTipo($Tipo){
        $this->tipo = $Tipo;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function setAfinidade($Afinidade){
        $this->afinidade = $Afinidade;
    }
    public function getAfinidade(){
        return $this->afinidade;
    }

    public function lastId(){
        include '/../database/conn_database.php';
        $stmt = $conn->prepare("SELECT COALESCE(MAX(cd_musica), 0) + 1 FROM tb_musica");
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
    public function cadMusica(){
        include '/../database/conn_database.php';
        $conn->query("INSERT INTO tb_musica(cd_musica, nm_musica, nm_interprete_principal, ds_referencia, cd_grau_afinidade, sg_tipo_musica, cd_usuario) VALUES ('$this->codigo', '$this->nome', '$this->interprete', '$this->referencia', (SELECT cd_grau_afinidade FROM tb_grau_afinidade WHERE sg_grau_afinidade = '$this->afinidade'), '$this->tipo', '1')");
    }


    
}