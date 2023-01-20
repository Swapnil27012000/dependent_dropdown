<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

  <!--  -->
  <div class="container rounded mx-auto d-block">
    <div class="row g-3 rounded mx-auto d-block">
      <form class="col-md-6 container mb-5 row p-5 g-3 shadow-lg p-3 mx-auto bg-body rounded; rounded d-flex justify-content-center" method="post" action="Index.php">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        

        <?php
        require_once("db_config.php");
      

       require_once("logindb.php");

      

      if (isset($_POST['submit'])) {
        // Get the input values
        $username = $_POST['username'];
        $password = $_POST['password'];


        $sql = $db->prepare("SELECT password FROM admin WHERE username = ?");
        $sql->bind_param("s", $username);
        $sql->execute();
        $sql->bind_result($db_password);
        $sql->fetch();

        // $select="select username from admin";
        // $result = mysqli_query($db, $select);
        // $row = mysqli_fetch_assoc($result);

        $query = "SELECT * FROM admin WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);



        if (password_verify($password, $db_password)) {


          // echo "Login successful.";
          $_SESSION['user'] = $user;

          // $_SESSION['id'] = $row['id'];
          // 
          header("Location: form.php");
        } else {
      ?>
      <?php
          echo "<font color = red><strong>Invalid username or password. Please Try again..</strong>";
          header('Refresh: 1; URL = Index.php');
        }
      }
      ?>

      </div>


        <button type="submit" name="submit" value="Login" class="btn btn-primary form-label col-md-3 p-2 my-3d-inline">Login</button>
        <!-- <a class="btn btn-primary form-label col-md-3 p-2 ml-2 d-inline " role="button" href="./index.php">Register Here</a> -->
      </form>

      
    </div>
  </div>


</body>

</html>