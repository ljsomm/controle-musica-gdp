<?php
    session_start();
    if(!(isset($_SESSION["user"])) || !(isset($_SESSION["pass"]))){
        header("Location: index.php");
    }
?>
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
    <script src="js/modal_requests.js"></script>
    <title>Tela Principal</title>
</head>

<body>
    <div id="navMain">
        <img src="assets/logos/Logo sem fundo.png" id="logo">
        <img src="assets/icons/hamb.png" id="config" onClick="abriMenu()">
        <nav id="navM" class="navMenu">
            <ul id="menuMain">
                <li id="banda" class="listMain"><img src="assets/icons/equipe.png" id="menuIco">Membros da Banda</li>
                <li id="configPerfilConta" class="listMain"><img  src="assets/icons/settings.png" id="menuIco">Configurações</li>
                <li id="logout" class="listMain"><img src="assets/icons/logout.png" id="menuIco">Logout</li>
            </ul>
        </nav>
    </div>
    <div class="rodapePainel">
        <div class="crudMusica">
            <button id="addM" class="btnPainel"><img class="icoBtnPainel" src="assets/icons/mais (1).png"></button>
        </div>
    </div>
    <div id="modalEx" class="membrosBanda">
        <div id="modalIn" class="membros">
            <div class="cabecalhoModal">
                <div class="tituloModal">
                    <img class="icoModal" src="assets/icons/equipe.png">
                    <h1>Membros da Banda</h1>
                </div>
                <img id="fechaMembro" class="fecharModal" src="assets/icons/fecharModal.png">
            </div>
            <div id="corpoBanda" class="corpoModal">
            </div>
        </div>
    </div>
    <div id="modalEx" class="ConfigUser">
        <div id="modalIn" class="userConfig">
            <div class="cabecalhoModal">
                <div id="tituloConfig" class="tituloModal">
                    <img class="icoModal" src="assets/icons/settings.png">
                    <h1>Configurações</h1>
                </div>
                <img id="fechaConfig" class="fecharModal" src="assets/icons/fecharModal.png">
            </div>
            <div id="corpoConfig" class="corpoModal">
                <div id="configMenu" class="menuModal">
                    <ul id="listMenuConfig" class="listMenuModal">
                        <li>Perfil do Músico</li>
                        <li>Conta</li>
                    </ul>
                </div>
                <div id="configContent">
                    <form id="perfilMusico" enctype="multipart/form-data">
                        <div class="exFile">
                            <div class="inFile">
                                <div class="circuloArquivo"></div>
                            </div>
                            <input name="upFile" id="upFile" type="file">
                        </div>
                        <button type="button" id="alteraFoto">Salvar</button>
                    </form>
                </div>
            </div>
            <div id='rodapeConfig' class='rodapeModal'>
            </div>
        </div>
    </div>
    <div id="modalEx" class="verDetalhes">
        <div id="modalIn" class="detalhes">
            <div class="cabecalhoModal">
                <div id="tituloDetalhe" class="tituloModal">
                </div>
                <img id="fechaDetalhe" class="fecharModal" src="assets/icons/fecharModal.png">
            </div>
            <div id="corpoDetalhe" class="corpoModal">
            </div>
            <div id='rodapeDetalhe' class='rodapeModal'>
            </div>
        </div>
    </div>
    <div id="modalEx" class="addMusica">
        <div id="modalIn" class="addMsc">                   
        </div>
    </div>
    <div id="modalEx" class="confirmModal">
        <div id="modalIn" class="cnfModal">
            <div class="cabecalhoModal">
                <div class="tituloModal">
                    <h1>Confirmação</h1>
                </div>
            </div>
            <div id="crpConfirm" class="corpoModal">
            </div>
            <div id='rdpConfirm' class='rodapeModal'>
            </div>
        </div>
    </div>
    <div id="Centraliza" class="dashboard">
        <div class="painel">
            <h1>Controle de repertório</h1>
            <div class="musicas">
                <div id="mb" class="musica">
                    <h2>MB</h2>
                    <table id="tbMb">
                    </table>
                </div>
                <div id="n" class="musica">
                    <h2>B</h2>
                    <table id="tbB">
                        <tr>
                            <th>Nome</th>
                            <th>Músico/Banda</th>
                        </tr>
                    </table>
                </div>
                <div id="r" class="musica">
                    <h2>R</h2>
                    <table id="tbR">
                        <tr>
                            <th>Nome</th>
                            <th>Músico/Banda</th>
                        </tr>
                    </table>
                </div>
                <div id="i" class="musica">
                    <h2>I</h2>
                    <table id="tbI">
                        <tr>
                            <th>Nome</th>
                            <th>Músico/Banda</th>
                        </tr>
                    </table>
                </div>

            </div>

        </div>
    </div>
</body>

</html>