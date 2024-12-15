
//here we just use local storage but when we create the backend it will be changed
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
}


