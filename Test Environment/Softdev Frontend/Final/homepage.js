// JAVASCRIPT//
//  For triggering a new tab when the "View Details" button is activated 
document.addEventListener("DOMContentLoaded", function() {
    const viewDetailsButtons = document.querySelectorAll(".view-details-button");
    
    viewDetailsButtons.forEach(function(button) {
      button.addEventListener("click", function() {
        // Specify the URL you want to open in the new tab/window
        const detailsPageUrl = "details.html"; // Change this to the actual URL
        
        // Open a new tab/window
        window.open(detailsPageUrl, "_blank");
      });
    });
  });
   //  For triggering a new tab when the cards is clicked 
   document.addEventListener("DOMContentLoaded", function() {
    const cardElements = document.querySelectorAll(".card-sm, .card1, .card2");
    
    cardElements.forEach(function(card) {
      card.addEventListener("click", function() {
        // Specify the URL you want to open in the new tab/window
        const cardDetailsUrl = "card_details.html"; // Change this to the actual URL
        
        // Open a new tab/window
        window.open(cardDetailsUrl, "_blank");
      });
    });
  });
// IMAGE SLIDER
  const initSlider = () => {
    const imageList = document.querySelector(".slider-wrapper .image-list");
    const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
    const sliderScrollbar = document.querySelector(".container .slider-scrollbar");
    const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

    // UPDATES SCROLLBAR THUMB IF IT'S DRAGGED
    scrollbarThumb.addEventListener("mousedown", (e) => {
        const startX = e.clientX;
        const thumbPosition = scrollbarThumb.offsetLeft;

        // UPDATES THUMB POSITION
        const handleMouseMove = (e) => {
            const deltaX = e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;
            const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;
           
            const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
            const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;
           
            scrollbarThumb.style.left = `${boundedPosition}px`;
            imageList.scrollLeft = scrollPosition;
        }

        const handleMouseUp = () => {
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseUp);
        }

        // Cleanup event listeners when the mouse button is released
        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseUp);
    });

    // THE SLIDE IMAGES ACCORDING TO THE SLIDE BUTTON CLICKS
    slideButtons.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-slide" ? -1 : 1;
            const scrollAmount = imageList.clientWidth * direction;
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        });
    });

    const handleSlideButtons = () => {
        slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "block";
        slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "block"; // Removed the extra period before .display
    }

    // Display the scrollbar position based on image scroll
    const updateScrollThumbPosition = () => {
        const scrollPosition = imageList.scrollLeft;
        const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
        scrollbarThumb.style.left = `${thumbPosition}px`; // Fixed the string interpolation
    }

    imageList.addEventListener("scroll", () => {
        handleSlideButtons(); 
        updateScrollThumbPosition();
    });
};

window.addEventListener("load", initSlider);

// IMAGE MODAL
function openModal(image) {
  const modal = document.getElementById('imageModal');
  const modalImage = document.getElementById('modalImage');

  modal.style.display = 'block';
  modalImage.src = image.src;
}

function closeModal() {
  const modal = document.getElementById('imageModal');
  modal.style.display = 'none';
}

window.onclick = function(event) {
  const modal = document.getElementById('imageModal');
  if (event.target === modal) {
      modal.style.display = 'none';
  }
};

