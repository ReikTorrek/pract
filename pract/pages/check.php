<?php
    session_start();

    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);;
    $password_check = filter_var(trim($_POST['password1']), FILTER_SANITIZE_STRING);;
    $mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_STRING);

    if ($password != $password_check){
        $_SESSION['msgg'] = 'пароли не совпадают';
        header('location: http://localhost/htdocs/Valhalla/2020/pract/pages/reg.php');
    }
    if (mb_strlen($login) < 4 || mb_strlen($login) > 90){
        $_SESSION['msgg'] = 'Недопустимая длинна логина';
        header('location: http://localhost/htdocs/Valhalla/2020/pract/pages/reg.php');
    }
    elseif (mb_strlen($password) < 5 || mb_strlen($password) > 90){
        $_SESSION['msgg'] = 'Недопустимая длинна пароля (От 9 до 90 символов)';
        header('location: http://localhost/htdocs/Valhalla/2020/pract/pages/reg.php');
    }

    require_once ('connect.php');
    $query_tag1 = "SELECT * FROM users";
    $tag_result1 = mysqli_query($connection, $query_tag1) or die (mysqli_error($connection));
    $result = "";
    $counter = 0;
    var_dump(mysqli_num_rows($tag_result1));
    var_dump($counter);
    while(mysqli_num_rows($tag_result1) > $counter) {
        $result = mysqli_fetch_assoc($tag_result1);

        if ($login == $result['username']) {
            $_SESSION['msgg'] = "Такой логин уже занят";
            header('location: http://localhost/htdocs/Valhalla/2020/pract/pages/reg.php');
            break;
        }
        $counter ++;
    }
    var_dump($counter);
    if ($counter == mysqli_num_rows($tag_result1)){
        $connection->query("INSERT INTO users (username, password, mail) VALUES ('$login', '$password', '$mail') ");
        $_SESSION['msgg'] = "Вы успешно зарегестрировались!";
        header('location: http://localhost/htdocs/Valhalla/2020/pract/pages/reg.php');
    }



?>