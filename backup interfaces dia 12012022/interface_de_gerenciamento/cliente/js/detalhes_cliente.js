const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

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

    function listUnits(callback)
{
    jQuery.ajax
    ({
        type: "POST",
        url: 'php/consultahead.php',
        dataType: 'json',
        data: {functionname: "listUnidadesClientSuper", arguments: urlParams.get('client')},
        success: function (obj, textstatus) 
        {
            if( !('error' in obj) ) {
                let listaNomes = [];
                listaNomes.push(["Nomes","Status","Ações"]);
                for(i=0; i<obj.result.length; i++)
                {
                    
                    var status = obj.result[i][1];
                    let unitsName = obj.result[i][0]['unitsName'];

                    console.log(status);
                    console.log(unitsName);
                    let btn1 = document.createElement("button");
                    btn1.innerHTML = '<img id="imgButton" src="img\\analytics.png" />';
                    btn1.type = "submit";
                    btn1.id = "buttonImg";
                    btn1.name = "cadastroCliente";
                    btn1.addEventListener("click", function(){
                        location.href = "graficos.php?unit="+unitsName;
                    });

                    let btn2 = document.createElement("button");
                    btn2.innerHTML = '<button type="button" data-bs-target="#exampleModal"><img id="imgButton2" src="img\\properties.png"/></button>';
                    btn2.id = "buttonImg2";                    

                    listaNomes.push([unitsName,status, btn1, btn2]);
                }
                callback(listaNomes);
            }
        }
    });
    }   

    $(document).ready(function(){
        $('#insert_form').on('submit', function(event){
            event.preventDefault();
            //Receber os dados do formulário
            var dados = $("insert_form").serialize();
            $.post("php/CUnidade.php", dados, function(retorna){
                if(retorna){
                    $("#msg").html('<div class="alert alert-success" role="alert">Unidade cadastrada com sucesso</div>');
                }
                else{
                    $("#msg").html('<div class="alert alert-danger" role="alert">Não foi possível cadastrar a unidade</div>');
                }
                
            });
        });
    });

    listUnits(function(listaClientesName){
        document.getElementById("tabela").appendChild(criarTabela(listaClientesName));
        });