/* 
 * Diseñado por EnovaSoft Ingenieria LTDA.
 * Prohibida  su utilización sin previo consentimiento
 * Todos los Derechos Reservados.
 */
var urlbase = "http://localhost/cat";
function ajax(url2, datos, callback)
{

    //checkInternet();
    var retornar = null;
    $.ajax({
        url: url2,
        type: "POST",
        timeout: 10000,
        data: datos,
        headers: {'Access-Control-Allow-Origin': '*'},
        crossDomain: true,
        error: function(jqXHR, textStatus, errorThrown)
        {

        },
        success: function(data)
        {
            retornar = data;
        }
    }).done(function()
    {
        callback(retornar);
    });
}
function conMayusculas(datos) {  
//    alert(datos);
    return datos.toUpperCase();
}

function soloNumeros(event) {
    if (event.shiftKey)
    {
        event.preventDefault();
    }
    if (event.keyCode === 46 || event.keyCode === 8 || event.keyCode === 9 || event.keyCode === 10 || event.keyCode === 37 || event.keyCode === 39) {
    }
    else {
        if (event.keyCode < 95) {
            if (event.keyCode < 48 || event.keyCode > 57) {
                event.preventDefault();
            }
        }
        else {
            if (event.keyCode < 96 || event.keyCode > 105) {
                event.preventDefault();
            }
        }
    }
}
function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 
function validateDocument(document) { 
    if(document>=10000000 && document<=9999999999)
        return true;
    else
        return false;
}

function getRandomArbitrary() {
    var min=1000,max=9999;
    return Math.random() * (max - min) + min;
}


