// Fancy Box Js
Fancybox.bind('[data-fancybox="floorplan_images"]', {
    // Your custom options for a specific gallery

});

// slick slidesr Js

$('.highlights-images-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    pauseOnHover: true,
    dots: false,
    fade: false,
    arrows: true,
    infinite: true,
    responsive: [{
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            fade: false,
            arrows: false,
        }
    }]
});

$(document).ready(function(){
$('.floorplans-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    pauseOnHover: true,
    dots: false,
    fade: false,
    arrows: true,
    infinite: true,
    responsive: [{
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            fade: false,
            arrows: false,
        }
    }]
  });
// Reinitialize slider when switching between tabs
$('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
  $('.tab-pane .floorplans-slider').slick('setPosition');
});
});

// Review Js
const stars = document.querySelectorAll('.star');
stars.forEach(star => {
    star.addEventListener('click', () => {
        const value = star.getAttribute('data-value');
        
        // Remove selection from all stars
        stars.forEach(s => s.classList.remove('selected'));
        
        // Add selection to clicked star and previous ones
        star.classList.add('selected');
        for (let i = 0; i < stars.length; i++) {
            if (stars[i].getAttribute('data-value') <= value) {
                stars[i].classList.add('selected');
            }
        }
        
        console.log(`You rated: ${value} stars`);
    });
});