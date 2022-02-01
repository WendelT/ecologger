const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const nUnidadeGet = urlParams.get('unit');
console.log(nUnidadeGet);
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
                console.log(obj.result);
                if(obj.result == null)
                {
                    obj.result = '0';
                }
                document.getElementById("potinsta").innerHTML = obj.result;
            }
        },
    });

}

