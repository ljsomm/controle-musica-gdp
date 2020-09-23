$(document).ready(()=>{
    retMusica()
    $.post({
        url: "api_musico.php"
    }).done((data)=>{
        let r = $.parseJSON(data);
        for(let i = 0; i<r.length ; i++){
            $("#corpoBanda").append("<div id='perfil'><img src='assets/profile/sem-foto.png' id='profile-pic'><div class='dadoProfile'><span>"+r[i]+"</span></div></div>");
        }
    })
    $(".banda").click(()=>{
        let m = "membrosBanda";
        abreModal(m);
        fechaMenu();
        $("#fechaMembro").click(()=>{
            fechaModal(m, "0.25s");
        })
    })
    $(".config").click(()=>{
       let m = "ConfigUser"
       abreModal(m)
       fechaMenu()
       $("#fechaConfig").click(()=>{
           fechaModal(m, "0.25s")
       })
    })
    $(".logout").click(()=>{
        window.location = "controllers/logoutController.php";
    })
    $("#addM").click(()=>{
        let n = "addMusica";
        abreModal(n);
        let a = document.getElementsByClassName("addMsc");
        a[0].innerHTML = "<div class='cabecalhoModal'><div id='tituloMusica' class='tituloModal'><img class='icoModal' src='assets/icons/mais.png'><h1>Adicionar Músicas</h1></div>       <img id='fechaMusica' class='fecharModal' src='assets/icons/fecharModal.png'></div><div id='corpoMusica' class='corpoModal'><div class='part part1'>    <label>Nome da Música</label><br><input type='text' name='txtNomeMusica' id='txtNomeMusica' placeholder='Ex: Resgate'><br><label>Cantor/Banda</label><br><input type='text' name='txtInterprete' id='txtInterprete' placeholder='Ex: Girafas do Planalto'><br><label>Cover ou Autoral?</label><div class='rdbSelection'><input type='radio' name='rdbCA' id='rdbCover'><label id='lblCover' for='rdbCover'>Cover</label><input type='radio' name='rdbCA' id='rdbAutoral'><label id='lblAutoral' for='rdbAutoral'>Autoral</label></div><label>Grau de afinidade</label><select name='cmbNota' id='cmbNota'><option value='select' disabled selected>--Grau de afinidade--</option></select></div><div class='part part2'><label>Observações</label><br><textarea name='txtReferencias' id='txtReferencias' rows='5' maxlength='500'></textarea></div></div><div id='rodapeMusica' class='rodapeModal'><button id='adicionarMusica' class='rodapeButton'>Adicionar</button></div>";
        retNota("cmbNota")
        fechaMenu()
        $("#fechaMusica").click(()=>{
            fechaModal(n, "0.25s")
        })
        $("#adicionarMusica").click(()=>{
            cadMusica()
        })
    })
   
})