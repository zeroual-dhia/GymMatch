buyButton.addEventListener("click", function (event) {
  event.preventDefault(); // Prevent the default action (form submission or page reload)

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

  // Check if the product already exists in the cart
  const existingItem = cart.find(
    (item) =>
      item.productName === productName &&
      item.selectedSize ===
        (productCategory === "Gym Equipment & Accessories" ||
        productCategory === "Supplements & Nutrition"
          ? null
          : selectedSize)
  );

  // Construct size message
  const sizeMessage =
    productCategory === "Gym Equipment & Accessories" ||
    productCategory === "Supplements & Nutrition"
      ? ""
      : ` (Size: ${selectedSize})`;

  alert(
    `Added ${quantity} of ${productName}${sizeMessage} at a price of ${productPrice}DA each to your shopping list.`
  );

  updateShoppingList(); // Update the shopping list immediately

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

document.querySelector(".cart-button").addEventListener("click", function () {
  const shoppingListContainer = document.getElementById(
    "shopping-list-container"
  );
  shoppingListContainer.style.display =
    shoppingListContainer.style.display === "none" ? "block" : "none";
});
document.querySelector(".quantity-plus").addEventListener("click", function () {
  let quantityInput = document.querySelector(".quantity-value");
  let currentValue = parseInt(quantityInput.value);
  quantityInput.value = currentValue + 1;
});

document
  .querySelector(".quantity-minus")
  .addEventListener("click", function () {
    let quantityInput = document.querySelector(".quantity-value");
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
      // Don't allow value to go below 1
      quantityInput.value = currentValue - 1;
    }
  });
/*
=======
document.addEventListener("DOMContentLoaded", loadProducts);
//here we just use local storage but when we create the backend it will be changed
>>>>>>> 502a48cc456723ac789687177578f76b5fcbcc82
function loadProducts() {
    const productList = document.querySelector(".product-grid");
    const loadingMessage = document.getElementById("loading-message");

    // Show loading message
    loadingMessage.style.display = "block";

    // Retrieve products from Local Storage
    const products = JSON.parse(localStorage.getItem('products')) || [];

    // Display each product
    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.classList.add('product-card');

        const img = document.createElement('img');
        img.src = product.image;
        img.alt = product.name;
        img.width = 100;
        productDiv.appendChild(img);

        const namePara = document.createElement('h4');
        namePara.textContent = `${product.name}`;
        productDiv.appendChild(namePara);

        const pricePara = document.createElement('div');
        pricePara.classList.add('price');
        pricePara.textContent = `${product.price}DA`;
        productDiv.appendChild(pricePara);

        const typePara = document.createElement('div');
        typePara.classList.add('category');
        typePara.textContent = `${product.type}`;
        productDiv.appendChild(typePara);

        const quantityPara = document.createElement('div');
        quantityPara.classList.add('quantity-buttons');
        const first = document.createElement('button');
        first.classList.add('quantity-minus'); // Add class for minus button
        first.textContent = `-`;
        const sp = document.createElement('span');
        sp.classList.add('quantity-value'); // Add class for quantity value
        sp.textContent = `${product.quantity}`;
        const second = document.createElement('button');
        second.classList.add('quantity-plus'); // Add class for plus button
        second.textContent = `+`;
        quantityPara.appendChild(first);
        quantityPara.appendChild(sp);
        quantityPara.appendChild(second);
        productDiv.appendChild(quantityPara);

        if (product.type.toLowerCase() === 'activewear & footwear') {
            const sizePara = document.createElement('div');
            sizePara.classList.add('size-buttons');
            sizePara.textContent = `Size: ${product.size}`;
            productDiv.appendChild(sizePara);
        }

        const buyButton = document.createElement('button');
        buyButton.classList.add('buy-button');
        buyButton.textContent = `Buy`;
        productDiv.appendChild(buyButton);

        productList.appendChild(productDiv);
    });

    // Hide loading message
    loadingMessage.style.display = "none";

<<<<<<< HEAD

window.onload = loadProducts;*/
