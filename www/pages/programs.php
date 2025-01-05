<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs - Gym Website</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/animate.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="www/css/programs.css">
    <link rel="stylesheet" href="node_modules/css/elegant-icons.css">
    <link rel="stylesheet" href="www/css/header.css">
    <link rel="stylesheet" href="www/css/preloader.css">
    <link rel="stylesheet" href="www/css/footer.css">

</head>

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
  
     
    <?php 
      include 'header.php'
    ?>
    

    <div class="programs container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 hero">
                <img class="img-fluid programs-back" src="www/assets/images/gallery/hero2.png"
                    alt="Hero programs background">
                <p class="title text-center text-light">Programs</p>
            </div>
            <div class="col-12">
                <p class="offer text-center text-light">WHAT WE OFFER</p>
            </div>

            <section class="general-programs col-11 ">
                <div class="row gap-5">
                    <div class="col-12 mb-5">
                        <p class="title-general text-start text-light"><u>General Programs:</u></p>
                    </div>

                    <div class="col-12">
                        <div class="row justify-content-between">
                            <div class="col-general  col-lg-4 col-md-6">
                                <div class="single-program text-center wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay=".2s">
                                    <div class="program-icon">
                                        <img class="rounded img-fluid" src="www/assets/images/gallery/team1.png"
                                            alt="Team 1 Program" loading="lazy">
                                        <a class="btn btn-program  text-light  p-2 fw-bold " href="index.php?page=catigory&category=Increase+Strength">View
                                            program</a>
                                    </div>
                                    <div class="program-name text-center text-light mt-4">
                                        <h5>INCREASE STRENGTH</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-general col-lg-4 col-md-6">
                                <div class="single-program text-center wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay=".4s">
                                    <div class="program-icon">
                                        <img class="rounded img-fluid" src="www/assets/images/gallery/team2.png"
                                            alt="Team 2 Program" loading="lazy">
                                        <a class="btn btn-program  text-light p-2 fw-bold"
                                            href="index.php?page=catigory&category=Muscle+Gain">View program</a>
                                    </div>
                                    <div class="program-name text-center text-light mt-4">
                                        <h5>MUSCLE GAIN</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-general col-lg-4 col-md-6">
                                <div class="single-program text-center wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay=".6s">
                                    <div class="program-icon">
                                        <img class="rounded img-fluid" src="www/assets/images/gallery/team3.png"
                                            alt="Team 3 Program" loading="lazy">
                                        <a class="btn btn-program text-light  btn-program  p-2 fw-bold "
                                            href="index.php?page=catigory&category=Fat+Loss">View program</a>
                                    </div>
                                    <div class="program-name text-center text-light mt-4">
                                        <h5>WEIGHT LOSS</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="special-programs col-11 ">

                <div class="row gap-5 justify-content-center">
                    <div class="col-12 mb-5">
                        <p class="title-general text-start text-light"><u>Special Programs:</u></p>
                    </div>
                    <div class="col-12 ">
                            <div class="training-icon container-fluid">
                                <img class=" specialImage" src=" www/assets/images/gallery/cat1.png" alt="">
                                <p class="text-light text-center fw-bold">PERSONAL TRAINING </p>
                                <a class="btn btn-1 btn-trainer text-light fw-bold  "
                                    href="link-to-bodybuilding-program">CHOOSE A TRAINER</a>
                            </div>
                    </div>


                </div>

            </section>
        </div>
    </div>
    
    <?php 
      include 'footer.php' ;
    ?>
    


    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="node_modules/bootstrap/dist/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="../js/header.js"></script>
</body>