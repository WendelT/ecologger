const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const nUnidadeGet = urlParams.get('unit');
refreshinfos(nUnidadeGet);

function refreshinfos(unidadeName){
    jQuery.ajax
    ({
        type: "POST",
        url: 'php/consultahead.php',
        dataType: 'json',
        data: {functionname: "potUnidade", arguments: unidadeName},
        success: function (obj, textstatus) 
        {
            if( !('error' in obj) )
            {
                document.getElementById("potUsina").innerHTML = obj.result;
            }
        },
    });

    jQuery.ajax
    ({
        type: "POST",
        url: 'php/consultahead.php',
        dataType: 'json',
        data: {functionname: "producaoUnidades", arguments: unidadeName},
        success: function (obj, textstatus) 
        {
            if( !('error' in obj) )
            {
                console.log(obj.result3);
                if(obj.result == null)
                {
                    obj.result = '0';
                }
                if(obj.result2 == null)
                {
                    obj.result2 = '0'
                }
                if(obj.result4 == null)
                {
                    obj.result4 = '0'
                }
                if(obj.result5 == null)
                {
                    obj.result5 = '0';
                } 
                
                document.getElementById("potinsta").innerHTML = obj.result4 + " KW";
                document.getElementById("statusUnidade").innerHTML = obj.result3;
                document.getElementById("CalcArvores").innerHTML = obj.result2;
                document.getElementById("enerGerada").innerHTML = obj.result + " kWh";
                document.getElementById("econ").innerHTML = obj.result5;

                let imgUnitStatus = document.getElementById('imgUnitStatus');
                
                if (obj.result3 == "Online"){
                    imgUnitStatus.src = 'img\\statusOn.png';
                } else {
                    imgUnitStatus.src = 'img\\statusOff.png';
                }
            }
        },
    });
    
    jQuery.ajax
    ({
        type: "POST",
        url: 'php/consultahead.php',
        dataType: 'json',
        data: {functionname: "listLoggerUnidades", arguments: unidadeName},
        success: function (obj, textstatus) 
        {
            if( !('error' in obj) )
            {
                selectField = document.getElementById("cl");
                selectField.options[0] = new Option('Datalogger','*');
                for(i=0; i<obj.result.length; i++)
                {
                    let loggerName = obj.result[i]['loggersname'];
                    selectField.options[selectField.length] = new Option(loggerName, loggerName);
                    document.getElementById("cl").innerHTML;
                }
            }
        },
    });


    var CidadeUnidade = null;
    var EstadoUnidade = null;
    var CEP = null;
    jQuery.ajax
    ({
        type: "POST",
        url: 'php/consultahead.php',
        dataType: 'json',
        data: {functionname: "infosUnidade", arguments: unidadeName},
        success: function (obj, textstatus) 
        {
            if( !('error' in obj) )
            {
                CidadeUnidade = obj.result.cidade;
                EstadoUnidade = obj.result.estado;
                CEP = obj.result.cep;
                consultaClima(CidadeUnidade);
               // fetch('https://api.openweathermap.org/data/2.5/weather?zip='+CEP+',br&appid=74b1aa56c1920fe1f2b29ce013e44b2b').then(response=>response.json()).then(data=>console.data).catch(err=>alert("Endereço de unidade não encontrada"));
                console.log(CidadeUnidade);
                console.log(EstadoUnidade);
                console.log(CEP);
            }
        },
    });

    async function consultaClima(CidadeUnidade)
    {
        fetch('https://api.openweathermap.org/data/2.5/weather?q='+CidadeUnidade+',br&units=metric&appid=74b1aa56c1920fe1f2b29ce013e44b2b')
        .then(res=>res.json()).then(data=>
        {
            console.log(data);
            document.getElementById("temp").innerHTML = data['main']['temp'];
            console.log(data['main']['temp']);
        })
        .catch(err=>alert("Endereço de unidade não encontrada"));
        
    }

    
}

