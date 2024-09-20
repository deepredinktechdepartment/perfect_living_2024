// Header Fxed custom js
// jQuery(document).ready(function($) {    
// window.onscroll = function() {myFunction()};
            
//     var header = document.getElementById("main-header");
//     var sticky = header.offsetTop;
    
//     function myFunction() {
//       if (window.scrollY > sticky) {
//         header.classList.add("fixed-top");
//       } else {
//         header.classList.remove("fixed-top");
//       }
      
//     }
// });

// Show or hide the "Go to Top" button based on scroll position
window.onscroll = function() {
    let button = document.getElementById('go-to-top');
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        button.style.display = 'block';
    } else {
        button.style.display = 'none';
    }
};

// Scroll to the top of the document
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}