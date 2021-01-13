// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

$height = $(window).height() - ($('header').height() + $('footer').height())
$('.content').css('min-height' , $height)

$('.option-list-toggle-btn').on('click', function (){
    $('.option-list-toggle').slideToggle();
})
$('.vacancy-list-toggle-btn').on('click', function (){
    $('.vacancy-list').slideToggle();
})


var tahoe = {

    resorts: ["Kirkwood","Squaw","Alpine","Heavenly","Northstar"], print: (delay=1000) => {

        setTimeout(() => {

            console.log(this.resorts.join(","))

        }, delay)

    }

}

tahoe.print()



var tahoe = {

    resorts: ["Kirkwood","Squaw","Alpine","Heavenly","Northstar"], print: function(delay=1000) {

        setTimeout(() => {
            console.log(this)

            console.log(this === window)

        }, delay)

    }

}

tahoe.print()


















