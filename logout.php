<?php
session_start(); // запускаем сессию

// удаляем идентификатор пользователя из сессии
unset($_SESSION['login']);

// перенаправляем пользователя на страницу авторизации или главную страницу сайта
header('Location: main.php');
exit();
