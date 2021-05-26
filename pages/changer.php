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
            //require_once('loadPhoto.php');
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
            <form action="mailchanger.php" method="get">
                <div class="mail">
                    <span>Ваша почта:</span>
                    <input type="text" name="mail" data-rule = "mail" placeholder="<?php echo $userInfo['mail']; ?>">
                </div>
                <div class="mail">
                    <span>Ваш логин:</span>
                    <input type="text" name="login" data-rule = "login" placeholder="<?php echo $userInfo['username']; ?>">
                </div>
                <div class="mail">
                    <span>Внимание, после смены логина вам надо будет заново авторизоваться, используя свой новый логин.</span>
                    <br>
                    <span><?php echo $_SESSION['error_message'];
                                $_SESSION['error_message'] = "";
                    ?></span>
                </div>
                <div class="change">
                    <input type="submit" name="rename" value="Сохранить">
                </div>
            </form>
            <form action="loadPhoto.php" method="post" enctype="multipart/form-data">
                <div class="imageChanger">
                    <span>Сменить аватар профиля</span><br>
                    <input type="file" name="filename" >
                    <input type="submit" name="upload" value="Загрузить">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../JS/script1.js"></script>
<script src="../JS/JQuery.js"></script>
</body>
</html>