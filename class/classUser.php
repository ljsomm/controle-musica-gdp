<?php
class Usuario{
    private $nome;
    private $user;
    private $senha;

    public function __construct($Nome, $User, $Senha){
        $this->nome = $Nome;
        $this->user = $User;
        $this->senha = $Senha;
    }
    public function setNome($Nome){
        $this->nome = $Nome;
    }
    public function getNome(){
       return $this->nome;
    }
    public function setUser($User){
        $this->user = $User;
    }
    public function getUser(){
       return $this->user;
    }
    public function setSenha($Senha){
        $this->senha = $Senha;
    }
    public function getSenha(){
       return $this->senha;
    }
    public function cadUser(){
        if(isset($this->nome) && isset($this->user) && isset($this->senha)){
            include '/../database/conn_database.php';
            $v = $conn->prepare("SELECT count(nm_login) FROM tb_usuario WHERE nm_login = '$this->user'");
            $v->execute();
            $v = $v->fetchColumn();
            if($v > 0){
                return 1;
            }   
            else{
                $sel = $conn->prepare("SELECT COALESCE(MAX(cd_usuario), 0)+1 FROM tb_usuario");
                $sel->execute();
                $id = $sel->fetchColumn();
                $stmt = $conn->prepare("INSERT INTO tb_usuario(cd_usuario, nm_usuario, nm_login, cd_senha) VALUES ('$id', '$this->nome', '$this->user', '$this->senha')");
                if($stmt->execute()){
                    return true;
                }   
                else{
                    return false;
                }
            }
        }
        else{
            return 0;
        }
    }
    public function login(){
        //codigo
    }
}