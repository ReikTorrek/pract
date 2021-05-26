<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gachify</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
<div id="container">
    <div id="header">
        <p>Gachify</p>
    </div>
    <div id="nav">
        <div class="link">
            <a href="index.php">Главная</a>
        </div>
        <div class="link">
            <a href="author.php">Авторы</a>
        </div>
        <div class="link">
            <a href="album.php">Альбомы</a>
        </div>
        <div class="link">
            <?php
            session_start();
            require_once('connect.php');
            if (isset($_SESSION['username'])) {
                echo '<a href="logout.php">выйти</a>';
            }
            ?>
        </div>
    </div>
    <div id="aside">
        <p>Друг 1</p>
        <p>Друг 2</p>
    </div>
    <div id="content">
        <div class="mainInfo">
            <?php
            $username = $_SESSION['username'];
            $queryProfile = "SELECT * FROM users WHERE username = '$username'";
            $profileResult = mysqli_query($connection, $queryProfile) or die (mysqli_error($connection));
            //var_dump(mysqli_fetch_assoc($profileResult));
            $userInfo = mysqli_fetch_assoc($profileResult);
            ?>
            <div class="avatar">
                <img src="../assets/profilePictures/full/<?php echo $userInfo['pic']; ?>" alt="">
            </div>
            <div class="username">
                <span>Логин: </span>
                <span><?php echo $userInfo['username']; ?></span>
            </div>
            <div class="mail">
                <span>Ваша почта: <?php echo $userInfo['mail']; ?></span>
            </div>
            <div class="change">
                <a href="changer.php">Изменить</a>
            </div>
        </div>
        <div class="adminPanel">
            <?php
                if ($userInfo['admin'] == 1){
                    echo '<a href="adminPanel.php">Перейти в админ-панель</a>';
                }
            ?>
        </div>
    </div>
</div>
</body>
</html>