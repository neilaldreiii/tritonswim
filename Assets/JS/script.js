$(document).ready(function () {
    
    $('#devs').click(function () {
        $('#devs-display').toggle();
    });
    
    $(window).scroll(function () {

        if ($(document).scrollTop() > 120) {

            $('#navigation').addClass('shrink');

        } else {

            $('#navigation').removeClass('shrink');

        }
    });
    
    $('#dropdown-nav').click(function () {
        $('#navigation-links').toggle();
    });
    
    $('#dropbtnEvents').click(function () {
        
        $('#dropdownEvents').toggle();
        $('#dropdownMember').hide();
        
    });
    
    $('#dropbtnMember').click(function () {
        
        $('#dropdownMember').toggle();
        $('#dropdownEvents').hide();
        
        
    });
    
    $('#successBtn').click(function () {
        
        $('#successMsg').fadeOut('fast');
        
    });
    
    $(window).click(function () {
        $('#successMsg').fadeOut('fast');
    });
    
    $('#closeimg').click(function () {
        $('#maximizeView').hide();
    });
    
    $('#closeAthlete').click(function () {
        $('#athleteMax').hide();
    });
    
    $('#closeproducts').click(function () {
        $('#productsDisplay').hide();
    });
});

var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("slide");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1} 
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 5000);
}