function getInfos(){
    jQuery.ajax
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
                document.getElementById("nomeCliente").placeholder = obj.result['nome'];
                document.getElementById("emailCliente").placeholder = obj.result['email'];
                document.getElementById("Celular").placeholder = obj.result['celular'];
                document.getElementById("Telefone").placeholder = obj.result['telefone'];
                
            }
        },
    });
}

getInfos();