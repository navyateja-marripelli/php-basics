<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cURL</title>
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
        <h1>Employees</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $employees = $_SESSION['employees'];
                foreach ($employees as $employee) {
                    echo "<tr>";
                    echo "<td>{$employee['id']}</td>";
                    echo "<td><a href='/view.php?id={$employee['id']}'>{$employee['name']}</a>";
                    echo "</td>";
                    echo "<td>{$employee['gender']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>