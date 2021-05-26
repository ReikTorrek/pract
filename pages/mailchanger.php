<?php
session_start();
require_once('connect.php');
//var_dump($_GET['rename']);
if (isset($_GET['rename'])){
    $username = $_SESSION['username'];
    $queryMail = "SELECT username FROM users";
    $profileResult = mysqli_query($connection, $queryMail) or die (mysqli_error($connection));
    //var_dump(mysqli_fetch_assoc($profileResult));
    //$userInfo = mysqli_fetch_assoc($profileResult);
    //var_dump($_GET['login']);
    if (isset($_GET['login'])){
        $newUserName = $_GET['login'];
        $usedUserName = '';
        $counter = 0;
        while (mysqli_num_rows($profileResult)>$counter){
            $counter++;
            $usedUserName = mysqli_fetch_assoc($profileResult);
            $checkUsedUsername = $usedUserName['username'];
            if ($checkUsedUsername == $newUserName){
                $_SESSION['error_message'] = "Такой логин уже существует";
                var_dump($_SESSION['error_message']);
                header("Location: changer.php");
                break;
            }
            if (strlen($newUserName) <= 3){
                $_SESSION['error_message'] = "Ваш Логин слишком короткий";
            }
        }
        var_dump($_SESSION['error_message']);
        if ($_SESSION['error_message'] == ""){
            var_dump($_SESSION['error_message']);
            $newUserName = str_replace(' ', '', $newUserName);
            $connection->query("UPDATE users SET username='$newUserName' WHERE username = '$username' ");
            echo 'Замена прошла';
            header("Location: logout.php");
        }
    }
    header("Location: changer.php");
}
