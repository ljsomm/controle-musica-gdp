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
        let Cadastro = $(".btnCadastro").offset();
        $('html, body').animate({scrollTop: Cadastro.top}, 0);
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
    mod[0].style="transform: translateX(0%); visibility: visible; transition: 0.25s;";
}

function fechaModal(modal){
    let mod = document.getElementsByClassName(modal);
    mod[0].style="transform: translateX(-100%); visibility: hidden; transition: 0.25s; ";
}

function cadMusica(){
    let nm_musica = $("#txtNomeMusica").val();
    let nm_cantor = $("#txtInterprete").val();
    let cover_autoral = document.getElementsByName("rdbCA");
    let sg_tipo_musica;
    for (let index = 0; index < cover_autoral.length; index++) {
        if(cover_autoral[index].checked){
            if(index == 0){
                sg_tipo_musica = "C";
            }
            else{
                sg_tipo_musica = "A";
            }
        }
    }
    let afinidade = document.getElementById("cmbNota").value;
    let referencia = $("#txtReferencias").val();
    if(referencia == ""){
        referencia = null;
    }   
    if(nm_musica != "" && nm_cantor != "" && afinidade != "select"){
        $.post({
            url: "api_cadastro_musica.php",
            data: {
                musica: nm_musica,
                interp: nm_cantor,
                grauAf: afinidade,
                cvaut: sg_tipo_musica,
                ref: referencia
            }
        }).done((data)=>{
            alert(data);
        })
    }
    else{
        alert("Preencha a todos os campos!");
    }
}