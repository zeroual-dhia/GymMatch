<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Info</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/animate.min.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/infotrainer.css">
</head>
<body class="p-0">
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

    <div class="program-descreption container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 mt-5 mb-5">
                <h3 id="trainer-name" class="program-name text-light text-center fw-bold"></h3>
            </div>
            <div class="col-12">
                <img id="trainer-image" class="img-fluid descreption-image rounded mx-auto d-block" src="" alt="Trainer Image">
            </div>
            <div class="col-8 mt-3">
                <div class="row justify-content-center">
                    <div class="col-11 motivation mb-5 mt-5 p-3">
                        <p id="trainer-title" class="text-center text-light fw-600"></p>
                    </div>
                    <div class="col-12 workout-summary">
                        <table class="table caption-top">
                            <caption class="caption fw-bold">Trainer Info</caption>
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td id="trainer-fullname"></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td id="trainer-address"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td id="trainer-email"></td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td id="trainer-phone"></td>
                                </tr>
                                <tr>
                                    <td>Target Gender</td>
                                    <td id="trainer-gender"></td>
                                </tr>
                                <tr>
                                    <td>Services</td>
                                    <td id="trainer-services"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 mt-5 text">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="fw-bold">Bio</h3>
                            </div>
                            <div class="col-12">
                                <p id="trainer-bio" class="text-light"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="../../node_modules/bootstrap/dist/js/wow.min.js"></script>
<script>
    // Fetch trainer info dynamically
    document.addEventListener("DOMContentLoaded", function () {
        fetch("get_trainer_info.php")
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                    return;
                }
                // Populate the HTML with trainer data
                document.getElementById("trainer-name").textContent = `Trainer: ${data.user_name}`;
                document.getElementById("trainer-title").textContent = `Train with ${data.user_name}`;
                document.getElementById("trainer-image").src = `data:image/jpeg;base64,${data.trainer_img}`;
                document.getElementById("trainer-fullname").textContent = data.user_name;
                document.getElementById("trainer-address").textContent = data.user_address;
                document.getElementById("trainer-email").textContent = data.user_email;
                document.getElementById("trainer-phone").textContent = data.user_phonenum;
                document.getElementById("trainer-gender").textContent = data.gender_prefrence || "N/A";
                document.getElementById("trainer-services").textContent = data.trainer_spe || "N/A";
                document.getElementById("trainer-bio").textContent = data.user_bio || "No bio available.";
            })
            .catch(error => console.error("Error fetching trainer data:", error));
    });
</script>
</body>
</html>
