<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
</div><script src="../JS/script1.js"></script>
<script src="../JS/JQuery.js"></script>
</body>
</html>
<?php
//error_reporting(0);
session_start();
require_once ('connect.php');
$queryProfile = "SELECT * FROM users WHERE username = '$username'";
$profileResult = mysqli_query($connection, $queryProfile) or die (mysqli_error($connection));
if (isset($_POST['upload'])) {
    move_uploaded_file($_FILES['filename']['tmp_name'],
        "../assets/profilePictures/full/" . $_FILES['filename']['name']);
    $picName = $_FILES['filename']['name'];
    $username = $_SESSION['username'];
    var_dump($picName);
//var_dump(mysqli_fetch_assoc($profileResult));
    $userInfo = mysqli_fetch_assoc($profileResult);
    $connection->query("UPDATE users SET pic = '$picName' WHERE username = '$username'");
    header("Location: changer.php");
}
elseif ($_FILES['filename']['size'] == 0){
$errors[] = "Выберите изображение";
}
header("Location: changer.php");
?>

