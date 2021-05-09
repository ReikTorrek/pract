<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>
<pre>
<?php


require_once "../components/author_components/ComponentAuthorPage.php"; //Запрос файла компонента аватарки автора.
require_once "../components/author_components/ComponentAuthorAvatar.php"; //Запрос файла

function test_ComponentAuthorAvatar() // Создание функции
{
    echo "Запускаю тест компонента аватарки.\n"; // Вывод текста о запуске теста компонента
    echo "Тестируем как отображается аватарка\n"; // Вывод теста о начале тестирования
    $id = 1; // Создание переменной id
    $pic = "../png"; // Создание переменной, отвечающей за картинку
    ob_start(); // Вызов функции
    $comp = new ComponentAuthorAvatar([ // Создание переменной класса
        "id" => $id, // Обозначение переменных
        "pic" => $pic // Обозначение переменных
    ]);
    $render = ob_get_clean(); // Создание переменной
    $needle = "<a href='author_page.php?id=$id'> <img src='../assets/$pic' alt=''></a>"; // Создание переменной, содержащей путь к картинке.
    echo "\n\n";
    echo htmlspecialchars("Ожидание:    $needle\n"); // Вывод ожидаемогорезультата
    echo htmlspecialchars("Реальность:  $render\n"); // Вывод реального результата
    echo "\n\n";
    if ($needle == $comp->render()) // Проверка совпадения результатов
        echo "Аватарка отображается правильно!\n"; // Вывод текста, если результаты совпадают
    else
        echo htmlspecialchars("Ошибка теста, строка $needle, не равна $render\n"); // Вывод результата, если переменные не совпадают.
}

function test_ComponentAuthorAvatar_2() // Создание функции.
{
    echo "Запускаю тест компонента аватарки.\n"; // Вывод текста о запуске теста компонента
    echo "Тестируем как отображается аватарка\n"; // Вывод теста о начале тестирования
    $id = "ABC"; // Создание переменной id
    $pic = "../1.png"; // Создание переменной, отвечающей за картинку
    ob_start(); // Вызов функции
    $comp = new ComponentAuthorAvatar([ // Создание переменной класса
        "id" => $id, // Обозначение переменных
        "pic" => $pic // Обозначение переменных
    ]);
    $render = ob_get_clean(); // Создание переменно
    $needle = "<a href='author_page.php?id=$id'> <img src='../assets/$pic' alt=''></a>"; // Создание переменной, содержащей путь к картинке.
    echo "\n\n";
    echo htmlspecialchars("Ожидание:    $needle\n"); // Вывод ожидаемогорезультата
    echo htmlspecialchars("Реальность:  $render\n"); // Вывод реального результата
    echo "\n\n";
    if ($needle == $comp->render()) // Проверка совпадения результатов
        echo "Аватарка отображается правильно!\n"; // Вывод текста, если результаты совпадают
    else
        echo htmlspecialchars("Ошибка теста, строка $needle, не равна $render\n"); // Вывод результата, если переменные не совпадают.
}


echo "======================\n";
test_ComponentAuthorAvatar(); // Вызов функции.
echo "======================\n\n";

echo "======================\n";
test_ComponentAuthorAvatar_2(); // Вызов функции.
echo "======================\n";
?>
</pre>
</body>
