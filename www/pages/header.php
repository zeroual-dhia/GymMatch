<header class="header2">
    <div class="logo-name">
        <img id="logo" src="www/assets/logo/logo.png" alt="GYM MATCH Logo">
        <p class="text-light GYMMATCH">GYM MATCH</p>
    </div>

    <nav class="links">
        <a href="index.php?page=home" >Home</a>
        <a href="index.php?page=about_us">About us</a>
        <a href="index.php?page=explore">Explore</a>
        <a href="index.php?page=programs">Programs</a>
        <a href="index.php?page=store">Store</a>

        <div class="dropdown">
            <button id="profile-btn" class="profile-btn">
                <img src="www/assets/icons/profile.png" alt="Profile">
            </button>
            <div class="dropdown-content">
                <a href="index.php?page=profile">Profile</a>
                <a href="index.php?page=login">Connect</a>
                <a href="www/includes/signout.php">Sign Out</a>
            </div>
        </div>
    </nav>

    <button id="menu-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
        aria-controls="offcanvasWithBothOptions">
        <img src="www/assets/icons/icons8-menu.svg" alt="Menu">
    </button>
</header>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">

    <nav class="menu">
        <div class="logo-name">
            <img id="logo" src="www/assets/logo/logo.png" alt="GYM MATCH Logo">
            <p class="text-light GYMMATCH">GYM MATCH</p>
        </div>

        <div class="pages">
            <a href="index.php?page=home">Home</a>
            <a href="index.php?page=about_us">About us</a>
            <a href="index.php?page=explore">Explore</a>
            <a href="index.php?page=programs">Programs</a>
            <a href="index.php?page=store">Store</a>
        </div>

        <div class="profile">
            <a href="index.php?page=profile" class="button">
                <img src="www/assets/icons/profile.png" alt="Profile">
                <p>Profile</p>
            </a>
            <a href="index.php?page=login" class="button in">
                <img src="www/assets/icons/icons8-enter-32.png" alt="Connect">
                <p>Connect</p>
            </a>
            <a href="www/includes/signout.php" class="button">
                <img src="www/assets/icons/icons8-logout-32.png" alt="Logout">
                <p>Logout</p>
            </a>
        </div>
    </nav>
</div>

<script src="www/js/header.js"></script>
