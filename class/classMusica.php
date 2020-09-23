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
    public function getCodigo(){
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
        include __DIR__.'/../database/conn_database.php';
        $stmt = $conn->prepare("SELECT COALESCE(MAX(cd_musica), 0) + 1 FROM tb_musica");
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
    public function cadMusica(){
        include __DIR__.'/../database/conn_database.php';
        $stmt = $conn->prepare("INSERT INTO tb_musica(cd_musica, nm_musica, nm_interprete_principal, ds_referencia, cd_grau_afinidade, sg_tipo_musica, cd_usuario) VALUES ('$this->codigo', '$this->nome', '$this->interprete', '$this->referencia', (SELECT cd_grau_afinidade FROM tb_grau_afinidade WHERE sg_grau_afinidade = '$this->afinidade'), '$this->tipo', '1')");
        if($stmt->execute()){
            return array("res"=> true, "msg"=> "Música cadastrada com sucesso!");
        }
        else{
            return array("res"=> false, "msg"=> "Houve um erro ao cadastrar esta música, tente novamente!");
        }
    }

    public function retTodasMusicas(){
        include __DIR__.'/../database/conn_database.php';
        $stmt = $conn->prepare("SELECT cd_musica as codigo, nm_musica as nome, nm_interprete_principal as musico, g.sg_grau_afinidade as nota, g.nm_grau_afinidade as grau, m.ds_referencia as obs FROM tb_musica as m JOIN tb_grau_afinidade as g ON m.cd_grau_afinidade=g.cd_grau_afinidade ORDER BY codigo");
        $stmt->execute();
        $allMusic;
        for($i = 0; $s = $stmt->fetch(PDO::FETCH_ASSOC) ; $i++){
            $allMusic[$i] = $s;
        }
        return $allMusic;
    }

    public function delMusica(){
        include __DIR__.'/../database/conn_database.php';
        $stmt = $conn->prepare("DELETE FROM tb_musica WHERE cd_musica = :id");
        $stmt->bindValue(":id", $this->getCodigo());
        if($stmt->execute()){
            return array("res"=> true, "msg"=> "Exclusão efetuada com sucesso!");
        }
        else{
            return array("res"=> false, "msg"=> "Houve um erro ao tentar excluir esta música, tente novamente!");
        }
    }

    public function alterMusica(){
        include __DIR__.'/../database/conn_database.php';
        $stmt = $conn->prepare("UPDATE tb_musica SET nm_musica = :nome, nm_interprete_principal = :interprete, ds_referencia=:obs, cd_grau_afinidade = (SELECT cd_grau_afinidade FROM tb_grau_afinidade WHERE sg_grau_afinidade = '$this->afinidade') WHERE cd_musica = :codigo");
        $stmt->bindValue(":codigo", $this->codigo);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":interprete", $this->interprete);
        $stmt->bindValue(":obs", $this->referencia);
        if($stmt->execute()){
            return array("res"=> true, "msg"=>"Alteração efetuada com sucesso!");
        }
        else{
            return array("res"=> false, "msg"=> "Houve um erro ao tentar alterar esta música, tente novamente!");
        } 
    }
    
}