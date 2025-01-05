<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/GymPath/node_modules/bootstrap/dist/css/animate.min.css">
    <link rel="stylesheet" href="/GymPath/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/GymPath/www/css/preloader.css">
    <link rel="stylesheet" href="/GymPath/www/css/profile.css">
    <link rel="stylesheet" href="/GymPath/www/css/header.css">
  

</head>



<body>

    <div id="preloder">
        <div class="loader"></div>
    </div>



    <?php include 'header.php' ?>


    <div class="box">

        <div class="pic">

            <div class="image-container">

                <img class="image" src="../assets/images/profile/pfp.jfif" alt="none">
                <input type="file" id="upload-picture" accept="image/*" style="display: none;">
                <div class="hover-text">Change PFP</div>
            </div>
            <div class="button-container">
                <button class="button-a">
                    Connect to Linkedin
                </button>
            </div>
            <div class="edit">

                <img class="edit-icon" src="../assets/images/profile/logo.png" alt="none">
                <p>Edit</p>
            </div>
            <div class="humicon">


                <button class="logout">log out</button>

                <button class="deleteacc">delete account</button>

            </div>
        </div>



        <div class="info-section">
            <div class="first-line">
                <h1 class="myprofile">My Profile</h1>
            </div>



            <div>
                <div class="info">
                    <div>
                        <p class="texting">USER NAME</p>
                    </div>
                    <div class="hastwoelem">
                        <input class="username" type="text" placeholder="joseph" disabled>
                        <span class="error-message"></span>
                    </div>

                    <div>
                        <p class="texting">NAME</p>
                    </div>
                    <div class="hastwoelem">
                        <input class="namee" type="text" placeholder="turing" disabled>
                        <span class="error-message"></span>
                    </div>
                </div>


                <div class="info">
                    <div>
                        <p class="texting">PHONE</p>
                    </div>
                    <div class="hastwoelem">
                        <input class="phone" type="text" placeholder="+213548752418" disabled>
                        <span class="error-message"></span>
                    </div>

                    <div>
                        <p class="texting">DATE OF BIRTH</p>
                    </div>
                    <div class="hastwoelem">
                        <input class="datee" type="text" placeholder="24/10/1989" disabled>
                        <span class="error-message"></span>
                    </div>
                </div>

                <div class="info">
                    <div>
                        <p class="texting">STATUS</p>
                    </div>
                    <div class="hastwoelem">
                        <input class="statuss" type="text" placeholder="Trainer" disabled>
                        <span class="error-message"></span>
                    </div>



                    <div>
                        <p class="texting">GENDER</p>
                    </div>
                    <div class="hastwoelem">
                        <input class="genderr" type="text" placeholder="Male" disabled>
                        <span class="error-message"></span>
                    </div>










                </div>






            </div>
            <div class="twodivas">
                <div>
                    <p class="texting"> email </p>

                    <div class="hastwoelem">
                        <input class="input-mail" type="text" placeholder="gym.match@gmail.com" disabled>
                        <span class="error-message"></span>
                    </div>

                </div>


            </div>

            <div>
                <p class="texting">Bio</p>
                <input class="biography" type="text" placeholder="Bio" disabled>
            </div>






        </div>



        <div>
            <img class="logo" src="../assets/logo/logo.png" alt="none">

        </div>


    </div>

    <div class="cancel">
        <center>
            <button class="button-b">
                &#x2714;

            </button>
            <button class="button-c n">
                &#x2716;
            </button>
        </center>


    </div>

    <script src="/GymPath/www/js/profile.js"></script>
    <script src="/GymPath/www/js/header.js"></script>
    <script src="/GymPath/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="/GymPath/node_modules/bootstrap/dist/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

</body>

</html>