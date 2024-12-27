(function ($) {
  "use strict";

  // Spinner
  var spinner = function () {
    setTimeout(function () {
      if ($("#spinner").length > 0) {
        $("#spinner").removeClass("show");
      }
    }, 1);
  };
  spinner();

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    return false;
  });

  // Sidebar Toggler
  $(".sidebar-toggler").click(function () {
    $(".sidebar, .content").toggleClass("open");
    return false;
  });

  // Progress Bar
  $(".pg-bar").waypoint(
    function () {
      $(".progress .progress-bar").each(function () {
        $(this).css("width", $(this).attr("aria-valuenow") + "%");
      });
    },
    { offset: "80%" }
  );

  // Testimonials carousel
  $(".testimonial-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 1000,
    items: 1,
    dots: true,
    loop: true,
    nav: false,
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
      datasets: [
        {
          label: "USA",
          data: [15, 30, 55, 65, 60, 80, 95],
          backgroundColor: "rgba(235, 22, 22, .7)",
        },
        {
          label: "UK",
          data: [8, 35, 40, 60, 70, 55, 75],
          backgroundColor: "rgba(235, 22, 22, .5)",
        },
        {
          label: "AU",
          data: [12, 25, 45, 55, 65, 70, 60],
          backgroundColor: "rgba(235, 22, 22, .3)",
        },
      ],
    },
    options: {
      responsive: true,
    },
  });

  // Salse & Revenue Chart
  var ctx2 = $("#salse-revenue").get(0).getContext("2d");
  var myChart2 = new Chart(ctx2, {
    type: "line",
    data: {
      labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
      datasets: [
        {
          label: "Salse",
          data: [15, 30, 55, 45, 70, 65, 85],
          backgroundColor: "rgba(235, 22, 22, .7)",
          fill: true,
        },
        {
          label: "Revenue",
          data: [99, 135, 170, 130, 190, 180, 270],
          backgroundColor: "rgba(235, 22, 22, .5)",
          fill: true,
        },
      ],
    },
    options: {
      responsive: true,
    },
  });

  // Single Line Chart
})(jQuery);

document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelector("#forming")
    .addEventListener("submit", function (event) {
      console.log("Form submission intercepted.");
      event.preventDefault();

      const productImage = document.getElementById("productImage");
      const productName = document.getElementById("productName");
      const productQuantity = document.getElementById("productQuantity");
      const productType = document.getElementById("productType");
      const productSize = document.querySelector(".productSize");
      const productPrice = document.getElementById("productPrice");

      console.log("Inputs fetched:", {
        productImage,
        productName,
        productQuantity,
        productType,
        productSize,
        productPrice,
      });

      let valid = true;

      // Validate Image
      const file = productImage.files[0];
      if (!file) {
        console.log("No file selected.");
        alert("Please select a picture of the product.");
        valid = false;
      } else {
        const allowedExtensions = ["jpg", "jpeg", "png", "gif"];
        const fileExtension = file.name.split(".").pop().toLowerCase();
        if (!allowedExtensions.includes(fileExtension)) {
          console.log("Invalid file type.");
          alert(
            "Invalid file type. Please select a valid image (JPG, JPEG, PNG, GIF)."
          );
          valid = false;
        }
      }

      // Validate Name
      if (!productName.value.trim()) {
        console.log("Product name missing.");
        alert("Product name is required.");
        valid = false;
      }

      // Validate Quantity
      const quantity = parseInt(productQuantity.value);
      if (isNaN(quantity) || quantity <= 0) {
        console.log("Invalid quantity.");
        alert("Please enter a valid product quantity (greater than 0).");
        valid = false;
      }

      // Validate Type
      if (!productType.value.trim()) {
        console.log("Product type missing.");
        alert("Product type is required.");
        valid = false;
      }

      // Validate Price
      const price = parseFloat(productPrice.value);
      if (isNaN(price) || price <= 0) {
        console.log("Invalid price.");
        alert("Please enter a valid product price (greater than 0).");
        valid = false;
      }

      // Validate Size

      console.log("Form validation result:", valid);

      if (valid) {
        console.log("Form is valid. Submitting...");
        event.target.submit();
      } else {
        console.log("Form is invalid. Submission prevented.");
      }
    });
});
