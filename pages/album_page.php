<?php
require_once('connect.php');
$id_aut = $_GET['id'];
$query_tag1 = "SELECT * FROM album WHERE id = '$id_aut'";
$tag_result1 = mysqli_query($connection, $query_tag1) or die (mysqli_error($connection));
//var_dump($tag_result1);
$tag = "";
$tagSongs = "";
while ($tag = mysqli_fetch_assoc($tag_result1)) {
    $album = $tag['name'];
    $queryTagSongs = "SELECT * FROM songs WHERE album = '$album'";
    $tagResultSongs = mysqli_query($connection, $queryTagSongs) or die (mysqli_error($connection));
    //var_dump($tagResultSongs);
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="Script Tutorials"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <title><?php echo $tag['name']; ?></title>
        <link href="../css/main.css" rel="stylesheet" type="text/css"/>
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
            <div id="image">
                <center> <img src=" <?php echo $tag['pic']; ?> " alt=""></center>
            </div>
            <audio src="" controls id="player"></audio>
            <div class="songList">

                <?php
                while ($tagSongs = mysqli_fetch_assoc($tagResultSongs)) {
                    ?>
                    <div class="songs">
                        <a class="linkUrl" href="#"
                           data="http://localhost/htdocs/Valhalla/2020/pract/music/<?php echo $tagSongs['link']; ?>"><?php echo $tagSongs['name']; ?></a>
                    </div>
                    <div class="songInfo">
                        <div class="link"
                             data-attr="http://localhost/htdocs/Valhalla/2020/pract/music/<?php echo $tag['name']; ?>/<?php echo $tagSongs['link']; ?>"></div>
                        <div class="id" data-attr="<?php echo $tagSongs['id']; ?>"></div>
                        <div class="name" data-attr="<?php echo $tagSongs['name']; ?>"></div>
                    </div>
                    <?php
                }
                ?>
            </div>

        </div>
    </div>

    <script type="text/javascript" src="../JS/JQuery.js"></script>
    <script type="text/javascript" src="../JS/main.js"></script>
    <script type="text/javascript" src="../JS/AudioController.js"></script>
    </body>
    </html>

    <?php
}
?>
