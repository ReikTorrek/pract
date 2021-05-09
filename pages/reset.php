<?php
error_reporting(0);
session_start();
require('connect.php');
$_SESSION['msggg'] = '';
if(isset($_POST['username'], $_POST['password'], $_POST['mail'] )){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mail= $_POST['mail'];
    $data = $_POST;

    //$result = mysqli_query($connection, $query);
    $counter = 0;
    if (R::count('users', 'login = ?', array($data['username'])) == 0){
        $_SESSION['msggg'] = "Пользователя с таким именем не существует.";
    }
    if (R::count('users', 'mail = ?', array($data['mail'])) == 1 && R::count('users', 'login = ?', array($data['username'])) == 1){
        $query_id = "SELECT id FROM users WHERE login = '$username' AND mail = '$mail'";
        $result_id = mysqli_query($connection, $query_id) or die(mysqli_error($connection));

        if (mysqli_num_rows($result_id) != 1) {
            $_SESSION['msggg'] = "Проверьте введённые данные";
        }
        else{
            $id_mass = mysqli_fetch_assoc($result_id);
            $id = 0;
            $id = array_shift($id_mass);
            //var_dump($id_mass);
            $counter++;
        }
    }
   // var_dump($counter);
    $pwd = "SELECT password FROM users WHERE login = '$username' AND mail = '$mail'";
    $result_pwd = mysqli_query($connection, $pwd) or die(mysqli_error($connection));
    $pwd_mass = mysqli_fetch_assoc($result_pwd);
    $pwd = 0;
    $pwd = array_shift($pwd_mass);
    var_dump($pwd);
    if($data['password'] == $pwd) {
        $_SESSION['msggg'] = "Пароли совпадают!";
    }
    else{
        $counter++;
    }
    if(R::count('users', 'mail = ?', array($data['mail'])) == 0){
        $_SESSION['msggg'] = "Пользователь с такой почтой не существует.";
    }
    else{
        $counter++;
    }
    //var_dump(mysqli_num_rows($result_id));
   //var_dump($counter);
    if($counter == 3 && mysqli_num_rows($result_id) == 1){
        $_SESSION['msggg'] = "Пароль изменён!";
        // $users->login = $data['username'];
        //$id = R::load('users', $id);
        $users = R::load('users', $id);
        //echo " " . $users . " ";
        $users->password = $data['password'];
      //  $users->mail = $data['mail'];
        R::store($users);


    }
}

?>

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
        <form action="reset.php" id="Reg" method="POST">

            <div class="dws-input">
                <input type="text"  name="username" placeholder="Введите логин" require value="<?php echo @$data['username'] ?>">
            </div>

            <div class="dws-input">
                <input type="password" class="pwd"  name="password" placeholder="Придумайте новый пароль" require value="<?php echo @$data['password'] ?>">
            </div>
            <div class="dws-input">
                <input type="mail" data-rule = "mail"  name="mail" placeholder="Введите почту" require value="<?php echo @$data['mail'] ?>">
            </div>
            <?php
            if ($counter == 3){
                echo '
                            <div class="dws-input"><a href="index.php" class="dws-submit js-buttonReg-campaign"  id="buttonReg1" >Вернуться на главную</a></div> 
                        ';
            }
            else{
                echo '
                <input class = "dws-submit js-submit " id="js-inval" type="submit" name="submit" value="Изменить пароль!" >
                ';
            }
            ?>


            <br>
            <p>
                <?php
                if($_SESSION['msggg']){
                    echo '<p class="msg">'. $_SESSION['msggg'] . '</p>';

                }
                unset($_SESSION['msggg']);
                ?>
            </p>
            <a href="index.php">Отмена</a>

        </form>
    </div>
</div>
<script src="../JS/script1.js"></script>
<script src="../JS/JQuery.js"></script></body>
</html>









