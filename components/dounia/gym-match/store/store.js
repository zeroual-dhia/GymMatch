
//here we just use local storage but when we create the backend it will be changed
function loadProducts() {
    const productList = document.querySelector(".product-grid");

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
        const first=document.createElement('button');
        first.textContent=`-`;
        const sp=document.createElement('span');
        sp.textContent=`${product.quantity}`
        const second=document.createElement('button');
        second.textContent=`+`;
        quantityPara.appendChild(first);
        quantityPara.appendChild(sp);
        quantityPara.appendChild(second);
        productDiv.appendChild(quantityPara);

        if (product.type.toLowerCase() === 'Activewear & Footwear') {
            const sizePara = document.createElement('div');
            sizePara.classList.add('size-buttons');
            sizePara.textContent = `Size: ${product.size}`;
            productDiv.appendChild(sizePara);
        }

        
        const buybotton=document.createElement('button');
        buybotton.classList.add('buy-button');
        buybotton.textContent=`Buy`;
        productDiv.appendChild(buybotton);
        

        
        productList.appendChild(productDiv);
    });
}


window.onload = loadProducts;