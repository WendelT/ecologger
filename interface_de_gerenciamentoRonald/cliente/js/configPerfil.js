function getInfos()
{
    JQuery.ajax
    ({
        type: "POST",
        url: 'php/consultahead.php',
        dataType: 'json',
        data: {functionname: "consultUserInfos"},
        success: function (obj, textstatus) 
        {
            if( !('error' in obj) )
            {
                console.log(obj.result);
                //document.getElementById("potUsina").innerHTML = obj.result;
            }
        },
    });
}

getInfos();