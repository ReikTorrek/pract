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
    //var_dump($album);
    //var_dump($queryTagSongs);
    $tagResultSongs = mysqli_query($connection, $queryTagSongs) or die (mysqli_error($connection));
    //var_dump($tagResultSongs);
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title><?php echo $tag['name']; ?></title>
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
                height: 100%;
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
    <?php
    while ($tagSongs = mysqli_fetch_assoc($tagResultSongs)) {

        ?>
        <div id="songs">
            <audio src="../music/<?php echo $tagSongs['link'] ?>" controls></audio>
        </div>
        <?php

    }
    ?>

    <center><a href="index.php">Go back</a></center>
    </body>
    </html>

    <?php
}
?>
