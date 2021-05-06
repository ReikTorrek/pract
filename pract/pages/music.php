<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Музыка</title>
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
            <a href="music.php">Музыка</a>
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
                echo '<a href="logout.php">' . $_SESSION['username'] .  '</a>';
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
    <div id="content">
        <div class="music_tags">
            <span>
                Название
            </span>
            <span>
                Автор
            </span>
            <span>
                Прродолжительность
            </span>
            <span>
                Ссылка на автора
            </span>
        </div>
        <div class="music">
            <span>
                Надо поле притоптать
            </span>
            <span>
                Нейромонах Феофан
            </span>
            <span>
                3.46
            </span>
            <span>
                google.com
            </span>
        </div>
    </div>
</div>
</body>
</html>