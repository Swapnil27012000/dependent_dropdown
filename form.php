
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: Index.php");
}

$user = $_SESSION['user'];
?>

<?php
// session_start();
require_once("db_config.php");


//check if form is submitted
if (isset($_POST['submit'])) {
  

    //insert data into database



    if (
        empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['birthdate']) || empty($_POST['mobile'])
        || empty($_POST['email']) ||  empty($_POST['state']) 
        ||empty($_POST['district']) || empty($_POST['taluka']) || empty($_POST['zip'])
    ) {
        
        echo '<script>alert("All field mandotary.")</script>';
        echo "<meta http-equiv='refresh' content='0'>";

        exit;
    } elseif (strlen($_POST['mobile']) != 10) {
        echo '<script>alert("mobile number should be 10 digits.")</script>';
        exit;
    } elseif (strlen($_POST['zip']) != 6) {
        echo '<script>alert("zip code should be 6 digits.")</script>';
        exit;
    } else {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        
        $birthdate = $_POST['birthdate'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        // $username = $_POST['username'];
        // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $state = $_POST['state'];
        $district = $_POST['district'];
        $taluka = $_POST['taluka'];
        $zip = $_POST['zip'];

        $storeby=$user['username'];

        $query = "INSERT INTO users (first_name, last_name, birthdate, mobile, email, state, district, taluka, zip, storeby) 
        VALUES ('$first_name','$last_name','$birthdate','$mobile','$email','$state','$district','$taluka','$zip','$storeby' )";





    
        $result = mysqli_query($conn, $query);

        if ($result)
        {
            echo '<script>alert("Data saved successfully")</script>';
            
        }
      
    }
    // } else {
    //     echo "Error: " . $query . "<br>" . mysqli_error($conn);
    // }



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
    <style>
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
    </style>
</head>

<body class="">
<!-- <nav class="navbar navbar-expand-lg  bg-dark-10">
  <div class="container-fluid"> -->
    <ul class="nav nav-tabs justify-content-end">

   
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#"> Welcome <?php echo $user['username']; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="./form.php">Assesment</a>
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
                <div class="col-md-6">
                    <label for="birthdate" class="form-label">Birthdate:</label>
                    
                    <input type="date" class="datepicker form-control" id="birthdate" name="birthdate"  data-date-format="dd/mm/yyyy">
                </div>

                <div class="col-md-6">
                    <label for="mobile" class="form-label">Mobile No:</label>
                    <input type="number" class="form-control" id="mobile" name="mobile">


                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email ID:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <!-- <div class="col-12">
                    <label for="username" class="form-label"> Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>

                <div class="col-12">
                    <label for="password" class="form-label">Password:</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div> -->
                <!-- form -->


                <section class="courses-section">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="state">State</label>
                            <select type="text" name="state" id="state" class="form-control">
                                <option>Select State</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="district">District</label>
                            <select type="text" id="district" name="district" class="form-control"></select>
                        </div>

                        <div class="col-md-4">
                            <label for="taluka">Taluka</label>
                            <select name="taluka" id="taluka" class="form-control"></select>
                        </div>

                    </div>
                </section>

                <div class="col-md-6">
                    <label for="zip" class="form-label">Zip Code:</label>
                    <input type="number" class="form-control" id="zip" name="zip">
                </div>

                <div class="col-md-24  text-right">
                    <button type="submit" class="btn btn-primary form-label" name="submit" value="Submit">Submit</button>

                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#state').change(function() {
                loadDistrict($(this).find(':selected').val())
            })
            $('#district').change(function() {
                loadTaluka($(this).find(':selected').val())
            })
        });

        function loadState() {
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: "get=state"
            }).done(function(result) {


                $(result).each(function() {
                    $("#state").append($(result));
                })
            });
        }

        function loadDistrict(stateId) {
            $("#district").children().remove()
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: "get=district&stateId=" + stateId
            }).done(function(result) {

                $("#district").append($(result));

            });
        }

        function loadTaluka(districtId) {
            $("#taluka").children().remove()
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: "get=taluka&districtId=" + districtId
            }).done(function(result) {

                $("#taluka").append($(result));

            });
        }

        loadState();
    </script>
</body>

</html>
