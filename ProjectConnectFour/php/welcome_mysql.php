<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login_mysql.html");

  exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>    
</head>
<body>
    <div>
        <h4>Hi, <b><?php echo $_SESSION['username']; ?></b>. Welcome to this site.</h4>
    </div>

</body>
</html>