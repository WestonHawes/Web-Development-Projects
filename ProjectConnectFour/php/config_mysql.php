<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
 
$servername = 'localhost';
$username = 'username';
$password = 'password';
$dbname = 'c4db';

$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql='SHOW DATABASES LIKE \'c4db\';';
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        //create an array
        $emparray = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $emparray[] = $row;
        }
        //$conn->close();

        // Create database
$sql = "CREATE DATABASE IF NOT EXISTS c4db";
$conn->query($sql);




$conn->close();
$conn = mysqli_connect($servername, $username, $password, $dbname);
/* Attempt to connect to MySQL database */
         // sql to create table
         $sql = "CREATE TABLE IF NOT EXISTS admin(
          id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          login VARCHAR(30) NOT NULL,
          password VARCHAR(255) NOT NULL,
          won_games INT(5) UNSIGNED,
          time_played INT(10) UNSIGNED,
          games_played INT(5) UNSIGNED
          )";
      
      $conn->query($sql);



                  

      if(json_encode($emparray) != "[{\"Database (c4db)\":\"c4db\"}]"){
    // Set parameters
    $param_password1 = password_hash('RolledOats', PASSWORD_DEFAULT); // Creates a password hash
    $param_password2 = password_hash('Soymilk', PASSWORD_DEFAULT); // Creates a password hash
    $param_password3 = password_hash('WholeFlaxseed', PASSWORD_DEFAULT); // Creates a password hash
    $param_password4 = password_hash('Cinnamon', PASSWORD_DEFAULT); // Creates a password hash
    $param_password5 = password_hash('Dextrose', PASSWORD_DEFAULT); // Creates a password hash
    $sql = "INSERT INTO admin ( login, 
    password, won_games, time_played, games_played) 
    VALUES ('OldFashionedOats', '$param_password1', 150,150, 150),
    ('Silk', '$param_password2', 110,110, 110),
    ('Flaxseed', '$param_password3', 70,70, 70),
    ('GroundCinnamon', '$param_password4', 0,0, 0),
    ('Stevia', '$param_password5', 0,0, 0)";
    $conn->query($sql);
      }
      
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>