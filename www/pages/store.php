<<<<<<< HEAD
=======
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


>>>>>>> 164ea9324a3bcabde90551f62a1f20ea01892ecf
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
<<<<<<< HEAD
            <img id='logo' src="/assets/logo/logo.png" alt="">
=======
            <img id='logo' src="../assets/logo/logo.png" alt="">
>>>>>>> 164ea9324a3bcabde90551f62a1f20ea01892ecf
            <p class="text-light GYMMATCH">GYM MATCH</p>
        </div>
       

        <nav class="links">
<<<<<<< HEAD
            <a href="../pages/home.html" class="active">Home</a>
            <a href="../pages/about_us.html">About us</a>
            <a href="../pages/explore.html">Explore</a>
            <a href="../pages/programs.html">Programs</a>
            <a href="../pages/store.html">Store</a>
=======
            <a href="../pages/home.php" class="active">Home</a>
            <a href="../pages/about_us.php">About us</a>
            <a href="../pages/explore.php">Explore</a>
            <a href="../pages/programs.php">Programs</a>
            <a href="../pages/store.php">Store</a>
>>>>>>> 164ea9324a3bcabde90551f62a1f20ea01892ecf

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
<<<<<<< HEAD
                            <a href="../pages/index.html"><i class="fa fa-home"></i> Home</a>
=======
                            <a href="./store.php"><i class="fa fa-home"></i> Home</a>
>>>>>>> 164ea9324a3bcabde90551f62a1f20ea01892ecf
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
<<<<<<< HEAD
   <section class="product-grid">
    <!-- Example of a Product Card -->
    <div class="product-card" data-id="1">
        <img src="../assets/images/imgstore/workset1.jpg" alt="Product Image" data-category="Activewear & Footwear">
        <div class="product-info">
            <h4>black Workout Set</h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
        <div class="size-buttons">
            <button class="size-button">S</button>
            <button class="size-button">M</button>
            <button class="size-button">L</button>
            <button class="size-button">XL</button>
        </div>
        <button class="buy-button">Buy</button>
    </div>
    <div class="product-card" data-id="1">
        <img src="../assets/images/imgstore/workset2.jpg" alt="Product Image" data-category="Activewear & Footwear">
        <div class="product-info">
            <h4>White Workout Set</h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
        <div class="size-buttons">
            <button class="size-button">S</button>
            <button class="size-button">M</button>
            <button class="size-button">L</button>
            <button class="size-button">XL</button>
        </div>
        <button class="buy-button">Buy</button>
    </div>
    <div class="product-card" data-id="2">
        <img src="../assets/images/imgstore/workset3.jpg" alt="Product Image" data-category="Activewear & Footwear">
        <div class="product-info">
            <h4>gray Workout Set</h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
        <div class="size-buttons">
            <button class="size-button">S</button>
            <button class="size-button">M</button>
            <button class="size-button">L</button>
            <button class="size-button">XL</button>
        </div>
        <button class="buy-button">Buy</button>
    </div>
    <div class="product-card" data-id="3">
        <img src="../assets/images/imgstore/workset4.jpg" alt="Product Image" data-category="Activewear & Footwear">
        <div class="product-info">
            <h4>green Workout Set</h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
        <div class="size-buttons">
            <button class="size-button">S</button>
            <button class="size-button">M</button>
            <button class="size-button">L</button>
            <button class="size-button">XL</button>
        </div>
        <button class="buy-button">Buy</button>
    </div>
    <div class="product-card" data-id="4">
        <img src="../assets/images/imgstore/hoodies1.jpg" alt="Product Image" data-category="Activewear & Footwear">
        <div class="product-info">
            <h4>black hoodie</h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
        <div class="size-buttons">
            <button class="size-button">S</button>
            <button class="size-button">M</button>
            <button class="size-button">L</button>
            <button class="size-button">XL</button>
        </div>
        <button class="buy-button">Buy</button>
    </div>
    <div class="product-card" data-id="5">
        <img src="../assets/images/imgstore/hoodies2.jpg" alt="Product Image" data-category="Activewear & Footwear">
        <div class="product-info">
            <h4>black hoodie</h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
        <div class="size-buttons">
            <button class="size-button">S</button>
            <button class="size-button">M</button>
            <button class="size-button">L</button>
            <button class="size-button">XL</button>
        </div>
        <button class="buy-button">Buy</button>
    </div>

    <div class="product-card" data-id="6">
        <img src="../assets/images/imgstore/shoes1.jpg" alt="Product Image" data-category="Activewear & Footwear">
        <div class="product-info">
            <h4>black shoes</h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
        <div class="size-buttons">
            <button class="size-button">36</button>
            <button class="size-button">38</button>
            <button class="size-button">40</button>
            <button class="size-button">42</button>
        </div>
        <button class="buy-button">Buy</button>
    </div>
    <div class="product-card" data-id="7">
        <img src="../assets/images/imgstore/shoes2.jpg" alt="Product Image" data-category="Activewear & Footwear">
        <div class="product-info">
            <h4>white shoes </h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
        <div class="size-buttons">
            <button class="size-button">36</button>
            <button class="size-button">38</button>
            <button class="size-button">40</button>
            <button class="size-button">42</button>
        </div>
        <button class="buy-button">Buy</button>
    </div>
    <div class="product-card" data-id="8">
        <img src="../assets/images/imgstore/resistance-bands.jpg" alt="Product Image" data-category="Gym Equipment & Accessories">
        <div class="product-info">
            <h4>resistance bands</h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
        <button class="buy-button">Buy</button>
    </div>

    <div class="product-card" data-id="9">
        <img src="../assets/images/imgstore/resistance-bands2.jpg" alt="Product Image" data-category="Gym Equipment & Accessories">
        <div class="product-info">
            <h4>resistance bands</h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
       
        <button class="buy-button">Buy</button>
    </div>
    <div class="product-card" data-id="10">
        <img src="../assets/images/imgstore/jump-ropes.jpg" alt="Product Image" data-category="Gym Equipment & Accessories">
        <div class="product-info">
            <h4>jump jump-ropes</h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
        <button class="buy-button">Buy</button>
    </div>
    <div class="product-card" data-id="11">
        <img src="../assets/images/imgstore/protain.jpg" alt="Product Image" data-category="Supplements & Nutrition">
        <div class="product-info">
            <h4>protain</h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
        <button class="buy-button">Buy</button>
    </div>
    <div class="product-card" data-id="12">
        <img src="../assets/images/imgstore/creatine.jpg" alt="Product Image" data-category="Supplements & Nutrition">
        <div class="product-info">
            <h4>creatine</h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
        <button class="buy-button">Buy</button>
    </div>
    <div class="product-card" data-id="13">
        <img src="../assets/images/imgstore/energy-bars.jpg" alt="Product Image" data-category="Supplements & Nutrition">
        <div class="product-info">
            <h4>energy bars</h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
        <button class="buy-button">Buy</button>
    </div>
    <div class="product-card" data-id="14">
        <img src="../assets/images/imgstore/hydration-drinks.jpg" alt="Product Image" data-category="Supplements & Nutrition">
        <div class="product-info">
            <h4>hydration drinks</h4>
            <div class="price">3000DA</div>
        </div>
        <div class="quantity-buttons">
            <button class="quantity-minus">-</button>
            <input type="number" class="quantity-value" value="1" min="1">
            <button class="quantity-plus">+</button>
        </div>
        <button class="buy-button">Buy</button>
    </div>
</section>
=======
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
              if (isset($row['product_img']) && !empty($row['product_img'])) {
                $imageData = base64_encode($row['product_img']);
                $imageSrc = 'data:image/png;base64,' . $imageData;
                echo "<img src=\"$imageSrc\" alt=\"Product Image\" >";
            } 
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
>>>>>>> 164ea9324a3bcabde90551f62a1f20ea01892ecf



</body>
</html>

