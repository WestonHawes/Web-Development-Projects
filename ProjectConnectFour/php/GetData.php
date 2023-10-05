<?php
// Include config file
require_once 'config_mysql.php';

        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "c4db";


        $conn = mysqli_connect($servername, $username, $password, $dbname);



$by = $_GET['by'];
$order = $_GET['order'];
$sql = "select * from admin order by ".$by." ".$order." limit 10;";
     $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    $conn->close();
    echo json_encode($emparray);
        //echo $food_arr;
    

?>