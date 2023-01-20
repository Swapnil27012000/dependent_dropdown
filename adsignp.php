<?php 
// session_start();

// require_once("db_config.php");
require_once("logindb.php");


//check if form is submitted
if (isset($_POST['submit'])) {
  

    //insert data into database



    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['username']) || empty($_POST['password']))
        
    {
        
        echo '<script>alert("All field mandotary.")</script>';
        echo "<meta http-equiv='refresh' content='0'>";

        exit;
    
    } else {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        

        $query = "INSERT INTO admin (first_name, last_name, username, password ) 
        VALUES ('$first_name','$last_name','$username','$password')";
    
        $result = mysqli_query($db, $query);

        if ($result)
        {
            echo '<script>alert("Data saved successfully")</script>';
            
        }
     else {
        echo"select * from admin";
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }
      
     }



}


?>


<!DOCTYPE html>
<html >

<head>

    <!--  -->
    
    <title>Signin demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--  -->
    <!-- <style>
        body {
            background: #0000;
        }

        form {
            background: #C0C0C0;
            padding: 30px;
            margin-top: 30px;
        }

        form h3 {
            margin-top: 0;
        }
    </style> -->
</head>

<body class="">
<!-- <nav class="navbar navbar-expand-lg  bg-dark-10">
  <div class="container-fluid"> -->
    <ul class="nav nav-tabs justify-content-end">
      
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="./adsignp.php">admin</a>
      </li>
    <li class="nav-item">
        <a class="nav-link " aria-current="page" href="./index.php">Assesment</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link " href="./logout.php">Logout</a>
      </li>


    </ul>
    
  <!-- </div> -->

</nav>
    <!-- form -->
    <!-- <form action="" method="post" class="row g-3"> -->
    <div class="container my-5 md-3">
        <div class="row g-5; d-flex  ">
            <!--Course -->

            <form action="" name="frm" method="post" class="row g-6 shadow-lg p-3 mb-5 bg-body rounded; rounded; d-flex align-items-center" padding: 5rem>
                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name:</label>
                    <input class="form-control" type="text" id="first_name" name="first_name">
                </div>

                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name">
                </div>

                <div class="col-12">
                    <label for="username" class="form-label"> Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>

                <div class="col-12">
                    <label for="password" class="form-label">Password:</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div> 
                 



                <div class="col-md-12 my-5 text-right">
                    <button type="submit" class="btn btn-primary form-label" name="submit" value="Submit">Submit</button>

                </div>
            </form>
        </div>
    </div>

</body>

</html>