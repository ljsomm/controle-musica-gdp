<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/logos/Logo sem fundo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/requests.js"></script>
    <script src="js/main.js"></script>
    <title>Início - Controle de Músicas</title>
</head>
<body>
    <nav id="navLogin"><img src="assets/logos/Logo sem fundo.png" id="logo">
        <h1>Controle de Músicas</h1>
    </nav>
    <div id="flexbox">
        <div id="Centraliza" class="login">
            <div id="cxLogin">
                <h1>Login</h1>
                <form action="controllers/loginController.php" method="post">
                    <label><img src="assets/icons/user.png" id="ico"> Username</label>
                    <br>
                    <input maxlength="20" type="text" name="txtLogin" id="txtLogin" placeholder="Insira aqui">
                    <br>
                    <label><img src="assets/icons/senha.png" id="ico"> Senha</label>
                    <br>
                    <input maxlength="75" type="password" name="txtSenha" id="txtSenha" placeholder="Insira aqui">
                    <br>
                    <input type="submit" onclick="return loginUsuario()" value="Entrar" id="botao" class="envio">
                </form>
                <button onClick="abreCadastro()" id="botao" class="segundo">Cadastro</button>
                <p id="erro"></p>
            </div>
        </div>
        <div id="Centraliza" class="cadastro">
           <div id="cxCadastro">
            <h1>Cadastro</h1>
                <label><img src="assets/icons/user.png" id="ico"> Nome</label>
                <br>
                <input type="text" name="txtNome" id="txtNome" maxlength="255" placeholder="Insira aqui">
                <br>
                <label><img src="assets/icons/user.png" id="ico"> Crie um Username</label>
                <br>
                <input type="text" name="txtUser" id="txtUser" maxlength="20" placeholder="Insira aqui">
                <br>
                <label><img src="assets/icons/senha.png" id="ico"> Crie uma Senha</label>
                <br>
                <input type="password" name="txtSenhaCad" id="txtSenhaCad" maxlength="75" placeholder="Insira aqui">
                <br>
                <label><img src="assets/icons/senha.png" id="ico"> Confirme sua Senha</label>
                <br>
                <input type="password" name="txtConfirmSenha" id="txtConfirmSenha" maxlength="75" placeholder="Insira aqui">
                <br>
                <label>Canta na banda?</label><input type="radio" name="bool" id="sim"><label for="sim" id="lblSim">Sim</label><input type="radio" name="bool" id="nao"><label for="nao" id="lblNao">Não</label>
                <br>
                <div id="checkbox"></div>
                <label>Instrumentos que toca (na banda)</label>
                <br>
                <p id="Instrumento"></p>
                <button id="adc"><img src='assets/icons/mais.png' id='ico' class='add'>Adicionar outro</button>
                <button id="rmv"><img src='assets/icons/apagador.png' id='ico' class='add'>Remover último</button>
                <br>
                <p id="msg"></p>
                <button id="botao" class="btnCadastro">Cadastre-se</button>
                <br>
           </div>
        </div>
    </div>
    <?php
    session_start();
    if(isset($_SESSION["user"]) && isset($_SESSION["pass"])){
        header("Location: principal.php");
    }
    else{
        if(isset($_SESSION["errLogin"])){
            echo "<script>
            document.getElementById('erro').innerHTML = '".$_SESSION["errLogin"]. "';
            document.getElementById('erro').style = 'color: red; border: 1.5px solid red; padding:5px;';
            </script>";
            unset($_SESSION["errLogin"]);
        }
    }
    ?>
</body>

</html>