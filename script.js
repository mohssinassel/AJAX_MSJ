
function sendMessage() {
    
    var nom = document.getElementById('nom').value;
    var message = document.getElementById('message').value;



    var xhr = new XMLHttpRequest();

    
    xhr.open('POST', 'envoi_msj.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');


    xhr.onload = function () {
       
    console.log(xhr.responseText);
    document.getElementById('message').value = '';
    };

    xhr.send('nom=' + encodeURIComponent(nom) + '&message=' + encodeURIComponent(message));

    
}
