<?php
require_once ('connect.php');
$id_aut = $_GET['id'];
$query_tag1 = "SELECT * FROM author WHERE id = '$id_aut'";
$tag_result1 = mysqli_query($connection, $query_tag1) or die (mysqli_error($connection));
$tag = "";
while ($tag = mysqli_fetch_assoc($tag_result1)){


?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Фиксированный подвал</title>
    <style type="text/css">
        #content {
            width: 500px; /* Ширина слоя */
            margin: 0 auto 50px; /* Выравнивание по центру */
        }
        #footer {
            position: fixed; /* Фиксированное положение */
            left: 0; bottom: 0; /* Левый нижний угол */
            padding: 10px; /* Поля вокруг текста */
            background: #39b54a; /* Цвет фона */
            color: #fff; /* Цвет текста */
            width: 100%; /* Ширина слоя */
        }
        body{
            background-color: dimgray;
        }
        #image{
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
        <?php
        echo $tag['desc'];
        ?>
    </p>
</div>
<center><a href="index.php">Go back</a></center>
</body>
</html>

<?php
}
?>