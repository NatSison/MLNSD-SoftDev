  // Select all elements with the class "button-value" (category buttons).
  document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll(".button-value");
  
  // Select all elements with the class "card-sm" (product containers).
  const productContainers = document.querySelectorAll(".card-sm");

  // Add a click event listener to each category button.
  buttons.forEach(function (button) {
    button.addEventListener("click", function () {
     
        const category = button.textContent.toLowerCase();
      
      // Call the filterProducts function to show or hide products based on the selected category.
      filterProducts(category);
    });
  });

  // Function to filter and display products based on the selected category.
  function filterProducts(category) {
    productContainers.forEach(function (container) {
    
      const productCategory = container
        .querySelector(".product-name")
        .textContent.toLowerCase();

      // If the selected category is "all" or the product name includes the selected category, display the product.
      if (category === "all" || productCategory.includes(category)) {
        container.style.display = "block";
      } else {
        // Otherwise, hide the product container.
        container.style.display = "none";
      }
    });
  }
});

