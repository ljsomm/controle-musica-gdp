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

function fechaModal(modal, temp){
    let mod = document.getElementsByClassName(modal);
    mod[0].style="transform: translateX(-100%); visibility: hidden; transition: " + temp + "; ";
}

function cadMusica(){
    let nm_musica = $("#txtNomeMusica").val();
    let nm_cantor = $("#txtInterprete").val();
    let cover_autoral = document.getElementsByName("rdbCA");
    let sg_tipo_musica = false;
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
    if(nm_musica != "" && nm_cantor != "" && afinidade != "select" && sg_tipo_musica != false){
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
            let r = $.parseJSON(data)
            finishMsg("addMusica", "tituloMusica", "corpoMusica", "rodapeMusica", r)
            retMusica()
        })
    }
    else{
        if(nm_musica == ""){
            document.getElementById("txtNomeMusica").style = "border-color: red;"
        }
        else{
            document.getElementById("txtNomeMusica").style = "border-color: none;"
        }
        if(nm_cantor == ""){
            document.getElementById("txtInterprete").style = "border-color: red;"
        }
        else{
            document.getElementById("txtInterprete").style = "border-color: none;"
        }
        if(afinidade == "select"){
            document.getElementById("cmbNota").style = " color:red;"
        }
        else{
            document.getElementById("cmbNota").style = " color:none;"
        }
        if(sg_tipo_musica == false){
            document.getElementById("lblCover").style="color:red;"
            document.getElementById("lblAutoral").style="color:red;"
        }
        else{
            document.getElementById("lblCover").style="color:none;"
            document.getElementById("lblAutoral").style="color:none;"
        }
    }
}

function confirmAction(conf, func){
    abreModal("confirmModal")
    let corpo = document.getElementById("crpConfirm")
    let rodpe = document.getElementById("rdpConfirm")
    corpo.innerHTML = "<span>"+conf+"</span>";
    rodpe.innerHTML = "<button id='btnSim' onClick='"+func+"'>Sim</button><button id='btnNao'>Não</button>";
    $("#btnNao").click(()=>{
        fechaModal("confirmModal", "0.25s")
    })
}

function finishMsg(mEx, tit, crp, rdp, r){
    let titul = document.getElementById(tit)
    let corpo = document.getElementById(crp)
    let rodpe = document.getElementById(rdp)
    if(r.res == true){
        titul.innerHTML = "<img class='icoModal' src='assets/icons/confirm.png'><h1>Ação concluída</h1>";
        corpo.innerHTML = "<div class='ret'><span id='conc'>"+r.msg+"</span></div>";
        corpo.style = "justify-content: center; padding:15px";
    }
    else{
        titul.innerHTML = "<img class='icoModal' src='assets/icons/fechar.png'><h1>ERRO</h1>";
        corpo.innerHTML = "<div class='ret'><span id='conc'>"+r.msg+"</span></div>";
        corpo.style = "justify-content: center; padding:15px";
    }
    rodpe.innerHTML = "<button id='okMusica' class='btnOk'>OK</button>"
    rodpe.style = "text-align:center; display:block;padding:5px; border-top: 1px solid black;";
    $(".btnOk").click(()=>{
        fechaModal(mEx, "0.25s");
    })
}

function delMusica(id) {
    $.post({
            url: "delete_musica.php",
            data: {
                cd_musica: id
            }
        }).done((data)=>{
            let r = $.parseJSON(data)
            finishMsg("verDetalhes", "tituloDetalhe", "corpoDetalhe", "rodapeDetalhe", r)
            retMusica()
        })
        fechaModal("confirmModal", "0s")
}

function atualizarMusica(cod, nm, int, obs, afi){
    $.post({
        url: "api_upd_musica.php",
        data: {
            codi: cod,
            nome: nm,
            inte: int,
            obse: obs,
            afin: afi
        }
    }).done((data)=>{
        let r = $.parseJSON(data);
        finishMsg("verDetalhes", "tituloDetalhe", "corpoDetalhe", "rodapeDetalhe", r)
        retMusica()
    })
    fechaModal("confirmModal", "0s")
}

function stateInput(inp, btn, ori, type){
    let input = document.getElementById(inp)
    let butt  = document.getElementById(btn)
    if(input.disabled){
        
        input.disabled = false
        butt.innerHTML = "Cancelar"
        switch(type){
            case 0:
                $("#"+inp).keyup(()=>{
                    if(input.value != ori){
                        document.getElementById("atualizarMusica").disabled = false
                    }
                })
                break;
            case 1:
                input.options[0].disabled = true
                $("#"+inp).change(()=>{
                    if(input.value != ori){
                        document.getElementById("atualizarMusica").disabled = false
                    }
                })
                break;
        }
    }
    else{
        if(type){
            input.options[0].disabled = false
        }
        input.disabled = true
        butt.innerHTML = "Alterar"
        input.value = ori
    }
}

function retNota(sel){
    $.post({
        url: "api_afinidade.php"
    }).done((data)=>{
        let nota = $.parseJSON(data)     
        for(let i = 0; i<nota.length; i++ ){
            if(document.getElementById(sel).options[0].value != nota[i].sigla){
                $("#"+sel).append("<option value='"+ nota[i].sigla +"'>"+ nota[i].nome +"</option>")
            }
        }
    })
}

function retMusica(){
    $.post({
        url: "api_musica.php"
    }).done((data)=>{
        document.getElementById("tbMb").innerHTML="<tr><th class='nmTb'>Nome</th><th class='intTb'>Músico/Banda</th><th class='dtlTb'>Mais</th></tr>";
        document.getElementById("tbB").innerHTML="<tr><th class='nmTb'>Nome</th><th class='intTb'>Músico/Banda</th><th class='dtlTb'>Mais</th></tr>";
        document.getElementById("tbR").innerHTML="<tr><th class='nmTb'>Nome</th><th class='intTb'>Músico/Banda</th><th class='dtlTb'>Mais</th></tr>";
        document.getElementById("tbI").innerHTML="<tr><th class='nmTb'>Nome</th><th class='intTb'>Músico/Banda</th><th class='dtlTb'>Mais</th></tr>";
        let musicas = $.parseJSON(data);
        for(let i = 0; i<musicas.length; i++){
            switch (musicas[i].nota) {
                case "MB":
                    $("#tbMb").append("<tr><td>"+musicas[i].nome+"</td><td>"+musicas[i].musico+"</td><td><button class='btnCrudMusica' id='"+musicas[i].codigo+"'><img class='icoCrudMusica' src='assets/icons/olho.png'></button></td></tr>");
                    break;
                case "B":
                    $("#tbB").append("<tr><td>"+musicas[i].nome+"</td><td>"+musicas[i].musico+"</td><td><button class='btnCrudMusica' id='"+musicas[i].codigo+"'><img class='icoCrudMusica' src='assets/icons/olho.png'></button></td></tr>");
                    break;
                case "R":
                    $("#tbR").append("<tr><td>"+musicas[i].nome+"</td><td>"+musicas[i].musico+"</td><td><button class='btnCrudMusica' id='"+musicas[i].codigo+"'><img class='icoCrudMusica' src='assets/icons/olho.png'></button></td></tr>");
                        break;
                case "I":
                    $("#tbI").append("<tr><td>"+musicas[i].nome+"</td><td>"+musicas[i].musico+"</td><td><button class='btnCrudMusica' id='"+musicas[i].codigo+"'><img class='icoCrudMusica' src='assets/icons/olho.png'></button></td></tr>");
                        break;
            }
            $("#"+musicas[i].codigo).click(()=>{
                let modal = "verDetalhes";
                let id = musicas[i].codigo ;
                abreModal(modal)
                document.getElementById("tituloDetalhe").innerHTML = "<img class='icoModal' src='assets/icons/olho.png'><h1>Detalhes da Música</h1>";
                document.getElementById("corpoDetalhe").innerHTML = "<div class='propMusica'><div class='cabecalhoProp'><label>Nome:</label><button class='alterarDetalhe' id='btnAlteraNome'>Alterar</button></div><input type='text' class='txtDetalhe' value='"+ musicas[i].nome +"' id='txtAlteraNome' disabled></div>" + "<div class='propMusica'><div class='cabecalhoProp'><label>Intérprete:</label><button class='alterarDetalhe' id='btnAlteraInterprete'>Alterar</button></div><input type='text' class='txtDetalhe' id='txtAlteraInterprete' value='"+ musicas[i].musico +"' disabled></div>" + "<div class='propMusica'><div class='cabecalhoProp'><label>Afinidade:</label><button class='alterarDetalhe' id='btnAlteraNota'>Alterar</button></div><select id='cmbAlteraNota' disabled><option value='"+ musicas[i].nota +"' selected>"+ musicas[i].grau +"</option></select></div>" + 
                "<div class='propMusica'><div class='cabecalhoProp'><label>Observações:</label><button class='alterarDetalhe' id='btnAlteraObs'>Alterar</button></div><textarea class='txtDetalhe' id='txtAlteraObs'  disabled>"+ (musicas[i].obs == ""? "Nenhuma observação foi anexada.":musicas[i].obs) +"</textarea></div>"
                document.getElementById("corpoDetalhe").style = "padding: 0px;"
                document.getElementById("rodapeDetalhe").innerHTML = "<button id='deleteMusica' class='btnRodape'>Excluir</button><button id='atualizarMusica' class='btnRodape' disabled>Salvar</button>"
                document.getElementById("rodapeDetalhe").style = 'align-items: end-flex;'
                retNota("cmbAlteraNota")
                $("#btnAlteraNome").click(()=>{
                    stateInput("txtAlteraNome", "btnAlteraNome", musicas[i].nome, 0)
                })
                $("#btnAlteraInterprete").click(()=>{
                    stateInput("txtAlteraInterprete", "btnAlteraInterprete", musicas[i].musico, 0)
                })
                $("#btnAlteraNota").click(()=>{
                    stateInput("cmbAlteraNota", "btnAlteraNota", musicas[i].nota, 1)
                })
                $("#btnAlteraObs").click(()=>{
                    stateInput("txtAlteraObs", "btnAlteraObs", musicas[i].obs, 0)
                })
                $("#deleteMusica").click(()=>{
                    confirmAction("Deseja apagar esta música?", "delMusica("+ id +")")
                })
                $("#atualizarMusica").click(()=>{
                    let cod = musicas[i].codigo
                    let nm = '"' + $("#txtAlteraNome").val() + '"'
                    let int = '"' + $("#txtAlteraInterprete").val() + '"'
                    let obs = '"' + $("#txtAlteraObs").val() + '"'
                    let afi = '"' + $("#cmbAlteraNota").val() + '"'
                    confirmAction("Deseja mesmo fazer essas alterações?", "atualizarMusica("+ cod +"," + nm +", "+ int+", "+ obs +" , "+ afi +")")
                })
                $(".fecharModal").click(()=>{
                    fechaModal(modal, "0.25s")
                })
            })
        }
    })
}