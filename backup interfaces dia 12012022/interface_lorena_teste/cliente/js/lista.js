function criarTabela(conteudo) {
    var tabela = document.createElement("table");
    var thead = document.createElement("thead");
    var tbody= document.createElement("tbody");
    var thd=function(i){return (i==0)?"th":"td";};
    for (var i=0;i<conteudo.length;i++) {
        var tr = document.createElement("tr");
        for(var o=0;o<conteudo[i].length;o++){
            var t = document.createElement(thd(i));
            var texto = typeof conteudo[i][o] === 'object' ? conteudo[i][o] : document.createTextNode(conteudo[i][o]);
            t.appendChild(texto);
            tr.appendChild(t);
        }
        (i==0)?thead.appendChild(tr):tbody.appendChild(tr);
    }
    tabela.appendChild(thead);
    tabela.appendChild(tbody);
    return tabela;
    }


function listClientes(callback){
    jQuery.ajax
    ({
        type: "POST",
        url: 'php/consultahead.php',
        dataType: 'json',
        data: {functionname: "listUnidades"},
        success: function (obj, textstatus) 
        {
            if( !('error' in obj) ) {
                window.response = obj;
                console.log(obj.result);
                let listaNomes = [];
                listaNomes.push(["Nomes","Status","Ações"]);
                for(i=0; i<obj.result.length; i++)
                {
                    let btn1 = document.createElement("button");
                    btn1.innerHTML = "Analytics";
                    btn1.type = "submit";
                    btn1.name = "analitcs";
                    btn1.addEventListener("click", function(){
                        location.href = "graficos.php";
                    });
                    let btn2 = document.createElement("button");
                    btn2.addEventListener("click", function(){
                        //alert("ALÔ2");
                        location.href = "informacoes.php";
                    });
                    btn2.innerHTML = "Properties";
                    btn2.type = "submit";
                    btn2.name = "proprieties";
                    listaNomes.push([obj.result[i]['unitsName'],"Offline",btn1,btn2]);
                }
                callback(listaNomes);
            }
        }
    });
}

function listUnitsByName(callback){
    jQuery.ajax
    ({
        type: "POST",
        url: 'php/consultahead.php',
        dataType: 'json',
        data: {functionname: "listUnidadesClient"},
        success: function (obj, textstatus) 
        {
            if( !('error' in obj) ) {
                selectField = document.getElementById("url1");
                let listaNomes = [];
                listaNomes.push(["Nomes","Status","Ações"]);
                selectField.options[0] = new Option('Selecione uma Unidade','*');
                document.getElementById("nUnidade").innerHTML = obj.result.length;
                for(i=0; i<obj.result.length; i++)
                {
                    var status = obj.result[i][1];
                    let unitName = obj.result[i][0]['unitsName'];
                    selectField.options[selectField.length] = new Option(unitName, unitName);
                    let imgStatus = document.createElement('img');
                        imgStatus.id = "imgStatus";
                        
                    if (status == "Online"){
                        imgStatus.src = 'img\\online.png';
                    } else {
                        imgStatus.src = 'img\\offline.png';
                    }


                    let btn1 = document.createElement("button");
                    btn1.innerHTML = '<img id="imgButton" src="img\\analytics.png" />';
                    btn1.type = "submit";
                    btn1.id = "buttonImg";
                    btn1.name = "analitcs";
                    btn1.addEventListener("click", function(){
                        location.href = "graficos.php?unit="+unitName;
                    });

                    let btn2 = document.createElement("button");
                    btn2.innerHTML = '<img id="imgButton2" src="img\\properties.png" />';
                    btn2.type = "submit";
                    btn2.name = "proprieties";
                    btn2.id = "buttonImg2";
                    btn2.addEventListener("click", function(){
                        //alert("ALÔ2");
                        location.href = "informacoes.php?unit="+unitName;
                    });
                    listaNomes.push([unitName,imgStatus,btn1,btn2]);
                }
                callback(listaNomes);
            }
        }
    });
}

listUnitsByName(function(listaUnidadesName){
    document.getElementById("tabela").appendChild(criarTabela(listaUnidadesName));
    });