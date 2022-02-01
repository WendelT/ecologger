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
                console.log(obj.result4);
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
                selectField.options[0] = new Option('Selecione uma Unidade','*');
                for(i=0; i<obj.result.length; i++)
                {
                    let loggerName = obj.result[i]['loggersname'];
                    selectField.options[selectField.length] = new Option(loggerName, loggerName);
                    document.getElementById("cl").innerHTML;
                }
            }
        },
    });
}

