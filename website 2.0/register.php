<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Университи+</h1>
        <nav>
            </nav>
    </header>

    <main>
        <section class="register">
            <h2>Регистрация</h2>
            <form action="register.php" method="post">
                <div class="register-form__group">
                    <label for="login">Логин:</label>
                    <input type="text" id="login" name="login" placeholder="Введите логин" required>
                </div>
                <div class="register-form__group">
                    <label for="password">Пароль:</label>
                    <input type="password" id="password" name="password" placeholder="Введите пароль" required>
                </div>
                <button type="submit">Зарегистрироваться</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Университи+</p>
    </footer>

    <script src="register_script.php"></script>
	<?php

require_once('config.php');

// Обработка данных формы
if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    // Проверка на пустые поля
    if (empty($login) || empty($password)) {
        echo "Заполните все поля!";
        exit;
    }

    // Хеширование пароля
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Запрос на добавление пользователя в базу данных
    $sql = "INSERT INTO users (login, password) VALUES ('$login', '$hashedPassword')";

    if ($db->query($sql) === TRUE) {
        echo "Регистрация успешна!";
        header('Location: login.php'); // Перенаправление на страницу входа
        exit;
    } else {
        echo "Ошибка регистрации: " . $db->error;
    }
}

?>
</body>
</html>
