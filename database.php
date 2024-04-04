<?php

$host = 'localhost'; // адрес сервера
$db_name = 'ramil_city'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'root'; // пароль

// создание подключения к базе   
$connection = mysqli_connect($host, $user, $password, $db_name);

function getUser($connection)
{
    // текст SQL запроса, который будет передан базе
    $query = 'SELECT * FROM `users`';

    // выполняем запрос к базе данных
    $result = mysqli_query($connection, $query);
    while ($row = $result->fetch_assoc()) {
        echo  $row['id'];
        echo  '<br>';
        echo  $row['lastname'];
        echo  '<br>';
        echo  $row['firstname'];
        echo  '<br>';
        echo  $row['patrynomic'];
        echo  '<br>';
        echo  $row['login'];
        echo  '<br>';
        echo  $row['email'];
        echo  '<br>';
        echo  $row['password'];
        echo  '<br>';
    }

    // закрываем соединение с базой
    mysqli_close($connection);
}
// getUser($connection);

function register($lastname, $firstname, $patrynomic, $login, $email, $password)
{
    global $connection; // используем глобальную переменную $connection

    // проверяем, существует ли пользователь с таким же логином или email
    $query = "SELECT * FROM `users` WHERE `login` = '$login' OR `email` = '$email'";
    $result = mysqli_query($connection, $query);

    global $message;

    if (mysqli_num_rows($result) > 0) {
        $message = 'Пользователь с таким логином или email уже существует';
        return false;
    }

    // текст SQL запроса, который будет передан базе
    $query = "INSERT INTO `users` (`lastname`, `firstname`, `patrynomic`, `login`, `email`, `password`) VALUES ('$lastname', '$firstname', '$patrynomic', '$login', '$email', '$password')";

    // выполняем запрос к базе данных
    $result = mysqli_query($connection, $query);

    // проверяем, был ли запрос выполнен успешно
    if ($result) {
        session_start();
        $_SESSION['id'] = mysqli_insert_id($connection);
        $message = "Пользователь успешно зарегистрирован";
        return true;
    } else {
        $message = "Ошибка при регистрации пользователя: " . mysqli_error($connection);
        return false;
    }

    // закрываем соединение с базой
    mysqli_close($connection);
}

function login($login, $password)
{
    global $connection; // используем глобальную переменную $connection

    // проверяем, существует ли пользователь с таким логином
    $query = "SELECT * FROM `users` WHERE `login` = '$login'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // проверяем, совпадает ли пароль
        if ($password === $user['password']) {
            // пароль верный, сохраняем идентификатор пользователя в сессии
            session_start();
            $_SESSION['login'] = $user['login'];
            $_SESSION['id'] = $user['id'];
            echo "<script>location.href = '/lk.php';</script>"; // перенаправление на страницу личного кабинета
            return true;
        } else {
            global $message;
            $message = 'Неверный пароль';
            return false;
        }
    } else {
        global $message;
        $message = 'Пользователь с таким логином не найден';
        return false;
    }
    // закрываем соединение с базой
    mysqli_close($connection);
}

function createTask($title, $category, $desc, $userId)
{
    global $connection; // используем глобальную переменную $connection
    global $message;

    // текст SQL запроса, который будет передан базе
    $query = "INSERT INTO `task` (`user_id`, `title`, `category`, `description`) VALUES ('$userId', '$title', '$category', '$desc')";

    // выполняем запрос к базе данных
    $result = mysqli_query($connection, $query);

    // проверяем, был ли запрос выполнен успешно
    if ($result) {
        return true;
    } else {
        $message = "Ошибка при создании задачи: " . mysqli_error($connection);
        return false;
    }

    // закрываем соединение с базой
    mysqli_close($connection);
}

function getTask($userId)
{
    global $connection; // используем глобальную переменную $connection

    // текст SQL запроса, который будет передан базе
    $query = "SELECT * FROM `task` WHERE `user_id` = '$userId'";

    // выполняем запрос к базе данных
    $result = mysqli_query($connection, $query);

    // создаем пустой массив для хранения задач
    $tasks = array();

    // цикл while для получения всех строк из результата запроса
    while ($row = mysqli_fetch_assoc($result)) {
        // добавляем каждую строку в массив задач
        $tasks[] = $row;
    }

    // возвращаем массив задач
    return $tasks;
}
