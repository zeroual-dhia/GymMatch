
<!DOCTYPE html>
<html lang="en">
 <?php include_once '../includes/connect.php' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Gyms</title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/explore.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/preloader.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <header class="header2">
        <div class="logo-name">
            <img id='logo' src="../assets/logo/logo.png" alt="">
            <p class="text-light GYMMATCH">GYM MATCH</p>
        </div>
        <nav class="links">
            <a href="/components/dounia/gym-match/home/index.html" class="active">Home</a>
            <a href="/components/rayane/about_us.html">About us</a>
            <a href="/components/rayane/explore.html">Explore</a>
            <a href="/components/dhiaa/html/programs.html">Programs</a>
            <a href="/components/dounia/gym-match/store/store.html">Store</a>

            <div class="dropdown">
                <button id="profile-btn" class="profile-btn">
                    <img src="/assets/images/profile.png" alt="Profile" />
                </button>
                <div class="dropdown-content">
                    <a href="login.html">Sign In</a>
                    <a href="#signout">Sign Out</a>
                </div>
            </div>
        </nav>

        <button id="menu-btn"><img src="../icons/icons8-menu.svg" alt=""></button>
    </header>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg spad" data-setbg="../images/gallery/hero2.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <div class="breadcrumb-text">
                        <h2>explore gyms</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <div class="search-container">
        <div class="InputContainer">
            <div class="searchFields">
                <input placeholder="Search by Name / location" id="nameInput" class="input" name="name" type="text" />
            </div>
            <label class="labelforsearch" for="nameInput">
                <svg class="searchIcon" viewBox="0 0 512 512">
                    <path
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                    </path>
                </svg>
            </label>
        </div>
    </div>

    <section class="explore_page">
        <center>
            <h2>OUR GYMS</h2>
        </center>

        <div class="gym-list-container">
            <div class="gym-list">


                <?php
                $sql=$connect->prepare('select * from gyms ');
                $sql->execute();
                $result=$sql->get_result();
                if($result->num_rows > 0) {
                while($row=$result->fetch_assoc())
                {           
                    $image_b64 = base64_encode($row["gym_img"]);
                    $image_src = 'data:image/ ;base64,' . $image_b64;
                echo '<div class="gym-card">
                    <a href="info.php?id='.$row['gym_id'].'" class="gym-link">  
                        <img src="'.$image_src.'" alt="Default Gym Image">
                        <h3>'.$row['gym_name'].'</h3>
                        <p>Location:'.$row['gym_location'].'<br>Facilities:'.$row['gym_extra'].'</p>
                    </a>
                </div>';
                }}
                ?>



            </div>
        </div>
    </section>

    <footer class="footer-section">
        <div class="container-fluid">
            <div class="row justify-content-between align-item-start">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="footer-logo-item">
                        <div class="f-logo">
                            <a href="#"><img class="img-fluid" src="/assets/logo/logo.png" alt=""></a>
                        </div>
                        <div class="social-links">
                            <h6 class="text-light text-center">
                                <p class="m-0">Follow us</p>
                            </h6>
                            <div class="social">
                                <a href="#"><img class="img-fluid" src="../assets/icons/icons8-facebook.svg" alt=""></a>
                                <a href="#"><img class="img-fluid" src="../assets/icons/icons8-instagram.svg"
                                        alt=""></a>
                                <a href="#"><img class="img-fluid" src="../assets/icons/icons8-linkedin.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4 col-md-5 pt-4">
                    <div class="footer-widget">
                        <h5 class="text-light">
                            <p class="info">Get Info</p>
                        </h5>
                        <div class="mygird container-fluid">
                            <img src="../assets/icons/icons8-phone-30.png" alt="">
                            <p class="m-0 text-light">Phone:</p>
                            <p class="m-0 text-light">(12) 34 5 6789</p>

                            <img src="../assets/icons/icons8-email-24.png" alt="">
                            <p class="m-0 text-light">Email:</p>
                            <p class="m-0 text-light">Colorlib.info@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="text-light ct-inside">
                            Copyright © 2024 GymMatch. All rights reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="../js/header.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../js/explore.js"></script>
</body>

</html>

<?php
$conn->close();
?>