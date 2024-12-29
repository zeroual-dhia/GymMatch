<!DOCTYPE html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../includes/connect.php'; ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ADMIN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">



    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../node_modules/@popperjs/core/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../node_modules/@popperjs/core/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
        rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../node_modules/css/admin-bootstrap.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/admin.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
      
 


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="admin.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>ADMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../assets/images/admin/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Achraf</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="admin.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <a href="table.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="/www/pages/admin.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="../assets/images/admin/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="../assets/images/admin/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="../assets/images/admin/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../assets/images/admin/user.jpg" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Achraf</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Table Start -->

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Trainers</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $sql = '
                                     SELECT users.user_name, users.user_email, users.user_phonenum
                                      FROM users
                                     JOIN (SELECT user_id FROM trainers) AS trainer_ids
                                      ON users.user_id = trainer_ids.user_id;
                                 ';
                                    $result = $connect->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {


                                            echo '<tr>
                                                      <th scope="row">' . $i++ . '</th>
                                                       <td>' . htmlspecialchars($row['user_name']) . '</td>
                                                        <td>' . htmlspecialchars($row['user_phonenum']) . '</td>
                                                        <td>' . htmlspecialchars($row['user_email']) . '</td>
                                                   </tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="4">No trainers found.</td></tr>';
                                    } 
                                    $result ->close();  
                                ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Gym Owners </h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Gym name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $j = 1;
                                    $sql2 = '
                                      SELECT users.user_name, users.user_email, users.user_phonenum,gyms.gym_name
                                      FROM users
                                      JOIN (SELECT user_id,gym_name FROM gyms )as gyms  
                                      ON users.user_id = gyms.user_id;
                                     ';
                                    $result2 = $connect->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()) {

                                            echo ' <tr>
                                        <th scope="row">' . $j++ . '</th>
                                        <td>' . $row2['user_name'] . '</td>
                                        <td>' . $row2['user_phonenum'] . '</td>

                                        <td>' . $row2['user_email'] . '</td>
                                        <td>' . $row2['gym_name'] . '</td>

                                    </tr>';
                                        }
                                    }
                                    $result2->close();
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Members Table</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Country</th>
                                            <th scope="col">address</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $l = 1;
                                        $sql3 = 'select users.user_name, users.user_phonenum ,users.user_email ,users.user_address from
                                        users join (select user_id from gym_members) as members 
                                        on users.user_id=members.user_id ;';

                                        $result3 = $connect->query($sql3);
                                        if ($result3->num_rows > 0) {
                                            while ($row3 = $result3->fetch_assoc()) {

                                                echo ' <tr>
                                            <th scope="row">' . $l++ . '</th>
                                            <td>'.$row3['user_name'].'</td>
                                            <td>'.$row3['user_phonenum'].'</td>
                                            <td>'.$row3['user_email'].'</td>
                                            <td>ALG</td>
                                            <td>'.$row3['user_address'].'</td>
                                            <td>Member</td>
                                        </tr>';
                                            }
                                        }
                                        $result3->close();
                                        $connect->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="/components/dounia/gym-match/home/index.html">GYM MATCH</a>, All Right
                            Reserved.
                        </div>

                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../node_modules/@popperjs/core/lib/chart/chart.min.js"></script>
    <script src="../../node_modules/@popperjs/core/lib/easing/easing.min.js"></script>
    <script src="../../node_modules/@popperjs/core/lib/waypoints/waypoints.min.js"></script>
    <script src="../../node_modules/@popperjs/core/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../node_modules/@popperjs/core/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../node_modules/@popperjs/core/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../../node_modules/@popperjs/core/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>


    <!-- Template Javascript -->
    <script src="../js/admin2.js"></script>
</body>

</html>