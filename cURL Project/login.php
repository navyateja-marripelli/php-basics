<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Employees</a>
  <ul class="navbar-nav">
        <?php
        if(!isset($_SESSION['employees'])){
        ?>
        <li class="nav-item">
            <a href="/login.php" class="nav-link mr-sm-2">Login</a>
        </li>
        <?php
        }else{
        ?>
        <li class="nav-item">
                <a href="/index.php" class="nav-link">View Employees</a>
        </li>
        <li class="nav-item">
                <a href="/logout.php" class="nav-link mr-sm-2">Logout</a>
        </li>
        <?php       
        }
        ?>
  </ul>
</nav>
    <div class="container">
        <?php
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.jsonbin.io/b/5cf9fc8ad2127723845d5b8f/2"); # API URL
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); # Get Site Data
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); # Skip SSL Host Verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); # Skip SSL Peer Verification
            $json = curl_exec($ch);
            //var_dump($json);
            $_SESSION['employees'] = json_decode($json, true);
        ?>
    </div>
</body>
</html>