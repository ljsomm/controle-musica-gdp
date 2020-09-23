<?php
class Usuario{
    private $nome;
    private $user;
    private $senha;

    public function __construct(){
        $p = func_get_args();
        $q = func_num_args();
        switch($q){
            case 2:
                $this->__construct2($p[0], $p[1]);
                break;
            case 3:
                $this->__construct3($p[0], $p[1], $p[2]);
                break;
            default:
                echo "Essa classe só pode ser convocada com 2 ou 3 parametros!"; 
                break;
        }
    }
    public function __construct2($User, $Senha){
        if(strlen($User)>=6 && strlen($User)<=20 && strlen($Senha)>=6 && strlen($Senha)<=75){
            $this->user = $User;
            $this->senha = $Senha;
        }
        else{
            echo "Erro!";
        }
    }
    public function __construct3($Nome, $User, $Senha){
        if(strlen($User)>=6 && strlen($User)<=20 && strlen($Senha)>=6 && strlen($Senha)<=75){
            $this->nome = $Nome;
            $this->user = $User;
            $this->senha = $Senha;
        }
        else{
            echo "Erro!";
        }
    }
    
    public function setNome($Nome){
        $this->nome = $Nome;
    }
    public function getNome(){
       return $this->nome;
    }
    public function setUser($User){
        if(strlen($User)>=6 && strlen($User)<=20){
            $this->user = $User;
        }
    }
    public function getUser(){
       return $this->user;
    }
    public function setSenha($Senha){
        if(strlen($Senha)>=6 && strlen($Senha)<=75){
            $this->senha = $Senha;
        }
    }
    public function getSenha(){
       return $this->senha;
    }
    public function cadUser(){
        if(isset($this->nome) && isset($this->user) && isset($this->senha)){
            include __DIR__.'/../database/conn_database.php';
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
        include __DIR__.'/../database/conn_database.php';
        $login = $this->getUser();
        $password = $this->getSenha();
        $stmt = $conn->prepare("SELECT count(*) FROM tb_usuario WHERE nm_login=:lg and cd_senha=:ps");
        $stmt->bindValue(":lg", $login);
        $stmt->bindValue(":ps", $password);
        $stmt->execute();
        $v = $stmt->fetchColumn();
        if($v == 1){
            session_start();
            $_SESSION["user"] = $login;
            $_SESSION["pass"] = $password;
            return true;
        }
        else{
            return false;
        }
    }
}