document.addEventListener('DOMContentLoaded', function() {
    // Обработка формы регистрации
    const registerForm = document.getElementById('registerForm');
    registerForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Отменить отправку формы по умолчанию

        const userData = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            password: document.getElementById('password').value,
            passwordConfirm: document.getElementById('passwordConfirm').value
        };
        // Отправить запрос на сервер для регистрации пользователя
        // (Пример запроса с использованием Fetch API)
        fetch('/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(userData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Регистрация успешна
                window.location