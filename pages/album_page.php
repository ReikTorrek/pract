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
        <link href="../css/styles.css" rel="stylesheet" type="text/css"/>


        <style type="text/css">

            #content {
                width: 500px; /* Ширина слоя */
                margin: 0 auto 50px; /* Выравнивание по центру */
            }

            #footer {
                position: fixed; /* Фиксированное положение */
                left: 0;
                bottom: 0; /* Левый нижний угол */
                padding: 10px; /* Поля вокруг текста */
                background: #39b54a; /* Цвет фона */
                color: #fff; /* Цвет текста */
                width: 100%; /* Ширина слоя */
            }

            body {
                background-color: dimgray;
            }

            #image {
                width: 100%;
                text-align: center;
            }
        </style>
    </head>
    <body>
    <div id="image">
        <img src=" <?php echo $tag['pic']; ?> " alt="">
    </div>
    <div id="content">
        <p>
            <a href="<?php echo $tag['link']; ?>">источник</a>
        </p>
    </div>

    <div class="example">
        <audio src="" controls id="player"></audio>
        <?php
        while ($tagSongs = mysqli_fetch_assoc($tagResultSongs)) {
            ?>
            <div class="songs">
                <a class="linkUrl" href="#"
                   data="http://localhost/htdocs/Valhalla/2020/pract/music/<?php echo $tagSongs['link']; ?>"><?php echo $tagSongs['name']; ?></a>
            </div>
            <div class="songInfo">
                <div class="link"
                     data-attr="http://localhost/htdocs/Valhalla/2020/pract/music/<?php echo $tagSongs['link']; ?>"></div>
                <div class="id" data-attr="<?php echo $tagSongs['id']; ?>"></div>
                <div class="name" data-attr="<?php echo $tagSongs['name']; ?>"></div>
            </div>
            <?php
        }
        ?>
    </div>

    </div>


    <center><a href="index.php">Go back</a></center>
    <script type="text/javascript" src="../JS/JQuery.js"></script>
    <script type="text/javascript" src="../JS/main.js"></script>
    <script type="text/javascript" src="../JS/AudioController.js"></script>
    </body>
    </html>

    <?php
}
?>
