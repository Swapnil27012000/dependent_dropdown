<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = 'dependent_dropdown';
    $db=mysqli_connect($servername,$username,$password,"$dbname");
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
      }
      else{
        // echo "Connected successfully";
        }
      

?>