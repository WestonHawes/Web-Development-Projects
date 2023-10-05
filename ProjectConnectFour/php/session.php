<?php
// Include config file
require_once 'config_mysql.php';
session_start();

if (array_key_exists('best_players',$_GET)){
    $sql="select login from admin order by won_games desc limit 3;";
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    /*
    for ($x = 0; $x < count($emparray[0]); $x++) {
        
        $curr =  $emparray[0]->games_played/$emparray[0]->won_games;
        if ($curr >= $num_one){
            $num_three = $num_two;
            $num_two = $num_one;
            $num_one = $curr;

        }
        else if ($curr >= $num_two){
            $num_three = $num_two;
            $num_two = $curr;

        }
        else if ($curr >= $num_three){
            $num_three = $curr;

        }
    }*/
    //$conn->close();
    echo json_encode($emparray);
    // Close connection
    mysqli_close($conn);
}
else if(array_key_exists('win_track',$_GET)){
    $sql="update admin set won_games = won_games+".$_GET['win_track']." where login = '".$_SESSION['username']."';";
    mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

    $sql="update admin set games_played = games_played+1 where login = '".$_SESSION['username']."';";
    mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
    echo json_encode('successfully uploaded won_games and games played');

    $sql="update admin set time_played = time_played +".$_GET['match_time_min']." where login = '".$_SESSION['username']."';";
    mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
    echo json_encode('successfully uploaded time played');
}

else{
    if (array_key_exists('username',$_SESSION)){
        $sql="select games_played from admin where login = '".$_SESSION['username']."';";
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        //create an array
        $emparray = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $emparray[] = $row;
        }
        //$conn->close();
        echo json_encode($emparray);
        // Close connection
        mysqli_close($conn);
    }
else{
    echo json_encode('You must be logged in to see your own stats.');
}

}
?>