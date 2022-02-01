function mostraInversor () {
    var esconde = document.getElementById("esconde");
    var mais = document.getElementById("mais");
    var arrow = document.getElementById("arrow");

    if(mais.style.display === "inline"){
        mais.style.display = "none"
        esconde.style.display ="inline"
        arrow.innerHTML = "arrow_drop_down"

    }else {

        mais.style.display = "inline"
        esconde.style.display = "none"
        arrow.innerHTML = "arrow_drop_up"
       
    }
}

function mostraTarifa () {
    var escondeT = document.getElementById("escondeT");
    var maisT = document.getElementById("maisT");
    var arrowT = document.getElementById("arrowT");

    if(maisT.style.display === "inline"){
        maisT.style.display = "none"
        escondeT.style.display ="inline"
        arrowT.innerHTML = "arrow_drop_down"

    }else {
        maisT.style.display = "inline"
        escondeT.style.display = "none"
        arrowT.innerHTML = "arrow_drop_up"
        
    }
}

function mostraMedidores () {
    var escondeM = document.getElementById("escondeM");
    var maisM = document.getElementById("maisM");
    var arrowM = document.getElementById("arrowM");

    if(maisM.style.display === "inline"){
        maisM.style.display = "none"
        escondeM.style.display ="inline"
        arrowM.innerHTML = "arrow_drop_down"

    }else {
       
        maisM.style.display = "inline"
        escondeM.style.display = "none"
        arrowM.innerHTML = "arrow_drop_up"
    }
}

function mostraAlarmes () {
    var escondeA = document.getElementById("escondeA");
    var maisA = document.getElementById("maisA");
    var arrowA = document.getElementById("arrowA");

    if(maisA.style.display === "inline"){
        maisA.style.display = "none"
        escondeA.style.display ="inline"
        arrowA.innerHTML = "arrow_drop_down"

    }else {
       
        maisA.style.display = "inline"
        escondeA.style.display = "none"
        arrowA.innerHTML = "arrow_drop_up"
    }
}

function mostrarOcultarSenha (){
    var senha = document.getElementById("senha");
    var img = document.getElementById("statusSenha");
    if(senha.type == "password"){
        senha.type = "text"
        img.src = 'img\\mostrarSenha.png'
    }else {
        senha.type = "password"
        img.src = 'img\\esconderSenha.png'
    }
}