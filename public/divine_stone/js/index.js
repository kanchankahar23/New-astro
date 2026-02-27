const search_section = document.getElementsByClassName('search')[0];
const cross_btn = document.getElementsByClassName('fa-circle-xmark')[0];
const like = document.getElementById('like');
const like_background = document.getElementById('like-background');
const body = document.getElementsByTagName('body');
const price = document.getElementById('price');
const jwellery = document.getElementById('Jewellery-type');
const product = document.getElementById('product-category');
const shop = document.getElementById('Shop-for');
const karatage = document.getElementById('karatage');
const metal = document.getElementById('metal');
const diamond = document.getElementById('diamond-clarity');
const style = document.getElementById('style');
const size = document.getElementById('size');
const tryOn = document.getElementById('try-on');
const availability = document.getElementById('availability');


function hiddenSearchBar() {
    // Use getComputedStyle to read the actual display property
    if (getComputedStyle(search_section).display === 'none') {
        search_section.style.display = 'block'; // Show the element
        // document.body.style.opacity= 0.3;
        document.body.style.overflow = 'hidden';

    }
}

function closeSearch() {
    if (getComputedStyle(search_section).display === 'block') {
        search_section.style.display = 'none'; // Show the element
        document.body.style.opacity = 1;
        document.body.style.overflow = 'auto';
    }
}

function closeHelp() {
    like.style.opacity = 0;
    document.body.style.opacity = 1;
    // slider.style.opacity=1;
    document.body.style.overflow = 'auto';
    like_background.style.display = 'none';
}
function displayLike() {
    like.style.opacity = 1;
    // like.style.position='fixed';
    //  document.body.style.opacity= 0.3;
    //  slider.style.opacity=0.3;
    document.body.style.overflow = 'hidden';
    // like_background.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
    like_background.style.display = 'block';

}


function showPrice() {
    price.style.display = 'block';
    jwellery.style.display = 'none';
    product.style.display = 'none';
    shop.style.display = 'none';
    karatage.style.display = 'none';
    metal.style.display = 'none';
    diamond.style.display = 'none';
    style.style.display = 'none';
    size.style.display = 'none';
    tryOn.style.display = 'none';
    availability.style.display = 'none';
}
function showJwelleryprice() {
    price.style.display = 'none';
    jwellery.style.display = 'block';
    product.style.display = 'none';
    shop.style.display = 'none';
    karatage.style.display = 'none';
    metal.style.display = 'none';
    diamond.style.display = 'none';
    style.style.display = 'none';
    size.style.display = 'none';
    tryOn.style.display = 'none';
    availability.style.display = 'none';
}

function showProduct() {
    price.style.display = 'none';
    jwellery.style.display = 'none';
    product.style.display = 'block';
    shop.style.display = 'none';
    karatage.style.display = 'none';
    metal.style.display = 'none';
    diamond.style.display = 'none';
    style.style.display = 'none';
    size.style.display = 'none';
    tryOn.style.display = 'none';
    availability.style.display = 'none';
}
function showShop() {
    price.style.display = 'none';
    jwellery.style.display = 'none';
    product.style.display = 'none';
    shop.style.display = 'block';
    karatage.style.display = 'none';
    metal.style.display = 'none';
    diamond.style.display = 'none';
    style.style.display = 'none';
    size.style.display = 'none';
    tryOn.style.display = 'none';
    availability.style.display = 'none';
}
function showKaratage() {
    price.style.display = 'none';
    jwellery.style.display = 'none';
    product.style.display = 'none';
    shop.style.display = 'none';
    karatage.style.display = 'block';
    metal.style.display = 'none';
    diamond.style.display = 'none';
    style.style.display = 'none';
    size.style.display = 'none';
    tryOn.style.display = 'none';
    availability.style.display = 'none';
}
function showMetal() {
    price.style.display = 'none';
    jwellery.style.display = 'none';
    product.style.display = 'none';
    shop.style.display = 'none';
    karatage.style.display = 'none';
    metal.style.display = 'block';
    diamond.style.display = 'none';
    style.style.display = 'none';
    size.style.display = 'none';
    tryOn.style.display = 'none';
    availability.style.display = 'none';
}

function showKDiamond() {
    price.style.display = 'none';
    jwellery.style.display = 'none';
    product.style.display = 'none';
    shop.style.display = 'none';
    karatage.style.display = 'none';
    metal.style.display = 'none';
    diamond.style.display = 'block';
    style.style.display = 'none';
    size.style.display = 'none';
    tryOn.style.display = 'none';
    availability.style.display = 'none';
}

function showStyle() {
    price.style.display = 'none';
    jwellery.style.display = 'none';
    product.style.display = 'none';
    shop.style.display = 'none';
    karatage.style.display = 'none';
    metal.style.display = 'none';
    diamond.style.display = 'none';
    style.style.display = 'block';
    size.style.display = 'none';
    tryOn.style.display = 'none';
    availability.style.display = 'none';
}

function showSize() {
    price.style.display = 'none';
    jwellery.style.display = 'none';
    product.style.display = 'none';
    shop.style.display = 'none';
    karatage.style.display = 'none';
    metal.style.display = 'none';
    diamond.style.display = 'none';
    style.style.display = 'none';
    size.style.display = 'block';
    tryOn.style.display = 'none';
    availability.style.display = 'none';
}

function showTry() {
    price.style.display = 'none';
    jwellery.style.display = 'none';
    product.style.display = 'none';
    shop.style.display = 'none';
    karatage.style.display = 'none';
    metal.style.display = 'none';
    diamond.style.display = 'none';
    style.style.display = 'none';
    size.style.display = 'none';
    tryOn.style.display = 'block';
    availability.style.display = 'none';
}

function showavailable() {
    price.style.display = 'none';
    jwellery.style.display = 'none';
    product.style.display = 'none';
    shop.style.display = 'none';
    karatage.style.display = 'none';
    metal.style.display = 'none';
    diamond.style.display = 'none';
    style.style.display = 'none';
    size.style.display = 'none';
    tryOn.style.display = 'none';
    availability.style.display = 'block';
}


const selected = document.querySelector('.select-selected');
const items = document.querySelector('.select-items');

// Toggle the dropdown
selected.addEventListener('click', () => {
    items.style.display = items.style.display === 'block' ? 'none' : 'block';
});

// Update the selected option
items.addEventListener('click', (event) => {
    const option = event.target.closest('div'); // Get the clicked option
    if (option) {
        const img = option.querySelector('img').src;
        const text = option.textContent.trim();

        // Update the selected display
        selected.innerHTML = `<img src="${img}" alt="${text}"> ${text}`;
        items.style.display = 'none'; // Hide the dropdown
    }
});

// Close dropdown when clicking outside
document.addEventListener('click', (event) => {
    if (!event.target.closest('.custom-select')) {
        items.style.display = 'none';
    }
});


// Get all filter options
document.querySelectorAll('.filters li').forEach(option => {
    option.addEventListener('click', function () {
        // Find the tick icon inside the clicked option
        const tick = this.querySelector('i');

        // Toggle visibility class
        if (tick) {
            tick.style.display = tick.style.display === 'none' || tick.style.display === '' ? 'inline-block' : 'none';
        }
    });
});

// Ensure all tick icons are hidden by default
document.querySelectorAll('.filters li i').forEach(tick => {
    tick.style.display = 'none';
});

const selectedOption = document.querySelector('.selected-option');
const dropdownOptions = document.querySelector('.dropdown-options');
const dropdownArrow = document.getElementById('dropdown-arrow');

// Toggle dropdown visibility
selectedOption.addEventListener('click', () => {
    dropdownOptions.classList.toggle('hidden');
    dropdownArrow.classList.toggle('rotated');
});

// Change selected option
dropdownOptions.addEventListener('click', (event) => {
    const option = event.target.closest('.dropdown-option');
    if (option) {
        const flagSrc = option.querySelector('img.flag').src;
        const countryName = option.querySelector('span').textContent;

        // Update the selected option
        selectedOption.querySelector('img.flag').src = flagSrc;
        selectedOption.querySelector('span').textContent = countryName;

        // Hide dropdown
        dropdownOptions.classList.add('hidden');
        dropdownArrow.classList.remove('rotated');
    }
});

const varticalNav = document.getElementById('vertical-nav-background');

function displayVerticalNav() {
    varticalNav.style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function hideVerticalNav() {
    varticalNav.style.display = 'none';
    document.body.style.overflow = 'auto';
}

const vertical_login_closebutton = document.getElementsByClassName('close_vertical-login')[0];
const verticalLogin = document.getElementsByClassName('verticalLogin')[0];
const verticalNav = document.getElementById('vertical-nav-background');
function closeVerticalLogin() {
    verticalLogin.style.opacity = 0;
    verticalLogin.style.zIndex = -1;
    // body.style.opacity= 1;
    document.body.style.overflow = 'auto';
    verticalNav.style.display = 'auto';
}
function displayVerticalLogin() {
    verticalLogin.style.opacity = 1;
    // body.style.opacity= 0.3;
    verticalLogin.style.zIndex = 10;
    document.body.style.overflow = 'none';
    verticalNav.style.display = 'none';

}

// main slider
const slider = document.querySelector('.slider');
const slides = document.querySelectorAll('.slide');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');
const dots = document.querySelectorAll('.dot');
const sliderContainer = document.querySelector('.slider-container');

let currentIndex = 0; // Tracks the current slide index
let autoSlideInterval; // Will hold the interval ID for auto-sliding

// Function to update the active dot indicator
function updateDots() {
    dots.forEach((dot, index) => {
        if (index === currentIndex) {
            dot.classList.add('active');
        } else {
            dot.classList.remove('active');
        }
    });
}

// Function to display a specific slide based on the index
function showSlides(index) {
    if (index >= slides.length) {
        currentIndex = 0; // Reset to first slide if at the end
    } else if (index < 0) {
        currentIndex = slides.length - 1; // Go to last slide if at the beginning
    } else {
        currentIndex = index; // Otherwise, set to the provided index
    }
    slider.style.transform = `translateX(-${currentIndex * 100}%)`; // Slide transition
    updateDots(); // Update the dots to reflect the current slide
}

// Function to move to the next slide
function nextSlide() {
    showSlides(currentIndex + 1);
}

// Function to move to the previous slide
function prevSlide() {
    showSlides(currentIndex - 1);
}

// Start the automatic sliding of images
function startAutoSlide() {
    autoSlideInterval = setInterval(nextSlide, 4000); // Slide every 4 seconds
}

// Stop the automatic sliding
function stopAutoSlide() {
    clearInterval(autoSlideInterval); // Clear the interval
}

// Add click event listeners to dots for direct slide navigation
dots.forEach(dot => {
    dot.addEventListener('click', () => {
        stopAutoSlide(); // Stop auto-slide when manually selecting a slide
        showSlides(parseInt(dot.dataset.index)); // Show the selected slide
        startAutoSlide(); // Restart auto-slide
    });
});

// Add event listeners for navigation buttons
nextBtn.addEventListener('click', nextSlide);
prevBtn.addEventListener('click', prevSlide);

// Stop auto-slide when the mouse enters the slider container
sliderContainer.addEventListener('mouseover', stopAutoSlide);

// Restart auto-slide when the mouse leaves the slider container
sliderContainer.addEventListener('mouseout', startAutoSlide);

// Start auto-slide when the page loads
startAutoSlide();
updateDots(); // Initialize the dots

//displaying nav ber after some scrolling
// const hiddenNav = document.querySelector('nav');
// const slider_background=document.getElementsByClassName('background')[0];
//         window.addEventListener('scroll', () => {
//             const scrollPosition = window.scrollY || document.documentElement.scrollTop;
//             const triggerPoint = 50; // Adjust the scroll threshold in pixels

//             if (scrollPosition > triggerPoint) {
//                 hiddenNav.style.opacity = 1;
//                 slider_background.style.top='50px';
//             }else {
//                 hiddenNav.style.opacity = 0; // Hide the nav
//                 slider_background.style.top='0px';
//             }
//  });



let currentIdx = 0;

function updateSliderPosition() {
    const slider = document.getElementById("slider");
    const offset = -currentIdx * 100;
    slider.style.transform = `translateX(${offset}%)`;
}

function changeSlide(direction) {
    const slides = document.querySelectorAll(".row");
    currentIdx = (currentIdx + direction + slides.length) % slides.length;
    updateSliderPosition();
}



const slider2 = document.querySelector(".slider1");
const slides2 = document.querySelectorAll(".slide1");
const prevButton = document.getElementById("prev1");
const nextButton = document.getElementById("next1");

let currentIndex2 = 0;
const visibleSlides = 4; // Number of images visible at once

function updateSliderPosition() {
    const slideWidth = slides2[0].offsetWidth;  // Get width of a single slide
    const offset = -(currentIndex2 * slideWidth);  // Calculate the translation in pixels
    slider2.style.transform = `translateX(${offset}px)`;  // Use pixels
}

function updateNavigationButtons() {
    prevButton.disabled = currentIndex2 === 0;  // Disable prev button if at the start
    nextButton.disabled = currentIndex2 >= slides2.length - visibleSlides;  // Disable next button if at the end
}

nextButton.addEventListener("click", () => {
    if (currentIndex2 < slides2.length - visibleSlides) {
        currentIndex2++;
        updateSliderPosition();
        updateNavigationButtons();
    }
});

prevButton.addEventListener("click", () => {
    if (currentIndex2 > 0) {
        currentIndex2--;
        updateSliderPosition();
        updateNavigationButtons();
    }
});

// Initial setup
updateSliderPosition();
updateNavigationButtons();



// flex image slider
let currentSlide = 0;

function changeSlide(direction) {
    const slider = document.getElementById('slider');
    const slides = document.querySelectorAll('.slider .row');
    const totalSlides = slides.length;

    // Calculate the next slide index
    currentSlide = (currentSlide + direction + totalSlides) % totalSlides;

    // Set the transform property to slide
    slider.style.transform = `translateX(-${currentSlide * 100}%)`;
}

// Automatically slide every 5 seconds (optional)
// setInterval(() => changeSlide(1), 5000);

function displaylogin() {
    const likeText = document.getElementById('like-text');
    const likeLogin = document.getElementById('like-login');

    likeText.style.display = 'none'; // Hide the "Sign In or Sign Up" section
    likeLogin.style.display = 'block'; // Show the "Sign In" section
}

function backloginbtn() {
    const likeText = document.getElementById('like-text');
    const likeLogin = document.getElementById('like-login');

    likeText.style.display = 'block';
    likeLogin.style.display = 'none';
}
