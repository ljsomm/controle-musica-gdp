$(document).ready(()=>{
    retMusica()
    $.post({
        url: "api_afinidade.php"
    }).done((data)=>{
        let nota = $.parseJSON(data);
        for(let i = 0; i<nota.length; i++ ){
            $("#cmbNota").append("<option value='"+ nota[i].sigla +"'>"+ nota[i].nome +"</option>");
        }
    })
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
            fechaModal(m);
        })
    })
    $(".config").click(()=>{
       alert("Opção não habilitada, aguarde as próximas atualizações deste sistema!");
    })
    $(".logout").click(()=>{
        window.location = "controllers/logoutController.php";
    })
    $("#addM").click(()=>{
        let n = "addMusica";
        abreModal(n);
        fechaMenu();
        $("#fechaMusica").click(()=>{
            fechaModal(n);
        })
    })
    $("#adicionarMusica").click(()=>{
        cadMusica()
    })
})