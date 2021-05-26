<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
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
            if (isset($_SESSION['username'])){
                echo '<a href="profilePage.php">' . $_SESSION['username'] .  '</a>';
            }
            else{
                echo '<a href="login.php">Вход</a>';
            }
            ?>
        </div>
    </div>
    <div id="aside">
        <p>Друг 1</p>
        <p>Друг 2</p>
    </div>
    <?php
    $query_tag = "SELECT * FROM album";
    $tag_result = mysqli_query($connection, $query_tag) or die (mysqli_error($connection));
    ?>
    <div id="content">
    <div class="image">
        <span>Добавить альбом</span><br>
        <form action="adder.php" method="get" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Название альбома"><br>
            <input type="file" name="filename1" ><br>
            <input type="submit" name="uploadalbum" value="Загрузить">
        </form>
    </div>
    </div>
</div>
</body>
</html>
