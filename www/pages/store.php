<?php
//session_start();// Start the session to access session variables

// Check if user_id is set
if (!isset($_SESSION['user_id'])) {
    die("User not logged in");
}

$userId = $_SESSION['user_id']; // Assuming the user is logged in

try {
    // Correct database connection path
    require_once "www/includes/dbh.inc.php";
    
    // Query to fetch all products with quantity > 0
    $productQuery = "SELECT * FROM products"; 
    
    $productStmt = $pdo->prepare($productQuery);
    $productStmt->execute();
    $results = $productStmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all products
    
    // Query to fetch cart items for the user, along with product details
    $cartQuery = "SELECT ci.product_id, ci.quantity, p.product_name, ci.total_price
                  FROM cart ci
                  INNER JOIN products p ON ci.product_id = p.product_id
                  WHERE ci.user_id = :user_id";
    
    $cartStmt = $pdo->prepare($cartQuery);
    $cartStmt->execute([':user_id' => $userId]);
    $cartItems = $cartStmt->fetchAll(PDO::FETCH_ASSOC); // Fetch cart items for the logged-in user
    $totalCartPrice = isset($_SESSION["total_cart_price"]) ? $_SESSION["total_cart_price"] : 0;
    $pdo = null; // Close the connection
    $productStmt = null; // Clear the product statement
    $cartStmt = null; // Clear the cart statement
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Page</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/GymPath/www/css/store.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/GymPath/www/css/header.css">
    <link rel="stylesheet" href="/GymPath/www/css/preloader.css">
    <link rel="stylesheet" href="www/css/header.css">

  
    <link rel="stylesheet" href="www/css/footer.css">
</head>
<body>  
     <!-- Page Preloder -->
   <div id="preloder">
    <div class="loader"></div>
    </div> 

    <?php include 'header.php' ?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg">
        <div class="container">
            <div class="row">
                <center>
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Our Store</h2>
                        <div class="bt-option">
                            <a href="www/assets/images/store.jpeg"><i class="fa fa-home"></i> Home</a>
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

           
    <ul id="shopping-list">
        <?php
        if (empty($cartItems)) {
            echo "<p>Your shopping list is empty.</p>";
        } else {
            foreach ($cartItems as $index => $item) {
                echo '<li class="shopping-item">';
                echo '<span class="product-name">' . htmlspecialchars($item["product_name"]) . '</span>';
                echo '<span class="product-quantity">Quantity: ' . $item["quantity"] . '</span>';
                echo '<span class="product-price">' . htmlspecialchars($item["total_price"]) . ' DA</span>';
               

                echo'<form method="POST" action="/GymPath/www/includes/remove_item.php">';
                echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($item['product_id']) . '">';
    echo '<button type="submit"  data-index="' . $index . '">🗑</button>';
echo'</form>';
                
                echo '</li>';
            }
            echo '    <h2> Total Cart Price:'.  htmlspecialchars($totalCartPrice)  .'</h2>';
        }

        ?>
    </ul>



             <div class="shopping-list-footer">
                <button id="cancel-button" class="cancel-button">Cancel</button>
                <a href="www/pages/payment.php">
                <button id="pay-button" class="pay-button">Pay</button>
                </a>
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
if (empty($results)) {
    echo "<div>";
    echo "<p>There are no products available.</p>";
    echo "</div>";
} else {
    echo '<section class="product-grid">';
    foreach ($results as $row) {
        // Check if product quantity is greater than 0
        if ($row["product_quantity"] <= 0) {
            continue; // Skip this product if quantity is 0
        }

        echo '<div class="product-card" data-id="1">';
        
        // Check if the product image exists and display it
        if (isset($row['product_img']) && !empty($row['product_img'])) {
            $imageData = $row['product_img']; // Convert binary to base64
            $imageSrc = 'data:image/jpeg;base64,' . $imageData; // Embed as a data URI
            echo '<img src="' . $imageSrc . '" alt="Product Image" data-category="' . htmlspecialchars($row['product_category']) . '">';
        } else {
            echo '<p>No image available</p>'; // Placeholder if no image
        }

        // Display product info
        echo "<div class=\"product-info\">";
        echo "<h4>" . htmlspecialchars($row["product_name"]) . "</h4>";
        echo "<div class=\"price\">" . htmlspecialchars($row["product_prix"]) . ' DA' . "</div>";
        echo "</div>";

        // Check category for specific options
        if ($row["product_category"] === "Activewear & Footwear") {
            echo '<div class="size-buttons">';
            echo '<button class="size-button">36</button>';
            echo '<button class="size-button">38</button>';
            echo '<button class="size-button">40</button>';
            echo '<button class="size-button">42</button>';
            echo '</div>';
        }

        // Display the form for buying the product
        echo '<form method="POST" action="www/includes/buy_item.php" class="buy-form">';
        echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($row['product_id']) . '">';
        echo '<div class="quantity-buttons">';
        echo '<button type="button" class="quantity-minus">-</button>';
        echo '<input type="number" name="quantity" class="quantity-value" value="1" min="1">';
        echo '<button type="button" class="quantity-plus">+</button>';
        echo '</div>';
        echo '<button type="submit" class="buy-button">Buy</button>';
        echo '</form>';

        echo "</div>"; // End of product card
    }
    echo '</section>';
}
?>


<?php include 'footer.php' ?>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

<script src="/GymPath/www/js/header.js"></script>
<script src="/GymPath/www/js/store.js"></script>
</body>
</html>

