// Fancy Box Js
Fancybox.bind('[data-fancybox="banner_gallery"]', {
    // Your custom options for a specific gallery
});

Fancybox.bind('[data-fancybox="floorplan_images"]', {
    // Your custom options for a specific gallery
});


// // Home Page Search bar with Dropdown Start
// const dropdown = document.getElementById('categoryDropdown');
// const searchInput = document.getElementById('searchInput');
// const items = dropdown.querySelectorAll('.dropdown-item');
// const headers = dropdown.querySelectorAll('.dropdown-header'); // Category headers
// const filteredResults = document.getElementById('filteredResults');

// // Sample data that represents the items you want to filter
// const data = [
//     { title: 'Apple', subcategory: 'Apple' },
//     { title: 'Mango', subcategory: 'Mango' },
//     { title: 'Banana', subcategory: 'Banana' },
//     { title: 'Leo', subcategory: 'Leo' },
//     { title: 'Spiderman', subcategory: 'Spiderman' }
// ];

// function filterDropdown() {
//     const searchTerm = searchInput.value.toLowerCase();
//     let matches = 0;
//     let categoryVisible = false;

//     // Hide/show dropdown items based on search term
//     items.forEach(item => {
//         const text = item.textContent.toLowerCase();
//         const header = item.previousElementSibling; // Check if there's a header before this item

//         // Show or hide items based on search term
//         if (text.includes(searchTerm)) {
//             item.style.display = 'block';
//             matches++;
//             categoryVisible = true; // At least one item in this category matches
//         } else {
//             item.style.display = 'none';
//         }

//         // Ensure the header is visible if any item in its category is visible
//         if (header && header.classList.contains('dropdown-header')) {
//             if (categoryVisible) {
//                 header.style.display = 'block';
//             } else {
//                 header.style.display = 'none';
//             }
//         }

//         // Reset category visibility when moving to the next header
//         if (!item.nextElementSibling || item.nextElementSibling.classList.contains('dropdown-header')) {
//             categoryVisible = false;
//         }
//     });

//     // Show dropdown only if there are matching items
//     dropdown.style.display = matches > 0 && searchTerm ? 'block' : 'none';
// }

// // When an item is clicked, fill the input with its value and filter results
// items.forEach(item => {
//     item.addEventListener('click', function (e) {
//         e.preventDefault();
//         const category = this.getAttribute('data-category');
//         const subcategory = this.getAttribute('data-value');
//         searchInput.value = this.textContent;
//         dropdown.style.display = 'none'; // Hide dropdown after selection
//         console.log('Selected Category:', category, 'Selected Subcategory:', subcategory);
//         filterResults(category, subcategory);
//     });
// });

// // Function to filter data based on selected category and subcategory
// function filterResults(category, subcategory) {
//     // Clear previous results
//     filteredResults.innerHTML = '';

//     // Filter data and display matching results
//     const filteredData = data.filter(item => item.category === category && item.subcategory === subcategory);

//     if (filteredData.length > 0) {
//         filteredData.forEach(item => {
//             const li = document.createElement('li');
//             li.className = 'list-group-item';
//             li.textContent = `${item.title} - ${item.category} - ${item.subcategory}`;
//             filteredResults.appendChild(li);
//         });
//     } else {
//         const li = document.createElement('li');
//         li.className = 'list-group-item';
//         li.textContent = 'No results found';
//         filteredResults.appendChild(li);
//     }
// }




// // When an item is clicked, fill the input with its value and filter results
// items.forEach(item => {
//     item.addEventListener('click', function (e) {
//         e.preventDefault();
//         const category = this.getAttribute('data-category');
//         const subcategory = this.getAttribute('data-value');
//         searchInput.value = this.textContent;
//         dropdown.style.display = 'none'; // Hide dropdown after selection
//         console.log('Selected Category:', category, 'Selected Subcategory:', subcategory);
//         filterResults(category, subcategory);
//     });
// });

// // Function to filter data based on selected category and subcategory
// function filterResults(category, subcategory) {
//     // Clear previous results
//     filteredResults.innerHTML = '';

//     // Filter data and display matching results
//     const filteredData = data.filter(item => item.category === category && item.subcategory === subcategory);

//     if (filteredData.length > 0) {
//         filteredData.forEach(item => {
//             const li = document.createElement('li');
//             li.className = 'list-group-item';
//             li.textContent = `${item.title} - ${item.category} - ${item.subcategory}`;
//             filteredResults.appendChild(li);
//         });
//     } else {
//         const li = document.createElement('li');
//         li.className = 'list-group-item';
//         li.textContent = 'No results found';
//         filteredResults.appendChild(li);
//     }
// }
// // Home Page Search bar with Dropdown End




// slick slidesr Js


$('.three_slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
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
            arrows: true,
        }
    }]
});

$('.featured-properties-slider').slick({
    slidesToShow: 2,
    slidesToScroll: 2,
    autoplay: false,
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
            arrows: true,
        }
    }]
});


$('.highlights-images-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
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

$(document).ready(function() {
    $('.floorplans-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
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
    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
        $('.tab-pane .floorplans-slider').slick('setPosition');
    });
});

if (window.matchMedia("(max-width: 768px)").matches) {
    /* the viewport is less than 768 pixels wide */
    $('.amenities-slider').slick({
    slidesToShow: 5,
    slidesToScroll: 5,
    autoplay: true,
    autoplaySpeed: 5000,
    pauseOnHover:true,
    dots: true,
    fade: false,
    arrows: false,
    infinite: false,
    loop: false,
    responsive:[
    {
       breakpoint:480,
       settings:
       {
          slidesToShow:3,
          slidesToScroll:3,
       }
    }
 ]
});
  } 



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