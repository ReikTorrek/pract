<?php
    session_start();
    session_destroy();
    header('location: http://localhost/htdocs/Valhalla/2020/pract/pages/index.php');
?>