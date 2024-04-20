<?php

$dbHost = 'localhost';
$dbName = 'your_database_name';
$dbUsername = 'your_username';
$dbPassword = 'your_password';

// Создать соединение с базой данных
$db = new mysqli($dbHost, $dbName, $dbUsername, $dbPassword);

// Проверка соединения
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Установить кодировку соединения
$db->set_charset("utf8");