<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Автор</title>
    <link rel="stylesheet" href="../css/main.css"></head>
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
    <div id="content">
        <div class="author">
            <span id="author">Авторы</span>
            <div class="image">
                <?php
                require_once('connect.php');
                require_once('../components/author_components/ComponentAuthorAvatar.php');
                $query_tag1 = "SELECT * FROM author";
                $tag_result1 = mysqli_query($connection, $query_tag1) or die (mysqli_error($connection));
                while ($tag1 = mysqli_fetch_assoc($tag_result1)){
                    new ComponentAuthorAvatar($tag1);
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>