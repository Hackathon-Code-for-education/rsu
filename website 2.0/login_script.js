document.addEventListener('DOMContentLoaded', function() {
    // Обработка формы входа
    const loginForm = document.getElementById('loginForm');
    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Отменить отправку формы по умолчанию

        const loginData = {
            email: document.getElementById('email').value,
            password: document.getElementById('password').value
        };

        // Отправить запрос на сервер для аутентификации пользователя
        // (Пример запроса с использованием Fetch API)
        fetch('/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(loginData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Вход успешен
                window.location.href = '/'; // Перенаправить на главную страницу
            } else {
                alert('Неправильный email или пароль.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});