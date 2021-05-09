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
    <div class="popupReg js-popupReg-campaign"
    <form action="check.php" id="Reg" method="POST">

        <div class="dws-input">
            <input type="text"  name="username" placeholder="Придумайте логин"  ">
        </div>

        <div class="dws-input">
            <input type="password" class="pwd"  name="password" maxlength="100" placeholder="Придумайте пароль"   ">
        </div>

        <div class="dws-input">
            <input type="password" class="pwd1"  name="password2" maxlength="100" placeholder="Повторите пароль"   ">
        </div>

        <div class="dws-input">
            <input type="mail" data-rule = "mail"  name="mail" maxlength="100" placeholder="Введите почту"   ">
        </div>
        <button type="submit">Зарегестрироваться</button>
        <br>
        <p>
            <?php
            session_start();
            $_SESSION['msgg1'] = "";
            if($_SESSION['msgg1']){
                echo '<p class="msg">'. $_SESSION['msgg1'] . '</p>';

            }
            unset($_SESSION['msgg1']);
            ?>
        </p>
        <a href="index.php">Отмена</a>

    </form>
</div>
</div>
<script src="../JS/script1.js"></script>
<script src="../JS/JQuery.js"></script>
</body>
</html>









