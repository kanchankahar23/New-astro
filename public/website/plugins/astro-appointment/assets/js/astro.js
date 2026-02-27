document.addEventListener("DOMContentLoaded", () => {
    const outerheader = document.querySelector(".outerheader");
    const listitems = document.querySelectorAll(".listitems");
    const whiteLogos = document.querySelectorAll(".white-logo");
    const blackLogos = document.querySelectorAll(".black-logo");

    const updateHeaderStyle = () => {
      if (window.scrollY > 5) {
        outerheader.style.background = "white";
        outerheader.style.boxShadow = "0 0 4px -1px #66676b";
        listitems.forEach((e) => {
          e.style.color = "black";
        });
        whiteLogos.forEach((logo) => {
          logo.classList.add("hidden");
        });
        blackLogos.forEach((logo) => {
          logo.classList.remove("hidden");
        });
      } else {
        outerheader.style.background = "transparent";
        outerheader.style.boxShadow = "none";
        listitems.forEach((e) => {
          e.style.color = "white";
        });
        whiteLogos.forEach((logo) => {
          logo.classList.remove("hidden");
        });
        blackLogos.forEach((logo) => {
          logo.classList.add("hidden");
        });
      }
    };

    updateHeaderStyle();

    window.addEventListener("scroll", updateHeaderStyle);
  });


  function StatusModal(url) {
    $.get(url, function(rs) {
        $('#astrologerModel').html(rs);
        $('#astrologerModel').modal('show');
    });
}

  // Wait for DOM content to be loaded
  document.addEventListener("DOMContentLoaded", function() {
    // Select the response element
    var response = document.getElementById('response');
    // If response element exists
    if (response) {
        // Set timeout to remove the response after 3 seconds
        setTimeout(function() {
            response.remove();
        }, 10000); // 3000 milliseconds = 3 seconds
    }
});

var countDownDate = new Date("Aug 20, 2024 15:00:00").getTime();

// Update the count down every 1 second
var countdownFunction = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the elements with respective class names
  document.querySelector(".days").innerText = days;
  document.querySelector(".hours").innerText = hours;
  document.querySelector(".minpoints").innerText = minutes;
  document.querySelector(".seconds").innerText = seconds;

  // If the count down is over, display some text
  if (distance < 0) {
    clearInterval(countdownFunction);
    document.querySelector(".countdown-timer").innerHTML = "EXPIRED";
  }
}, 1000);
    
        let currentActiveIndex = 0;
        let allClients = document.querySelectorAll('.clients');
        allClients[0].classList.add('active')


        function handleNext() {
            let nexActiveIndex = (currentActiveIndex + 1) % allClients.length;

            allClients[currentActiveIndex].classList.remove('active')
            allClients[nexActiveIndex].classList.add('active')
            currentActiveIndex = nexActiveIndex;
        }

        setInterval(() => {
            handleNext()
        }, 3000)
    
        

        