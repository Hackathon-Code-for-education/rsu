<?php

// Подключить к базе данных
require('db_connect.php');

// Получить данные из формы
$email = $_POST['email'];
$password = $_POST['password'];

// Проверить наличие пользователя в базе данных
$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Проверить пароль
    if (password_verify($password, $user['password'])) {
        // Вход успешен
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];

        header('Location: /'); // Перенаправить на главную страницу
        exit;
    } else {
        // Неверный пароль
        $error = 'Неверный пароль.';
    }
} else {
    // Пользователь не найден
    $error = 'Пользователь с таким email не зарегистрирован.';
}

// Отобразить ошибку (если есть)
if (isset($error)) {
    echo json_encode(['error' => $error]);
} else {
    echo json_encode(['success' => true]);
}