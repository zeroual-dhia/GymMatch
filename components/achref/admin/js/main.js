(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });


    // Progress Bar
    $('.pg-bar').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, {offset: '80%'});


   


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
        nav : false
    });


    // Chart Global Color
    Chart.defaults.color = "#6C7293";
    Chart.defaults.borderColor = "#000000";


    // Worldwide Sales Chart
    var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
    var myChart1 = new Chart(ctx1, {
        type: "bar",
        data: {
            labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
            datasets: [{
                    label: "USA",
                    data: [15, 30, 55, 65, 60, 80, 95],
                    backgroundColor: "rgba(235, 22, 22, .7)"
                },
                {
                    label: "UK",
                    data: [8, 35, 40, 60, 70, 55, 75],
                    backgroundColor: "rgba(235, 22, 22, .5)"
                },
                {
                    label: "AU",
                    data: [12, 25, 45, 55, 65, 70, 60],
                    backgroundColor: "rgba(235, 22, 22, .3)"
                }
            ]
            },
        options: {
            responsive: true
        }
    });


    // Salse & Revenue Chart
    var ctx2 = $("#salse-revenue").get(0).getContext("2d");
    var myChart2 = new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
            datasets: [{
                    label: "Salse",
                    data: [15, 30, 55, 45, 70, 65, 85],
                    backgroundColor: "rgba(235, 22, 22, .7)",
                    fill: true
                },
                {
                    label: "Revenue",
                    data: [99, 135, 170, 130, 190, 180, 270],
                    backgroundColor: "rgba(235, 22, 22, .5)",
                    fill: true
                }
            ]
            },
        options: {
            responsive: true
        }
    });
    


    // Single Line Chart
    var ctx3 = $("#line-chart").get(0).getContext("2d");
    var myChart3 = new Chart(ctx3, {
        type: "line",
        data: {
            labels: [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150],
            datasets: [{
                label: "Salse",
                fill: false,
                backgroundColor: "rgba(235, 22, 22, .7)",
                data: [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15]
            }]
        },
        options: {
            responsive: true
        }
    });


    // Single Bar Chart
    var ctx4 = $("#bar-chart").get(0).getContext("2d");
    var myChart4 = new Chart(ctx4, {
        type: "bar",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [{
                backgroundColor: [
                    "rgba(235, 22, 22, .7)",
                    "rgba(235, 22, 22, .6)",
                    "rgba(235, 22, 22, .5)",
                    "rgba(235, 22, 22, .4)",
                    "rgba(235, 22, 22, .3)"
                ],
                data: [55, 49, 44, 24, 15]
            }]
        },
        options: {
            responsive: true
        }
    });



})(jQuery);



function submitForm() {//addproduct form validation
    let productImage = document.getElementById('productImage');
    let productName = document.getElementById('productName');
    let productQuantity = document.getElementById('productQuantity');
    let productType = document.getElementById('productType');
    let productSize = document.querySelector(".productSize");
    let productPrice = document.getElementById('productPrice');

    
    const file = productImage.files[0];
    if (!file) {
        alert('Please select an image file.');
        return;
    }
    if (file && !file.type.startsWith('image/')) {
        alert('Please select a valid image file.');
        return;
    }

    
    
    if (!productName.value.trim() || !productQuantity.value.trim() || 
    !productType.value.trim() || !productPrice.value.trim()) {
    alert('Please fill in all required fields.');
    return;
}


const quantity = parseInt(productQuantity.value);
const price = parseFloat(productPrice.value);
if (isNaN(quantity) || quantity <= 0) {
    alert('Quantity must be a positive number.');
    return;
}
if (isNaN(price) || price <= 0) {
    alert('Price must be a positive number.');
    return;
}

if (productType.value.trim().toLowerCase() === 'Activewear & Footwear' && productSize.value === "") {
    alert('Please select a size for Activewear & Footwear.');
    return;
}






const reader = new FileReader();
    reader.onload = function(e) {
        const productData = {
            image: e.target.result,  // Base64 encoded image
            name: productName.value,
            quantity: productQuantity.value,
            type: productType.value,
            size: productSize.value,
            price: productPrice.value,
        };

        // Get existing products from Local Storage or create a new array
        const products = JSON.parse(localStorage.getItem('products')) || [];
        products.push(productData);

        // Save updated product list to Local Storage
        localStorage.setItem('products', JSON.stringify(products));




    
    productImage.value = '';
    productName.value = '';
    productQuantity.value = '';
    productType.value = '';
    productSize.value = '';
    productPrice.value = '';

    alert('Product added successfully!')};
    reader.readAsDataURL(productImage.files[0]);
}

