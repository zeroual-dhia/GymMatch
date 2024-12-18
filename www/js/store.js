
document.addEventListener('DOMContentLoaded', function () {
    const productCards = document.querySelectorAll('.product-card');
    const shoppingListContainer = document.getElementById('shopping-list-container');
    const shoppingList = document.getElementById('shopping-list');
    const cartButton = document.querySelector('.cart-button');
    const closeButton = document.getElementById('close-button');
    const cancelButton = document.getElementById('cancel-button');
    const payButton = document.getElementById('pay-button');
    const searchInput = document.getElementById('search-input');
    const categoriesToggle = document.getElementById('categories-toggle');
    const categoryList = document.getElementById('category-list');

    let cart = [];

    // Initially hide the shopping list container and category list
    shoppingListContainer.style.display = 'none';
    categoryList.style.display = 'none'; // Ensure the category list is hidden by default

    productCards.forEach(card => {
        const quantityInput = card.querySelector('.quantity-value');
        const quantityPlusButton = card.querySelector('.quantity-plus');
        const quantityMinusButton = card.querySelector('.quantity-minus');
        const buyButton = card.querySelector('.buy-button');
        const sizeButtons = card.querySelectorAll('.size-button');
        let selectedSize = '';

        // Increase quantity
        quantityPlusButton.addEventListener('click', function () {
            quantityInput.value = parseInt(quantityInput.value) + 1;
        });

        // Decrease quantity
        quantityMinusButton.addEventListener('click', function () {
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        });

        // Size button functionality
        sizeButtons.forEach(sizeButton => {
            sizeButton.addEventListener('click', function () {
                sizeButtons.forEach(btn => {
                    btn.style.backgroundColor = '';
                    btn.style.color = '';
                });

                sizeButton.style.backgroundColor = 'black';
                sizeButton.style.color = 'white';
                selectedSize = sizeButton.innerText;
            });
        });
        buyButton.addEventListener('click', function () {
            const quantity = parseInt(quantityInput.value);
            const productName = card.querySelector('h4').innerText;
            const productPrice = parseFloat(card.querySelector('.price').innerText);
            const productCategory = card.querySelector('img').getAttribute('data-category'); // Retrieve category from the img tag
        
            console.log(`Product Category: ${productCategory}`); // Debugging line
        
            // Skip size selection for specific categories
            if (productCategory !== 'Gym Equipment & Accessories' && productCategory !== 'Supplements & Nutrition') {
                if (!selectedSize) {
                    alert('Please select a size before adding to the cart.');
                    return;
                }
            }
        
            // Check if the product already exists in the cart
            const existingItem = cart.find(item => 
                item.productName === productName && 
                item.selectedSize === (productCategory === 'Gym Equipment & Accessories' || productCategory === 'Supplements & Nutrition' ? null : selectedSize)
            );
        
            if (existingItem) {
                // Increment the quantity of the existing item
                existingItem.quantity += quantity;
            } else {
                // Add a new item to the cart
                cart.push({ 
                    productName, 
                    productPrice, 
                    quantity, 
                    selectedSize: (productCategory === 'Gym Equipment & Accessories' || productCategory === 'Supplements & Nutrition') ? null : selectedSize, 
                    productCategory 
                });
            }
        
            // Construct size message
            const sizeMessage = (productCategory === 'Gym Equipment & Accessories' || productCategory === 'Supplements & Nutrition') ? '' : ` (Size: ${selectedSize})`;
        
            alert(`Added ${quantity} of ${productName}${sizeMessage} at a price of ${productPrice}DA each to your shopping list.`);
        
            updateShoppingList();
        
            // Reset input and button styles
            quantityInput.value = 1;
            sizeButtons.forEach(btn => {
                btn.style.backgroundColor = '';
                btn.style.color = '';
            });
        
            // Reset selectedSize to ensure the user selects a size each time
            selectedSize = '';
        
            setTimeout(() => {
                buyButton.style.backgroundColor = '';
                buyButton.style.color = '';
            }, 1000);
        });
        

    });

    function updateShoppingList() {
        shoppingList.innerHTML = '';
        let totalPrice = 0;

        cart.forEach((item, index) => {
            const li = document.createElement('li');
            li.innerHTML = `${item.productName} (Size: ${item.selectedSize}) - ${item.quantity} x ${item.productPrice}DA 
                <button class="remove-button" data-index="${index}">🗑️</button>`;
            shoppingList.appendChild(li);
            totalPrice += item.productPrice * item.quantity;
        });

        const totalLi = document.createElement('li');
        totalLi.innerHTML = `<strong>Total Price: ${totalPrice.toFixed(2)}DA</strong>`;
        shoppingList.appendChild(totalLi);
    }

    cartButton.addEventListener('click', function () {
        shoppingListContainer.style.display = 'block';
        document.body.style.overflow = 'hidden'; // Disable scrolling
        document.body.style.backgroundColor = 'rgba(0, 0, 0, 0.5)'; // Dim background
    });

    closeButton.addEventListener('click', function () {
        shoppingListContainer.style.display = 'none';
        document.body.style.overflow = ''; // Enable scrolling
        document.body.style.backgroundColor = ''; // Remove dim background
    });

    cancelButton.addEventListener('click', function () {
        cart = [];
        shoppingList.innerHTML = '';
        shoppingListContainer.style.display = 'none';
        document.body.style.overflow = ''; // Enable scrolling
        document.body.style.backgroundColor = ''; // Remove dim background
    });

    payButton.addEventListener('click', function () {
        window.location.href = 'payment_page_link.html';
    });

    shoppingList.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-button')) {
            const index = event.target.getAttribute('data-index');
            cart.splice(index, 1);
            updateShoppingList();
        }
    });

    // Search functionality
    searchInput.addEventListener('input', function () {
        const searchQuery = this.value.toLowerCase();
        productCards.forEach((card) => {
            const productName = card.querySelector(".product-info h4").textContent.toLowerCase();
            if (productName.includes(searchQuery)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    });

    // Toggle the visibility of the category list
    categoriesToggle.addEventListener('click', () => {
        categoryList.style.display = 
            categoryList.style.display === 'block' ? 'none' : 'block';
    });

    // Add click event to category items
    categoryList.querySelectorAll('li').forEach((categoryItem) => {
        categoryItem.addEventListener('click', () => {
            const selectedCategory = categoryItem.textContent;

            // Filter products based on the selected category
            productCards.forEach((card) => {
                const productCategory = card
                    .querySelector('img')
                    .getAttribute('data-category');
                if (productCategory === selectedCategory) {
                    card.style.display = 'block'; // Show matching products
                } else {
                    card.style.display = 'none'; // Hide non-matching products
                }
            });

            // Hide the category list after selection
            categoryList.style.display = 'none';
        });
    });
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

