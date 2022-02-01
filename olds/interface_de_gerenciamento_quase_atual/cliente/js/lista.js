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
                        alert("ALÔ2");
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
                selectField.options[0] = new Option('Todas as Unidades','*');
                document.getElementById("nUnidade").innerHTML = obj.result.length;
                for(i=0; i<obj.result.length; i++)
                {
                    let unitName = obj.result[i]['unitsName'];
                    selectField.options[selectField.length] = new Option(unitName, unitName);
                    
                    let btn1 = document.createElement("button");
                    btn1.innerHTML = "Analytics";
                    btn1.type = "submit";
                    btn1.name = "analitcs";
                    btn1.addEventListener("click", function(){
                        location.href = "graficos.php?unit="+unitName;
                    });

                    let btn2 = document.createElement("button");
                    btn2.innerHTML = "Properties";
                    btn2.type = "submit";
                    btn2.name = "proprieties";
                    btn2.addEventListener("click", function(){
                        alert("ALÔ2");
                    });
                    listaNomes.push([obj.result[i]['unitsName'],"Offline",btn1,btn2]);
                }
                callback(listaNomes);
            }
        }
    });
}


/*
function tableSup(){
    listClientes(function(listaClientenomes){
    document.getElementById("tabela").appendChild(criarTabela(listaClientenomes));
    });
}

function tableCliente(){
    listUnitsByName(function(listaUnidadesName){
    document.getElementById("tabela").appendChild(criarTabela(listaUnidadesName));
    });
}
*/
listUnitsByName(function(listaUnidadesName){
    document.getElementById("tabela").appendChild(criarTabela(listaUnidadesName));
    });