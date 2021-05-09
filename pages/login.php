<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
</div>
<div class="overlay js-overlay-campaign">
    <div class="popup js-popup-campaign">
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
        <?php

        if (isset($_SESSION['username'])){
            echo '

                            <div class="logout" onclick="document.location = \'logout.php\'"  " title="button" id="button"><span>Выйти</span></div>';
        }
        else{
            echo '

    <form  class="Ent" method="post" action="login.php">
        <div class="dws-input">
            <input type="text" name="username" placeholder="Введите логин" maxlength="100">
        </div>

        <div class="dws-input">
            <input type="password" name="password" placeholder="Введите пароль" >
        </div>
        <button class = "dws-submit"  name="submit">Войти</button>
        <br>
        <a href="reset.php">Восстановить пароль</a><br>
        <a href="reg.php" class="buttonReg js-buttonReg-campaign" id="buttonReg" >Нет аккаунта? Зарегистрироваться!</a>
    </form>
</div>
</div>';
        }

        ?>



        <?php

            require_once ('connect.php');

            if (isset($_POST['username']) && isset($_POST['password'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $query = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
                $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                $count = mysqli_num_rows($result);
            }
            if ($count == 1){
                $_SESSION['username'] = $username;
                header('location: index.php');
            }
            else{
                $_SESSION['msgg'] = "Данные введены неверно.";
            }
        ?>
</body>
<script src="../JS/script1.js"></script>
<script src="../JS/JQuery.js"></script></body>
</html>