document.addEventListener('DOMContentLoaded', () => {
    const popupContainer = document.getElementById('rs-popupContainer');
    const closePopupBtn = document.getElementById('rs-closePopupBtn');

    // Function to get today's date in YYYY-MM-DD format
    function getTodayDate() {
        const today = new Date();
        return today.toISOString().split('T')[0];
    }

    // Function to show the popup
    function showPopup() {
        const lastShownDate = localStorage.getItem('popupLastShown');
        const todayDate = getTodayDate();
        // popupContainer.style.display = 'flex';
        if (lastShownDate !== todayDate) {
            popupContainer.style.display = 'flex';
        }
    }

    // Function to close the popup
    function closePopup() {
        popupContainer.style.display = 'none';
        // Update the date in localStorage
        localStorage.setItem('popupLastShown', getTodayDate());
    }

    // Attach event listeners to close the popup
    closePopupBtn.addEventListener('click', closePopup);
    window.addEventListener('click', function (event) {
        if (event.target == popupContainer) {
            closePopup();
        }
    });

    // Show the popup on initial page load
    showPopup();

    // Pause animations on hover logic
    const mainContainer = document.querySelector('.rs-slider-container');
    const sliderContainers = document.querySelectorAll('.rs-pricing-cards');
    let isPaused = false;

    const setAnimationState = (state) => {
        sliderContainers.forEach((container) => {
            container.style.animationPlayState = state;
        });
    };

    mainContainer.addEventListener('mouseover', () => {
        if (!isPaused) {
            setAnimationState('paused');
            isPaused = true;
        }
    });
    mainContainer.addEventListener('mouseout', () => {
        if (isPaused) {
            setAnimationState('running');
            isPaused = false;
        }
    });
    mainContainer.addEventListener('click', () => {
        setAnimationState('paused');
        isPaused = true;
    });
    document.addEventListener('click', (event) => {
        if (!mainContainer.contains(event.target)) {
            setAnimationState('running');
            isPaused = false;
        }
    });
});
