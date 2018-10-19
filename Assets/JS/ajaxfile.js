function maximizeImg(imgtomax) {
    
    $('#maximizeView').css("display", "flex");
    
    if (window.XMLHttpRequest) {
	
	   xmlhttp = new XMLHttpRequest();

    } else {
    
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            document.getElementById('imgView').innerHTML = xmlhttp.responseText;
            
        }
    }
    
    parameters = 'maximize='+imgtomax.value;

    xmlhttp.open('POST', 'ajaxfile.php', true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send(parameters);
    
}

function viewAthlete(athlete) {
    
    $('#athleteMax').css("display", "flex");
    
    if (window.XMLHttpRequest) {
	
	   xmlhttp = new XMLHttpRequest();

    } else {
    
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            document.getElementById('viewAthlete').innerHTML = xmlhttp.responseText;
            
        }
    }
    
    parameters = 'athlete='+athlete.value;

    xmlhttp.open('POST', 'ajaxfile.php', true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    
    xmlhttp.send(parameters);
    
}

function register() {
    if (window.XMLHttpRequest) {
	
        xmlhttp = new XMLHttpRequest();
 
     } else {
     
         xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
     }
 
     xmlhttp.onreadystatechange = function() {
 
         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
             
             document.getElementById('register').innerHTML = xmlhttp.responseText;
             
         }
     }
     
     parameters = 'reg_username='+document.getElementById("username").value
     +'&reg_password='+document.getElementById("password").value
     +'&reg_code='+document.getElementById("verificationCode").value
     +'&reg_fname='+document.getElementById("firstName").value
     +'&reg_lname='+document.getElementById("lastName").value;
 
     xmlhttp.open('POST', 'ajaxfile.php', true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send(parameters);
}

function getVerification(key) {
    
    if (window.XMLHttpRequest) {
	
	   xmlhttp = new XMLHttpRequest();

    } else {
    
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            document.getElementById('keyDisplay').innerHTML = xmlhttp.responseText;
            
        }
    }
    
    parameters = 'generate='+key.value;

    xmlhttp.open('POST', 'ajaxfile.php', true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send(parameters);
}
function deleteField(id, field, message) {
    if (window.XMLHttpRequest) {
	
        xmlhttp = new XMLHttpRequest();
 
     } else {
     
         xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
     }
 
     xmlhttp.onreadystatechange = function() {
 
         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
             
             document.getElementById(message).innerHTML = xmlhttp.responseText;
             
         }
     }
     
     parameters = 'id='+id.value +
     '&field='+field;
 
     xmlhttp.open('POST', 'ajaxfile.php', true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send(parameters);
}

function order(id,fname, add, sz) {

    if (window.XMLHttpRequest) {
	
        xmlhttp = new XMLHttpRequest();
 
     } else {
     
         xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
     }
 
     xmlhttp.onreadystatechange = function() {
 
         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
             
             document.getElementById('productOrderPreview').innerHTML = xmlhttp.responseText;
             
         }
     }
     
     parameters = 'pro_fname='+document.getElementById(fname).value
     +'&pro_add='+document.getElementById(add).value
     +'&pro_size='+document.getElementById(sz).value
     +'&productID='+id.value;
 
     xmlhttp.open('POST', 'ajaxfile.php', true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send(parameters);
}

function sendMessage() {

    if (window.XMLHttpRequest) {
	
        xmlhttp = new XMLHttpRequest();
 
     } else {
     
         xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
     }
 
     xmlhttp.onreadystatechange = function() {
 
         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
             
             document.getElementById('messagePreview').innerHTML = xmlhttp.responseText;
             
         }
     }
     
     parameters = 'message='+document.getElementById('message').value;
 
     xmlhttp.open('POST', 'ajaxfile.php', true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send(parameters);
     document.getElementById('message').value = '';
}

function updateMessage() {
    
    if (window.XMLHttpRequest) {
	
	   xmlhttp = new XMLHttpRequest();

    } else {
    
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            document.getElementById('messagePreview').innerHTML = xmlhttp.responseText;
            
        }
    }

    xmlhttp.open('GET', 'updatemessage.php' , true);
    xmlhttp.send();
}

setInterval(function() {updateMessage()}, 200);

function scrollToBottom() {

    var log = $('#messagePreview');
    log.animate({ scrollTop: log.prop('scrollHeight')}, 0);
}