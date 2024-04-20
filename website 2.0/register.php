<?php

// Подключить к базе данных
require('db_connect.php');

// Получить данные из формы
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];

// Проверка валидности данных
if (empty($name) || empty($email) || empty($password) || empty($passwordConfirm)) {
    $error = 'Все поля обязательны к заполнению.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Неверный формат email.';
} elseif (strlen($password) < 8) {
    $error = 'Пароль должен быть не менее 8 символов.';
} elseif ($password !== $passwordConfirm) {
    $error = 'Пароли не совпадают.';
} else {
    // Проверка уникальности email
    $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $error = 'Пользователь с таким email уже существует.';
    } else {
        // Хеширование пароля
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Регистрация пользователя
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
        $db->query($sql);

        if ($db->affected_rows > 0) {
            // Регистрация успешна
            session_start();
            $_SESSION['user_id'] = $db->insert_id;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;

            header('Location: /'); // Перенаправить на главную страницу
            exit;
        } else {
            $error = 'Ошибка регистрации.';
        }
    }
}

// Отобразить ошибку (если есть)
if (isset($error)) {
    echo json_encode(['error' => $error]);
} else {
    echo json_encode(['success' => true]);
}