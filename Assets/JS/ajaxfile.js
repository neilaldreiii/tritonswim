function imgPreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#athletePrev')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function galleryPrev(photo) {
    
    if (photo.files && photo.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#galleryPrev')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(photo.files[0]);
    }
    
}

function eventPrev(events) {
    
    if (events.files && events.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#eventPrev')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(events.files[0]);
    }
    
}

function productPreview(product) {
    
    if (product.files && product.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#prodPrev')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(product.files[0]);
    }
    
}

function adsPreview(ad) {
    
    if (ad.files && ad.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#adPrev')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(ad.files[0]);
    }
    
}
function remove(athlete) {
        
    if (window.XMLHttpRequest) {
	
	   xmlhttp = new XMLHttpRequest();

    } else {
    
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            document.getElementById('confirmRemove').innerHTML = xmlhttp.responseText;
            
        }
    }
    
    parameters = 'remove='+athlete.value;

    xmlhttp.open('POST', 'ajaxfile.php', true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send(parameters);
    
}

function deleteImg(galleryimg) {
        
    if (window.XMLHttpRequest) {
	
	   xmlhttp = new XMLHttpRequest();

    } else {
    
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            document.getElementById('confirmimgRemove').innerHTML = xmlhttp.responseText;
            
        }
    }
    
    parameters = 'deleteimg='+galleryimg.value;

    xmlhttp.open('POST', 'ajaxfile.php', true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send(parameters);
    
}

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

function deleteProduct(product) {
        
    if (window.XMLHttpRequest) {
	
	   xmlhttp = new XMLHttpRequest();

    } else {
    
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            document.getElementById('productRemove').innerHTML = xmlhttp.responseText;
            
        }
    }
    
    parameters = 'removeproduct='+product.value;

    xmlhttp.open('POST', 'ajaxfile.php', true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send(parameters);
    
}
function removebm(bm) {
        
    if (window.XMLHttpRequest) {
	
	   xmlhttp = new XMLHttpRequest();

    } else {
    
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            document.getElementById('confirmbmRemove').innerHTML = xmlhttp.responseText;
            
        }
    }
    
    parameters = 'removebm='+bm.value;

    xmlhttp.open('POST', 'ajaxfile.php', true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send(parameters);
    
}

function removead(ad) {
        
    if (window.XMLHttpRequest) {
	
	   xmlhttp = new XMLHttpRequest();

    } else {
    
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            document.getElementById('confirmadRemove').innerHTML = xmlhttp.responseText;
            
        }
    }
    
    parameters = 'removead='+ad.value;

    xmlhttp.open('POST', 'ajaxfile.php', true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send(parameters);
    
}

function productContacts() {
    $("#productOverlay").css("display", "flex");
}

function removeEvents(events) {
        
    if (window.XMLHttpRequest) {
	
	   xmlhttp = new XMLHttpRequest();

    } else {
    
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            document.getElementById('confirmEventRemove').innerHTML = xmlhttp.responseText;
            
        }
    }
    
    parameters = 'removeevent='+events.value;

    xmlhttp.open('POST', 'ajaxfile.php', true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send(parameters);
    
}

function removeReg(reg) {
        
    if (window.XMLHttpRequest) {
	
	   xmlhttp = new XMLHttpRequest();

    } else {
    
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            document.getElementById('confirmRegRemove').innerHTML = xmlhttp.responseText;
            
        }
    }
    
    parameters = 'removereg='+reg.value;

    xmlhttp.open('POST', 'ajaxfile.php', true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send(parameters);
    
}

function removeslide(slide) {
        
    if (window.XMLHttpRequest) {
	
	   xmlhttp = new XMLHttpRequest();

    } else {
    
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            document.getElementById('confirmSlideRemove').innerHTML = xmlhttp.responseText;
            
        }
    }
    
    parameters = 'removeslide='+slide.value;

    xmlhttp.open('POST', 'ajaxfile.php', true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send(parameters);
    
}

function showProduct(productmax) {
    
    $('#productsDisplay').css("display", "block");
    
    if (window.XMLHttpRequest) {
	
	   xmlhttp = new XMLHttpRequest();

    } else {
    
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            document.getElementById('mainproduct').innerHTML = xmlhttp.responseText;
            
        }
    }
    
    parameters = 'showProduct='+productmax.value;

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