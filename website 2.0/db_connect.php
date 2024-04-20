<?php

$dbHost = 'localhost';
$dbName = 'user';
$dbUsername = 'root';
$dbPassword = '';

// Создать соединение с базой данных
$db = new mysqli($dbHost, $dbName, $dbUsername, $dbPassword);

// Проверка соединения
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Установить кодировку соединения
$db->set_charset("utf8");
