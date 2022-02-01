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
                if(obj.result == null)
                {
                    obj.result = '0';
                }
                document.getElementById("enerGerada").innerHTML = obj.result + " kWh";
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

