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