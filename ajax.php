<?php

include('db_config.php');



$stateId = isset($_POST['stateId']) ? $_POST['stateId'] : 0;
$districtId = isset($_POST['districtId']) ? $_POST['districtId'] : 0;
$command = isset($_POST['get']) ? $_POST['get'] : "";

switch ($command) {
    case "state":
        $statement = "SELECT id,name FROM states";
        $dt = mysqli_query($conn, $statement);
        while ($result = mysqli_fetch_array($dt)) {
            echo $result1 = "<option value=" . $result['id'] . ">" . $result['name'] . "</option>";
        }
        break;

    case "district":
        $result1 = "<option>Select district</option>";
        $statement = "SELECT id,name FROM district WHERE state_id=" . $stateId;
        $dt = mysqli_query($conn, $statement);

        while ($result = mysqli_fetch_array($dt)) {
            $result1 .= "<option value=" . $result['id'] . ">" . $result['name'] . "</option>";
        }
        echo $result1;
        break;

    case "taluka":
        $result1 = "<option>Select taluka</option>";
        $statement = "SELECT id, name FROM taluka WHERE district_id=" . $districtId;
        $dt = mysqli_query($conn, $statement);

        while ($result = mysqli_fetch_array($dt)) {
            $result1 .= "<option value=" . $result['id'] . ">" . $result['name'] . "</option>";
        }
        echo $result1;
        break;
}

exit();
?>