jQuery(document).ready(function($) {
    window.onscroll = function() {myFunction()};   
    var header = document.getElementById("main-header");
    var sticky = header.offsetTop;
    
    function myFunction() {
      if (window.scrollY > sticky) {
        header.classList.add("fixed-top");
      } else {
        header.classList.remove("fixed-top");
      }
      
    }
    
    });