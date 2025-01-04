<?php

try {
    require_once "../includes/dbh.inc.php";
    $query=" SELECT 
            gm.gmember_id,
            u.user_name,
            u.user_email,
            u.user_phonenum,
            gm.start_date,
            gm.end_date,
            gm.ship_id,
            CASE 
                WHEN gm.ship_id IS NULL THEN 'No Membership'
                ELSE 'Has Membership'
            END AS membership_status
        FROM 
            users u
        JOIN 
            gym_members gm ON u.user_id = gm.user_id;";
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
    <meta charset="utf-8">
    <title>ADMIN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

  

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

     <!-- Libraries Stylesheet -->
     <link href="../../node_modules/@popperjs/core/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
     <link href="../../node_modules/@popperjs/core/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
 
     <!-- Customized Bootstrap Stylesheet -->
     <link href="../../node_modules/css/admin-bootstrap.css" rel="stylesheet">
 
     <!-- Template Stylesheet -->
     <link href="../css/admin.css" rel="stylesheet">
</head>

<body>
    
      
<?php
            
            echo '<div class="container-fluid pt-4 px-4">';
             echo '   <div class="row g-4">';
                 echo '   <div class="col-sm-12 col-xl-6">';
                    echo '    <div class="bg-secondary rounded h-100 p-4">';
                       echo '     <h6 class="mb-4">';
                        echo 'members with subs';
                         echo '</h6>';
                           echo ' <table class="table">';
                                echo ' <thead>';
                                  echo '  <tr>';
                                     echo '   <th scope="col">';
                                     echo 'id';
                                     echo '</th>';
                                       echo ' <th scope="col">';
                                       echo ' username';
                                        echo '</th>';
                                         echo '<th scope="col">';
                                         echo 'Email';
                                         echo '</th>';
                                     echo '</tr>';
                                 echo '</thead>';
                                echo ' <tbody>';
                                foreach($results as $row){
                                    if($row['membership_status']=='Has Membership'){
                                    echo '<tr>';
                                        echo '<th scope="row">';
                                        echo htmlspecialchars($row['gmember_id']);
                                        echo '</th>';
                                        echo '<td>';
                                        echo htmlspecialchars($row['user_name']);
                                        echo '</td>';
                                        echo '<td>';
                                        echo htmlspecialchars($row['user_email']);
                                        echo '</td>';
                                    echo '</tr>';
                                }

                                }
                                    
                                 echo '</tbody>';
                           echo ' </table>';
                         echo '</div>';
                     echo '</div>';
                    echo '   <div class="col-sm-12 col-xl-6">';
                           echo '    <div class="bg-secondary rounded h-100 p-4">';
                       echo '     <h6 class="mb-4">';
                        echo 'members with no subs';
                         echo '</h6>';
                           echo ' <table class="table">';
                                echo ' <thead>';
                                  echo '  <tr>';
                                     echo '   <th scope="col">';
                                     echo 'id';
                                     echo '</th>';
                                       echo ' <th scope="col">';
                                       echo ' username';
                                        echo '</th>';
                                         echo '<th scope="col">';
                                         echo 'Email';
                                         echo '</th>';
                                     echo '</tr>';
                                 echo '</thead>';
                                echo ' <tbody>';
                                foreach($results as $row){
                                    if($row['membership_status']=='No Membership'){
                                    echo '<tr>';
                                        echo '<th scope="row">';
                                        echo htmlspecialchars($row['gmember_id']);
                                        echo '</th>';
                                        echo '<td>';
                                        echo htmlspecialchars($row['user_name']);
                                        echo '</td>';
                                        echo '<td>';
                                        echo htmlspecialchars($row['user_email']);
                                        echo '</td>';
                                    echo '</tr>';
                                }
                                

                                }
                                    
                                 echo '</tbody>';
                           echo ' </table>';
                         echo '</div>';
                     echo '</div>';
                     
                    
                    if(empty($results)){
                        echo "<div>";
                        echo "<p> there is no product </p>";
                        echo "</div>";
                
                
                
                    }
                    
                    else{
                        echo '<div class="col-12">';
                        echo '<div class="bg-secondary rounded h-100 p-4">';
                            echo '<h6 class="mb-4"> All Members Table</h6>';
                             echo '<div class="table-responsive">';

                             echo '<table class="table">';
                                    echo '<thead>';
                                      echo   '<tr>';
                                         echo    '<th scope="col">';
                                         echo "#";
                                         echo '</th>';
                                         echo    '<th scope="col">';
                                         echo 'user_name';
                                         echo '</th>';
                                           echo ' <th scope="col">';
                                           echo 'Email';
                                           echo '</th>';
                                            echo '<th scope="col">';
                                            echo 'phone number'; 
                                            echo '</th>';
                                            echo '<th scope="col">';
                                            echo 'start date';
                                            echo '</th>';
                                            echo '<th scope="col">';
                                            echo 'end date';
                                            echo '</th>';
                                        echo '</tr>';
                                    echo '</thead>';

                                    echo '<table class="table">';
                                    
                                
                                    echo '<tbody>';
                        foreach ($results as $row){
                
                          
                            echo '<tr>';
                                            echo '<th scope="row">';
                                            echo htmlspecialchars($row['gmember_id']);
                                            echo'</th>';
                                            echo '<td>';
                                            echo htmlspecialchars($row['user_name']);
                                            echo '</td>';
                                            echo '<td>';
                                            echo htmlspecialchars($row['user_email']);
                                            echo '</td>';
                                            echo '<td>';
                                            echo htmlspecialchars($row['user_phonenum']);
                                            echo '</td>';
                                            echo '<td>';
                                            echo htmlspecialchars($row['start_date']);
                                            echo '</td>';
                                            echo '<td>';
                                            echo htmlspecialchars($row['end_date']);
                                            echo '</td>';
                                            
                                        echo '</tr>';
                            
                            
                        }
                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }



                    ?>
                    




                </div>
            </div>
            <!-- Table End -->


            
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
       
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
    <script src="../js/admin.js"></script>
</body>

</html>





