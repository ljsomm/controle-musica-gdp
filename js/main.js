function abreCadastro(){
    let Cadastro = $(".btnCadastro").offset();
    $('html, body').animate({scrollTop: Cadastro.top}, 500);
    document.getElementById("txtNome").focus();
}

let inst_bd;
let qt_instrumentos = 0;
function criaComboInstrumentos(){
    $.post({
        url: 'api_instrumentos.php'
    }).done((data)=>{
        qt_instrumentos++;
        let conteudo = $.parseJSON(data);
        inst_bd = conteudo.length;
        $("#Instrumento").append("<select name='cmb' id='cmbInstrumento"+ qt_instrumentos +"'></select><br id='br"+qt_instrumentos+"'>");
        document.getElementById("cmbInstrumento"+ qt_instrumentos).innerHTML += "<option value='0' disabled selected>--Instrumento--</option>";
        for (let index = 0; index < conteudo.length; index++) {
            document.getElementById("cmbInstrumento"+ qt_instrumentos).innerHTML += "<option value='"+conteudo[index].cd_instrumento+"'>" + conteudo[index].nm_instrumento + "</option>";
        } 
    })
}

function removeComboInstrumentos(){
    if(qt_instrumentos>=2){
        $("#cmbInstrumento"+qt_instrumentos).remove();
        $("#br"+qt_instrumentos).remove();
        qt_instrumentos--;
    }
}

function abriMenu(){
    if(document.getElementById("navM").className == "navMenu"){
        document.getElementById("navM").className = "navMenu2";
    }
    else{
        document.getElementById("navM").className = "navMenu";
    }
}

function fechaMenu(){
    document.getElementById("navM").className = "navMenu";
}

function abreModal(modal){
    let mod = document.getElementsByClassName(modal);
    mod[0].style="transform: translateX(0%); transition: 0.25s";
}

function fechaModal(modal){
    let mod = document.getElementsByClassName(modal);
    mod[0].style="transform: translateX(-100%); transition: 0.25s";
}

$(document).ready(()=>{
    $(".banda").click(()=>{
        let m = "membrosBanda";
        abreModal(m);
        $.post({
            url: "api_musico.php"
        }).done((data)=>{
            let r = $.parseJSON(data);
            for(let i = 0; i<r.length ; i++){
                $("#corpoBanda").append("<div id='perfil'><img src='assets/profile/sem-foto.png' id='profile-pic'><div class='dadoProfile'><label>Nome:</label><span>"+r[i]+"</span><br><label>Posição:</label><span></span></div></div>");
            }
        })
        fechaMenu();
        $("#fecharModal").click(()=>{
            fechaModal(m);
        })
    })
    $(".logout").click(()=>{
        window.location = "controllers/logoutController.php";
    })
})