<?php
session_start();
require_once ('connect.php');
if (isset($_GET['uploadalbum'])) {
    $queryAlbum = "SELECT * FROM album";
    $albumResult = mysqli_query($connection, $queryAlbum) or die (mysqli_error($connection));
    move_uploaded_file($_FILES['filename1']['tmp_name'],
        "../assets/" . $_FILES['filename1']['name']);
    $picName = $_FILES['filename1']['name'];
    $albumName = $_GET['name'];
    $source = "../assets/" + $picName;
    var_dump($source);
    var_dump($picName);
//var_dump(mysqli_fetch_assoc($profileResult));
    $connection->query("INSERT INTO album (name, pic) VALUES ('$albumName' ,'../assets/$picName')");
    //header("Location: index.php");
}