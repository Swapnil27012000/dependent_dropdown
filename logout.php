
<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
echo 'logout Succesfully';

header("Refresh: 1; URL = Index.php"); //to redirect back to "index.php" after logging out
exit();
?>