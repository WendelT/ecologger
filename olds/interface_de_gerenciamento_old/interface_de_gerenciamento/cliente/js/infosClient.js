$(document).ready(
    function(){
        $.ajax({
            type:"POST",
            url:"../cliente/php/verifica_login.php"
        })
    }
);