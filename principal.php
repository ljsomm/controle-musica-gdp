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
    <?php
    session_start();
    if(!(isset($_SESSION["user"])) || !(isset($_SESSION["pass"]))){
        header("Location: index.php");
    }
    ?>
    <div id="navMain">
        <img src="assets/logos/Logo sem fundo.png" id="logo">
        <img src="assets/icons/hamb.png" id="config" onClick="abriMenu()">
        <nav id="navM" class="navMenu">
            <ul id="menuMain">
                <li class="banda"><img src="assets/icons/equipe.png" id="menuIco">Membros da Banda</li>
                <li class="config"><img  src="assets/icons/settings.png" id="menuIco">Configurações</li>
                <li class="logout"><img src="assets/icons/logout.png" id="menuIco">Logout</li>
            </ul>
        </nav>
    </div>
    <div class="rodapePainel">
        <div class="crudMusica">
            <button id="addM" class="btnPainel"><img class="icoBtnPainel" src="assets/icons/mais (1).png"></button>
            <br>
            <button class="btnPainel"><img class="icoBtnPainel" src="assets/icons/editar.png"></button>
        </div>
    </div>
    <div id="modalEx" class="membrosBanda">
        <div id="modalIn" class="membros">
            <div class="cabecalhoModal">
                <div id="tituloModal">
                    <img class="icoModal" src="assets/icons/equipe.png">
                    <h1>Membros da Banda</h1>
                </div>
                <img id="fechaMembro" class="fecharModal" src="assets/icons/fecharModal.png">
            </div>
            <div id="corpoBanda" class="corpoModal">
            </div>
        </div>
    </div>
    <div id="modalEx" class="addMusica">
        <div id="modalIn" class="addMsc">
            <div class="cabecalhoModal">
                <div id="tituloModal">
                    <img class="icoModal" src="assets/icons/mais.png">
                    <h1>Adicionar Músicas</h1>
                </div>
                <img id="fechaMusica" class="fecharModal" src="assets/icons/fecharModal.png">
            </div>
            <div id="corpoMusica" class="corpoModal">
                <div class="part part1">
                    <label>Nome da Música</label>
                    <br>
                    <input type="text" name="txtNomeMusica" id="txtNomeMusica" placeholder="Ex: Resgate">
                    <br>
                    <label>Cantor/Banda</label>
                    <br>
                    <input type="text" name="txtInterprete" id="txtInterprete" placeholder="Ex: Girafas do Planalto">
                    <br>
                    <label>Cover ou Autoral?</label>
                    <div class="rdbSelection">
                        <input type="radio" name="rdbCA" id="rdbCover"><label for="rdbCover">Cover</label>
                        <input type="radio" name="rdbCA" id="rdbAutoral"><label for="rdbAutoral">Autoral</label>
                    </div>
                    <label>Grau de afinidade</label>
                    <select name="cmbNota" id="cmbNota">
                        <option value="select" disabled selected>--Grau de afinidade--</option>
                    </select>
                </div>
                <div class="part part2">
                    <label>Referências</label>
                    <br>
                    <textarea name="txtReferencias" id="txtReferencias" rows="5" maxlength="500"></textarea>
                </div>
            </div>
            <div class="rodapeModal">
                <button id="adicionarMusica">Adicionar</button>
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