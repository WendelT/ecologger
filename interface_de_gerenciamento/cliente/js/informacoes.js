const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const nameUnit = urlParams.get('unit');

function preencherTabela(conteudo, idtabela) {
    console.log(conteudo);
    var tabela = document.createElement("table");
    tabela.id = idtabela;
    tabela.classList.add("tabela");
    var thead = document.createElement("thead");
    var tbody= document.createElement("tbody");
    tbody.classList.add("divisoria2");
    var thd = function(i){return (i==0)?"th":"td";};
    console.log("Tamanho do conteudo : "+ conteudo.length + " " + typeof(conteudo));
    for (var i=0;i<conteudo.length;i++) {
        var tr = document.createElement("tr");
        for(var o=0;o<conteudo[i].length;o++){
            var t = document.createElement(thd(i));
            var texto = typeof conteudo[i][o] === 'object' ? conteudo[i][o] : document.createTextNode(conteudo[i][o]);
            t.appendChild(texto);
            tr.appendChild(t);
        }
        (i==0)?tr.classList.add("header"):tr.classList.add("corpo");
        (i==0)?thead.appendChild(tr):tbody.appendChild(tr);
    }
    tabela.appendChild(thead);
    tabela.appendChild(tbody);
    return tabela;
}

function listInversores(callback){
    var listaNomes = [];
    var Nome = ' - ';
    var NSerie = ' - ';
    var Fabricante = ' - ';
    var Modelo = ' - ';
    var Datalogger = ' - ';
    var Atualizacao = ' - ';
    jQuery.ajax
    ({
        type: "POST",
        url: 'php/consultahead.php',
        dataType: 'json',
        data: {functionname: "listInversoresUnidade", arguments: urlParams.get('unit')},
        success: function (obj, textstatus) 
        {
            if( !('error' in obj) ) 
            {
                console.log(obj.result);
                listaNomes.push(["Nome","Número de Série","Fabricante", "Modelo", "Datalogger", "Atualização"]);
                for(i=0; i<obj.result.length; i++)
                {
                    Nome = obj.result[i]['Name_Inversor'];
                    Datalogger = obj.result[i]['Name_Logger'];
                    listaNomes.push([Nome,NSerie,Fabricante,Modelo,Datalogger,Atualizacao]);
                }
                callback(listaNomes);
            }
        }
    });
}

function listTarifas(callback){
    console.log("Está sendo chamado");
    var listaNomes = [];
    var Inicio = ' - ';
    var Termino = ' - ';
    var Tarifa = ' - ';
    jQuery.ajax
    ({
        type: "POST",
        url: 'php/consultahead.php',
        dataType: 'json',
        data: {functionname: "tarifas", arguments: urlParams.get('unit')},
        success: function (obj, textstatus) 
        {
            if( !('error' in obj) ) 
            {
                console.log(obj.result);
                listaNomes.push(["Inicio","Término","Tarifa",]);
                for(i=0; i<obj.result.length; i++)
                {
                    
                    Inicio = obj.result[i]['data_inicio'];
                    Termino = obj.result[i]['data_fim'];
                    Tarifa = obj.result[i]['valor'] + " R$";
                    if(Termino == null){
                        Termino = "Sem data final";
                    }
                    console.log(listaNomes);
                    listaNomes.push([Inicio,Termino,Tarifa]);
                }
                callback(listaNomes);
            }
        }
    });
}

function listAlarmes(callback){
    var listaNomes = [];
    var invInfos;
    var infosElements
    var Alarmes = ' - ';
    var Inversor = ' - ';
    jQuery.ajax
    ({
        type: "POST",
        url: 'php/consultahead.php',
        dataType: 'json',
        data: {functionname: "listAlarmes", arguments: urlParams.get('unit')},
        success: function (obj, textstatus) 
        {
            if( !('error' in obj) ) 
            {
                console.log(obj.result);
                console.log(obj);
                listaNomes.push(["Alarmes", "Inversor"]);

                for(i=0; i < obj.result.length; i++){
                    invInfos = obj.result[i].inv;
                    if(invInfos != null){
                        for(j=0; j<invInfos.length; j++){
                            infosElements = invInfos[j]['wrngs'];
                            for(z = 0; z < infosElements.length; z ++){
                                Alarmes = infosElements[z]['wrng'];
                                z++;
                                Inversor = infosElements[z]['inv_id'];
                                listaNomes.push([Alarmes, Inversor]);
                            }
                        }    
                    } 
                }       
                callback(listaNomes);
            }
        }
    });
}

listInversores(function(listaInversores){
    document.getElementById("inversores_lista").appendChild(preencherTabela(listaInversores, "tabela_inversores"));
    });

listTarifas(function(listaTarifas){
    document.getElementById("tarifas_lista").appendChild(preencherTabela(listaTarifas, "tabela_tarifas"));
    });

listAlarmes(function(listaAlarmes){
    document.getElementById("alarmes_lista").appendChild(preencherTabela(listaAlarmes, "tabela_alarmes"));
    });