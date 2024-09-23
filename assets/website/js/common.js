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



    // Show modal on page load if cookies are not accepted
    document.addEventListener('DOMContentLoaded', function () {
      if (!localStorage.getItem('cookiesAccepted')) {
        var cookieModal = new bootstrap.Modal(document.getElementById('cookieModal'), {
          backdrop: 'static',
          keyboard: false
        });
        cookieModal.show();
      }

      // Handle the accept cookies button
      document.getElementById('acceptCookies').addEventListener('click', function () {
        localStorage.setItem('cookiesAccepted', 'true');
        bootstrap.Modal.getInstance(document.getElementById('cookieModal')).hide();
      });

      // Handle the decline cookies button
      document.getElementById('declineCookies').addEventListener('click', function () {
        alert('You declined cookies, certain functionalities may not work.');
        bootstrap.Modal.getInstance(document.getElementById('cookieModal')).hide();
      });
    });
  