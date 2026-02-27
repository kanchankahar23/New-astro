

  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      0: { slidesPerView: 1 },    
      480: { slidesPerView: 1 },  
      520: { slidesPerView: 2 },  
      992: { slidesPerView: 3 },   
      1200: { slidesPerView: 4 },  
    }
  });

  const wrapper = document.querySelector(".slider-wrapper");
  const slides = document.querySelectorAll(".whiteReview");
  const next = document.querySelector(".next");
  const prev = document.querySelector(".prev");

  let index = 0;
  const total = slides.length;
  const slideWidth = slides[0].offsetWidth + 30;

  function showSlide(i) {
    wrapper.style.transition = "transform 0.6s ease-in-out";
    wrapper.style.transform = `translateX(-${i * slideWidth}px)`;
  }

  function nextSlide() {
    index++;
    if (index >= total) {
  
      wrapper.style.transition = "none";
      index = 0;
      wrapper.style.transform = `translateX(0px)`;
      setTimeout(() => {
        showSlide(index);
      }, 50);
    } else {
      showSlide(index);
    }
  }

  function prevSlide() {
    index--;
    if (index < 0) {
      wrapper.style.transition = "none";
      index = total - 1;
      wrapper.style.transform = `translateX(-${index * slideWidth}px)`;
      setTimeout(() => {
        showSlide(index);
      }, 50);
    } else {
      showSlide(index);
    }
  }

  next.addEventListener("click", () => {
    nextSlide();
    resetAutoSlide();
  });

  prev.addEventListener("click", () => {
    prevSlide();
    resetAutoSlide();
  });

  let autoSlide = setInterval(nextSlide, 3000);

  function resetAutoSlide() {
    clearInterval(autoSlide);
    autoSlide = setInterval(nextSlide, 3000);
  }

  showSlide(index);



  let slideWidth2 = slides[0].offsetWidth + 30;

function updateSlideWidth() {
  
  const margin = window.innerWidth <= 768 ? 0 : 30;
  slideWidth2 = slides[0].offsetWidth + margin;
}

window.addEventListener("resize", () => {
  updateSlideWidth();
  showSlide(index); 
});

updateSlideWidth();

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
  