
<header class="header2">
        <div class="logo-name">
            <img id='logo' src="../assets/logo/logo.png" alt="">
            <p class="text-light GYMMATCH">GYM MATCH</p>
        </div>


        <nav class="links">
            <a href="home.php" class="active">Home</a>
            <a href="about_us.php">About us</a>
            <a href="explore.php">Explore</a>
            <a href="programs.php">Programs</a>
            <a href="store.php">Store</a>

            <div class="dropdown">
                <button id="profile-btn" class="profile-btn">
                    <img src="../assets/icons/profile.png" alt="Profile" />
                </button>
                <div class="dropdown-content">
                    <a href="login.php">Connect</a>
                    <a href="#signout">Sign Out</a>
                </div>

            </div>

        </nav>

        <button id="menu-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
            aria-controls="offcanvasWithBothOptions"><img src="../assets/icons/icons8-menu.svg" alt=""></button>

    </header>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
        aria-labelledby="offcanvasWithBothOptionsLabel">

        <nav class="menu">
            <div class="logo-name">
                <img id='logo' src="../assets/logo/logo.png" alt="">
                <p class="text-light GYMMATCH">GYM MATCH</p>
            </div>

            <div class="pages">

            <a href="home.php" class="active">Home</a>
            <a href="about_us.php">About us</a>
            <a href="explore.php">Explore</a>
            <a href="programs.php">Programs</a>
            <a href="store.php">Store</a>

            </div>



            <div class="profile">
                <a href="" class="button"><img src="../assets/icons/profile.png" alt="">
                    <p> Profile</p>
                </a>
                <a href="" class="button in "><img src="../assets/icons/icons8-enter-32.png" alt="">
                    <p>Connect</p>
                </a>
                <a href="" class="button "><img src="../assets/icons/icons8-logout-32.png" alt="">
                    <p> Logout</p>
                </a>
            </div>


        </nav>
 </div>

 <script src="../js/header.js"></script>
