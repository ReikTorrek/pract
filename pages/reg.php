<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div class="overlayReg js-overlayReg-campaign">
    <div class="popupReg js-popupReg-campaign">
        <form action="check.php" id="Reg" method="POST">

            <div class="dws-input">
                <input type="text" name="login"  placeholder="Придумайте логин" require value="<?php echo @$data['$username']?>">
            </div>

            <div class="dws-input">
                <input type="password" class = "password" name="password"  placeholder="Придумайте пароль" require value="<?php echo @$data['$password']?>">
            </div>

            <div class="dws-input">
                <input type="password" class ="password1" name="password1"  placeholder="Повторите пароль" require value="<?php echo @$data['$password2']?>">
            </div>

            <div class="dws-input">
                <input type="mail" name="mail" data-rule = "mail" placeholder="Введите почту" require value="<?php echo @$data['$mail']?>">
            </div>
            <div class="dws-input">
                <button class="btn btn-success"  type ="submit" >Регистрация</button>
            </div>
            <a href="index.php">Отмена</a>

            <p>
                <?php
                error_reporting(0);
                session_start();
                if($_SESSION['msgg']){
                    echo '<p class="msg">'. $_SESSION['msgg'] . '</p>';
                }
                unset($_SESSION['msgg']);
                ?>
            </p>

        </form>
    </div>
</div><script src="../JS/script1.js"></script>
<script src="../JS/JQuery.js"></script>
</body>
</html>









