<?php

try {
    require_once "../includes/dbh.inc.php";
    $query="SELECT * FROM products;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo=null;
    $stmt=null;
} catch (PDOException $e) {
    die("query faild : " . $e->getMessage());
    //throw $th;
}
    



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Page</title>
    <link rel="stylesheet" href="../css/store.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/preloader.css">
    <script src="../js/header.js"></script>
    <script src="../js/store.js"></script>
</head>
<body>  
     <!-- Page Preloder -->
   <div id="preloder">
    <div class="loader"></div>
    </div> 

    <header class="header2">
        <div class="logo-name">
            <img id='logo' src="/assets/logo/logo.png" alt="">
            <p class="text-light GYMMATCH">GYM MATCH</p>
        </div>
       

        <nav class="links">
            <a href="../pages/home.html" class="active">Home</a>
            <a href="../pages/about_us.html">About us</a>
            <a href="../pages/explore.html">Explore</a>
            <a href="../pages/programs.html">Programs</a>
            <a href="../pages/store.html">Store</a>

            <div class="dropdown">
                <button id="profile-btn" class="profile-btn">
                    <img src="../assets/icons/profile.png" alt="Profile" />
                </button>
                <div class="dropdown-content">
                    <a href="login.html">Sign In</a>
                    <a href="#signout">Sign Out</a>
                </div>
                
            </div>

            
        </nav>

        <button id="menu-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
        aria-controls="offcanvasWithBothOptions"><img src="../assets/icons/icons8-menu.svg" alt=""></button>

    </header>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg">
        <div class="container">
            <div class="row">
                <center>
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Our Store</h2>
                        <div class="bt-option">
                            <a href="../pages/index.html"><i class="fa fa-home"></i> Home</a>
                            <span>Store</span>
                        </div>
                    </div>
                </div>
            </center>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="search-section">
        <!-- Categories Button -->
        <button class="categories-button" id="categories-toggle">Categories</button>
        
        <!-- Category List (Dropdown) -->
        <div class="category-list" id="category-list">
            <ul>
                <li>Supplements & Nutrition</li>
                <li>Activewear & Footwear</li>
                <li>Gym Equipment & Accessories</li>
            </ul>
        </div>
        
        <!-- Search Container -->
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-bar" id="search-input" placeholder="Search for items...">
        </div>
        
        <!-- Cart Button -->
        <button class="cart-button">
            <i class="fas fa-shopping-cart"></i> Cart
        </button>
    </section>
    
  <!-- Shopping List Container (hidden by default) -->
       <div id="shopping-list-container" class="shopping-list-container" style="display:none;">
            <div class="shopping-list-header">
              <button id="close-button" class="close-button">X</button>
              <h2>Your Shopping List</h2>
            </div>

            <ul id="shopping-list"></ul>

             <div class="shopping-list-footer">
                <button id="cancel-button" class="cancel-button">Cancel</button>
                <button id="pay-button" class="pay-button">Pay</button>
            </div>
        </div>
        
       
 
    <section class="section-parag">
        <div class="section-title">
            <h2>Welcome to GymMatch Store!</h2>
            <p><strong> GymMatch, we are dedicated to providing top-quality fitness essentials to support your goals. Our store is organized into three categories: Supplements & Nutrition for premium protein powders and energy boosters, Activewear & Footwear for stylish and durable workout clothing, and Gym Equipment for all your training needs, including dumbbells and yoga mats. For your convenience, we offer flexible payment options—choose to pay securely online or select cash-on-delivery with our hand-to-hand payment at delivery. Shop with GymMatch Store and elevate your fitness journey with everything you need!</strong></p>
        </div>
    </section>


      <!-- Product Grid Section -->
      <?php
      if(empty($results)){
          echo "<div>";
          echo "<p> there is no product </p>";
          echo "</div>";
  
  
  
      }
      else{
          echo '<section class="product-grid">';
          foreach ($results as $row){
  
            
              echo '<div class="product-card" data-id="1">';
              echo "<div class=\"product-info\">" ;
              echo "<h4>";
              echo htmlspecialchars($row["product_name"]) ; 
              echo "</h4>";
              echo "<div class=\"price\">";
              echo htmlspecialchars($row["product_prix"]) . ' DA';
              echo "</div>";
              echo "</div>";
              if(isset($row["product_quantity"]) || isset($row["quantity_36"]) ){
  
                echo   '<div class="quantity-buttons">';
              echo '<button class="quantity-minus">-</button>';
              echo ' <input type="number" class="quantity-value" value="1" min="1">';
              echo '<button class="quantity-plus">+</button>';
             echo "</div>";
             echo '<div class="size-buttons">';
             echo '<button class="size-button">36</button>';
             echo '<button class="size-button">38</button>';
             echo' <button class="size-button">40</button>';
              echo' <button class="size-button">42</button>';
              echo '</div>';
              }
  
  
  
              echo '<button class="buy-button">Buy</button>';
  
              echo "</div>";
              
              
          }
          echo '</section>';
      }
      
      
      ?>



</body>
</html>

