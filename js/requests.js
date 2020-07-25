$(document).ready(()=>{
    criaComboInstrumentos()
    //Cadastro de usuário
    $(".btnCadastro").click(()=>{
       cadastraUsuario()
    })
    $("#adc").click(()=>{
        if(5 > qt_instrumentos){
            criaComboInstrumentos()
        }
    })
    $("#rmv").click(()=>{
        removeComboInstrumentos()
    })
    $("#sim").click(()=>{
        addTipoVocal()
    })
    $("#nao").click(()=>{
        rmvTipoVocal()
    })
})

function addTipoVocal(){
    if(document.getElementById("checkbox").innerHTML == ""){
        $("#checkbox").append("<input type='checkbox' name='cboCanta' id='cboPrincipal'><label id='lblPrincipal' for='cboPrincipal'>Principal</label><input type='checkbox' name='cboCanta' id='cboSegunda'><label id='lblSegunda' for='cboSegunda'>Segunda Voz</label><input type='checkbox' name='cboCanta' id='cboBack'><label id='lblBacking' for='cboBack'>Backing Vocal</label>");
        document.getElementById("checkbox").style = "padding: 2.5px; margin-top: 5px;";
        let Cadastro = $(".btnCadastro").offset();
        $('html, body').animate({scrollTop: Cadastro.top}, 0);
    } 
}

function rmvTipoVocal(){
    if(document.getElementById("checkbox").innerHTML != ""){
      document.getElementById("checkbox").innerHTML="";
      document.getElementById("checkbox").style = "";
    } 
}

function loginUsuario(){
    let user = $("#txtLogin").val();
    let pass = $("#txtSenha").val();
    let a = document.getElementById("erro");
    document.getElementById("txtLogin").style =  "border-color: none; background-color:white;";
    document.getElementById("txtSenha").style =  "border-color: none;background-color:white;";
    a.style = "border: none";
    if(user == "" || pass == "" ){
        a.innerHTML =  "Preencha a todos os campos!";
        a.style = "color: red; border: 1.5px solid red; padding:5px;";
        if(user == ""){
            document.getElementById("txtLogin").style =  "border-color: red; background-color: rgb(251, 201, 201);";
        }
        else{
            document.getElementById("txtLogin").style =  "border-color: none; background-color:white;";
        }
        if(pass == ""){
            document.getElementById("txtSenha").style =  "border-color: red; background-color: rgb(251, 201, 201);";
        }
        else{
            document.getElementById("txtSenha").style =  "border-color: none;background-color:white;";
        }
        return false;
    }
    else{
        if(user.length<6 || pass.length <6 || user.length>20 || pass.length>75 ){
            a.innerHTML =  "O username ou a senha estão incorretos!";
            a.style = "color: red; border: 1.5px solid red; padding:5px;";
            return false;
        }
        else{
            return true;
        }
    }

}

function cadastraUsuario(){
    let nome = $("#txtNome").val();
    let user = $("#txtUser").val();
    let senha = $("#txtSenhaCad").val();
    let consenha = $("#txtConfirmSenha").val();
    let a = document.getElementById("msg");
    let b = document.getElementsByName("cmb");
    let c = document.getElementsByName("bool"); //array onde o indice se for 0 é o sim e se for 1 é o nao
    let voc = new Array(3);
    let v = true;
    a.innerHTML =  "";
    document.getElementById("txtSenhaCad").style =  "border-color: none";
    document.getElementById("txtConfirmSenha").style =  "border-color: none";
    document.getElementById("txtNome").style =  "border-color: none";
    document.getElementById("txtUser").style =  "border-color: none";
    if(c[0].checked == false && c[1].checked == false){
        v = false;
        document.getElementById("lblSim").style = "color: red;";
        document.getElementById("lblNao").style = "color: red;";
    }
    else{
        if(c[0].checked){
            let d = document.getElementsByName("cboCanta");
            for(let i = 0; i<d.length ; i++){
                voc[i] = d[i].checked;
            }
            if(d[0].checked == false && d[1].checked == false && d[2].checked == false){
                v = false;
                document.getElementById("lblPrincipal").style = "color: red;";
                document.getElementById("lblSegunda").style = "color: red;";
                document.getElementById("lblBacking").style = "color: red;";
            }
            else{
                document.getElementById("lblPrincipal").style = "color: black";
                document.getElementById("lblSegunda").style = "color: black;";
                document.getElementById("lblBacking").style = "color: black;";
            }
        }
        else{
            voc[0] = "nao";
        }
        document.getElementById("lblSim").style = "color: black;";
        document.getElementById("lblNao").style = "color: black;";
    }
    for (let index = 0; index < b.length; index++) {
        if(b[index].value == 0){
            v = false;
            b[index].style = "color: red";
        }
        else{
            b[index].style = "color: black";
        }
    }
    if(!(nome == "" || user == "" || senha == "" || consenha == "" ||  v == false)){
        if(senha.length < 6 || consenha.length < 6 || senha.length > 75 || consenha.length > 75 || user.length < 6 || user.length > 20){
            if(user.length < 6 || user.length > 20){
                a.innerHTML =  "Seu Username deve ter <br>no mínimo 6 e no máximo 20 caracteres!";
                a.style = "color: red";
                document.getElementById("txtUser").style =  "border-color: red";
                document.getElementById("txtSenhaCad").style =  "border-color: none";
                document.getElementById("txtConfirmSenha").style =  "border-color: none";
                document.getElementById("txtNome").style =  "border-color: none";
            }
            if(senha.length < 6 || consenha.length < 6  || senha.length > 75 || consenha.length > 75 ){
                a.innerHTML =  "Sua Senha deve ter <br>no mínimo 6 caracteres e no máximo 75!";
                a.style = "color: red";
                document.getElementById("txtSenhaCad").style =  "border-color: red";
                document.getElementById("txtConfirmSenha").style =  "border-color: red";
                document.getElementById("txtUser").style =  "border-color: none";
                document.getElementById("txtNome").style =  "border-color: none";
            }
            if(senha.length < 6 && consenha.length < 6 && user.length < 6){
                a.innerHTML =  "Os campos Username e Senha<br>devem ter no mínimo 6 dígitos!";
                a.style = "color: red";
                document.getElementById("txtUser").style =  "border-color: red";
                document.getElementById("txtSenhaCad").style =  "border-color: red";
                document.getElementById("txtConfirmSenha").style =  "border-color: red";
                document.getElementById("txtNome").style =  "border-color: none";
            }
            if(senha.length > 75 && consenha.length > 75 && user.length > 20){
                a.innerHTML =  "Corrija a quantidade de dígitos nos campos:<br>Username (máx 20) e Senha (máx 75)!";
                a.style = "color: red";
                document.getElementById("txtUser").style =  "border-color: red";
                document.getElementById("txtSenhaCad").style =  "border-color: red";
                document.getElementById("txtConfirmSenha").style =  "border-color: red";
                document.getElementById("txtNome").style =  "border-color: none";
            }
        }
        else{
            if(senha != consenha){
                a.innerHTML =  "Senhas divergentes!";
                a.style = "color: red";
                document.getElementById("txtSenhaCad").style =  "border-color: red";
                document.getElementById("txtConfirmSenha").style =  "border-color: red";
                document.getElementById("txtUser").style =  "border-color: none";
                document.getElementById("txtNome").style =  "border-color: none";
            }
            else{
                let cont = 0;
                for (let i = 0; i < b.length; i++) {
                    for(let j = 0; j < b.length; j++){
                        if(b[i].value == b[j].value){
                            cont++;
                            if(i!=j){
                                b[i].style = "color: red";
                                b[j].style = "color: red";
                            }
                        }
                    }
                }
                if(cont>b.length){
                    a.innerHTML =  "Cadastre instrumentos diferentes!";
                    a.style = "color: red";
                }
                else if(cont == b.length){
                    a.style = "color: black";
                    document.getElementById("txtSenhaCad").style =  "border-color: none";
                    document.getElementById("txtConfirmSenha").style =  "border-color: none";
                    document.getElementById("txtNome").style =  "border-color: none";
                    document.getElementById("txtUser").style =  "border-color: none";
                    let c = new Array(b.length);
                    for(let i = 0; i < b.length ; i++){
                        c[i] = b[i].value;
                    }
                    $.post({
                        url: "api_cadastro_geral.php",
                        data:{
                            nm_usuario: nome,
                            nm_login: user,
                            cd_senha: senha,
                            instrumentos: c,
                            vocal: voc
                        }
                    }).done((data)=>{
                        var a = $.parseJSON(data);
                        switch(a.return_user){
                            case 0:
                                document.getElementById("msg").innerHTML =  "Algum erro inesperado aconteceu!";
                                document.getElementById("msg").style = "color: red";
                                document.getElementById("txtUser").style =  "border-color: red";
                                break;
                            case 1:
                                document.getElementById("msg").innerHTML =  "Esse Username já foi cadastrado!";
                                document.getElementById("msg").style = "color: red";
                                document.getElementById("txtUser").style =  "border-color: red";
                                break;
                            default:
                                if(a.return_user == true && a.return_musico == true && a.return_posicao == true && a.return_vocal == true){
                                document.getElementById("cxCadastro").style = "display:flex; align-items:center;";
                                document.getElementById("cxCadastro").innerHTML = "<img id='confirm' src='assets/icons/confirm.png'><span id='conc'>" + "Cadastro efetuado com sucesso!" +
                                "</span>";
                                $(".segundo").remove();
                                let Login = $("nav").offset();
                                setTimeout(()=> {$('html, body').animate({scrollTop: Login.top}, 500);}, 1500);
                                }
                                else{
                                    document.getElementById("cxCadastro").style = "display:flex; align-items:center;";
                                    document.getElementById("cxCadastro").innerHTML = "<img id='confirm' src='assets/icons/fechar.png'><span id='conc'>" + "Não foi possível efetuar o cadastro, tente novamente!" +
                                    "</span>";
                                    $(".segundo").remove();
                                }
                                break;
                        }
                    })
                }
            }
        } 
    }
    else{
        a.innerHTML =  "Preencha à todos os campos!";
        a.style = "color: red";
        if(nome == ""){    
            document.getElementById("txtNome").style =  "border-color: red";
        }
        else{
            document.getElementById("txtNome").style =  "border-color: none";
        }
        if(user == ""){
            document.getElementById("txtUser").style =  "border-color: red";
        }
        else{
            document.getElementById("txtUser").style =  "border-color: none";
        }
        if(senha == ""){
            document.getElementById("txtSenhaCad").style =  "border-color: red";
        }
        else{
            document.getElementById("txtSenhaCad").style =  "border-color: none";
        }
        if(consenha== ""){
            document.getElementById("txtConfirmSenha").style =  "border-color: red";
        }  
        else{
            document.getElementById("txtConfirmSenha").style =  "border-color: none";
        }
    }
}