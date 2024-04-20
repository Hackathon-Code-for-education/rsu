<?php

$dbHost = 'localhost'; // Адрес хоста базы данных
$dbName = 'users'; // Название базы данных
$dbUsername = 'root'; // Имя пользователя базы данных
$dbPassword = ''; // Пароль базы данных

// Подключение к базе данных
$db = new mysqli($dbHost, $dbName, $dbUsername, $dbPassword);

// Проверка подключения
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Установка кодировки соединения
$db->set_charset("utf8");