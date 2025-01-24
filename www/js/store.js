document.addEventListener("DOMContentLoaded", function () {
  const productCards = document.querySelectorAll(".product-card");
  const shoppingListContainer = document.getElementById(
    "shopping-list-container"
  );
  const shoppingList = document.getElementById("shopping-list");
  const cartButton = document.querySelector(".cart-button");
  const closeButton = document.getElementById("close-button");
  const cancelButton = document.getElementById("cancel-button");
  const payButton = document.getElementById("pay-button");
  const searchInput = document.getElementById("search-input");
  const categoriesToggle = document.getElementById("categories-toggle");
  const categoryList = document.getElementById("category-list");

  // Initially hide the shopping list container and category list
  shoppingListContainer.style.display = "none";
  categoryList.style.display = "none"; // Ensure the category list is hidden by default

  productCards.forEach((card) => {
    const quantityInput = card.querySelector(".quantity-value");
    const quantityPlusButton = card.querySelector(".quantity-plus");
    const quantityMinusButton = card.querySelector(".quantity-minus");
    const buyButton = card.querySelector(".buy-button");
    const sizeButtons = card.querySelectorAll(".size-button");
    let selectedSize = "";

    // Increase quantity
    quantityPlusButton.addEventListener("click", function () {
      quantityInput.value = parseInt(quantityInput.value) + 1;
    });

    // Decrease quantity
    quantityMinusButton.addEventListener("click", function () {
      if (parseInt(quantityInput.value) > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
      }
    });

    // Size button functionality
    sizeButtons.forEach((sizeButton) => {
      sizeButton.addEventListener("click", function () {
        sizeButtons.forEach((btn) => {
          btn.style.backgroundColor = "";
          btn.style.color = "";
        });

        sizeButton.style.backgroundColor = "black";
        sizeButton.style.color = "white";
        selectedSize = sizeButton.innerText;
      });
    });
    
    buyButton.addEventListener("click", function () {
      const quantity = parseInt(quantityInput.value);
      const productName = card.querySelector("h4").innerText;
      const productPrice = parseFloat(card.querySelector(".price").innerText);
      const productCategory = card
        .querySelector("img")
        .getAttribute("data-category"); // Retrieve category from the img tag

      console.log(`Product Category: ${productCategory}`); // Debugging line

      // Skip size selection for specific categories
      if (
        productCategory !== "Gym Equipment & Accessories" &&
        productCategory !== "Supplements & Nutrition"
      ) {
        if (!selectedSize) {
          alert("Please select a size before adding to the cart.");
          return;
        }
      }

      // Construct size message
      const sizeMessage =
        productCategory === "Gym Equipment & Accessories" ||
        productCategory === "Supplements & Nutrition"
          ? ""
          : ` (Size: ${selectedSize})`;

      alert(
        `Added ${quantity} of ${productName}${sizeMessage} at a price of ${productPrice}DA each to your shopping list.`
      );

      // Reset input and button styles
      quantityInput.value = 1;
      sizeButtons.forEach((btn) => {
        btn.style.backgroundColor = "";
        btn.style.color = "";
      });

      // Reset selectedSize to ensure the user selects a size each time
      selectedSize = "";

      setTimeout(() => {
        buyButton.style.backgroundColor = "";
        buyButton.style.color = "";
      }, 1000);
    });
  });

  cartButton.addEventListener("click", function () {
    shoppingListContainer.style.display = "block";
    document.body.style.overflow = "hidden"; // Disable scrolling
    document.body.style.backgroundColor = "rgba(0, 0, 0, 0.5)"; // Dim background
  });

  closeButton.addEventListener("click", function () {
    shoppingListContainer.style.display = "none";
    document.body.style.overflow = ""; // Enable scrolling
    document.body.style.backgroundColor = ""; // Remove dim background
  });

  cancelButton.addEventListener("click", function () {
    cart = [];
    shoppingList.innerHTML = "";
    shoppingListContainer.style.display = "none";
    document.body.style.overflow = ""; // Enable scrolling
    document.body.style.backgroundColor = ""; // Remove dim background
  });

  shoppingList.addEventListener("click", function (event) {
    if (event.target.classList.contains("remove-button")) {
      const index = event.target.getAttribute("data-index");
      cart.splice(index, 1);
      updateShoppingList();
    }
  });

  // Search functionality
  searchInput.addEventListener("input", function () {
    const searchQuery = this.value.toLowerCase();
    productCards.forEach((card) => {
      const productName = card
        .querySelector(".product-info h4")
        .textContent.toLowerCase();
      if (productName.includes(searchQuery)) {
        card.style.display = "block";
      } else {
        card.style.display = "none";
      }
    });
  });

  // Toggle the visibility of the category list
  categoriesToggle.addEventListener("click", () => {
    categoryList.style.display =
      categoryList.style.display === "block" ? "none" : "block";
  });

  // Add click event to category items
  categoryList.querySelectorAll("li").forEach((categoryItem) => {
    categoryItem.addEventListener("click", () => {
      const selectedCategory = categoryItem.textContent;

      // Filter products based on the selected category
      productCards.forEach((card) => {
        const productCategory = card
          .querySelector("img")
          .getAttribute("data-category");
        if (productCategory === selectedCategory) {
          card.style.display = "block"; // Show matching products
        } else {
          card.style.display = "none"; // Hide non-matching products
        }
      });

      // Hide the category list after selection
      categoryList.style.display = "none";
    });
  });
});

