<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logos/Logo sem fundo.png">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/main.js"></script>
    <title>Tela Principal</title>
</head>
<body>
    <div id="navMain">
        <img src="assets/logos/Logo sem fundo.png" id="logo">
        <img src="assets/icons/hamb.png" id="config" onClick="abriMenu()">
        <nav id="navM" class="navMenu">
            <ul id="menuMain">
                <li class="banda"><img src="assets/icons/equipe.png" id="menuIco">Membros da Banda</li>
                <li><img src="assets/icons/settings.png" id="menuIco">Configurações</li>
                <li class="logout"><img src="assets/icons/logout.png" id="menuIco">Logout</li>
            </ul>
        </nav>
    </div>
    <div id="modalEx" class="membrosBanda">
        <div id="modalIn" class="membrosBanda">
            <div id="cabecalhoModal">
                <div id="tituloModal">
                    <img id="icoModal" src="assets/icons/equipe.png">
                    <h1>Membros da Banda</h1>
                </div>
                <img id="fecharModal" src="assets/icons/fecharModal.png">
            </div>
            <div id="corpoBanda" class="corpoModal">
                <div id="perfil">
                    <img src="assets/profile/sem-foto.png" id="profile-pic">
                    <div class="dadoProfile">
                        <label>Nome:</label><span>Lucas Juan Souza</span>
                        <br>
                        <label>Posição:</label><span></span>
                    </div>
                </div>
                <div id="perfil">
                    <img src="assets/profile/sem-foto.png" id="profile-pic">
                    <div class="dadoProfile">
                        <label>Nome:</label><span>Grande</span>
                        <br>
                        <label>Posição:</label><span></span>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <?php
        session_start();
        if(!(isset($_SESSION["user"])) || !(isset($_SESSION["pass"]))){
            header("Location: index.php");
        }
    ?>
</body>
</html>