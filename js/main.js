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