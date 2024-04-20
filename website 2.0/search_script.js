document.addEventListener('DOMContentLoaded', function() {
    // Обработка формы поиска
    const searchForm = document.getElementById('searchForm');
    searchForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Отменить отправку формы по умолчанию

        const searchData = {
            name: document.getElementById('name').value,
            country: document.getElementById('country').value,
            city: document.getElementById('city').value,
            program: document.getElementById('program').value
        };

        // Отправить запрос на сервер для получения университетов
        // (Пример запроса с использованием Fetch API)
        fetch('/search-universities', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(searchData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.universities.length > 0) {
                displayUniversities(data.universities);
            } else {
                displayNoResultsMessage();
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // Функция для отображения списка университетов
    function displayUniversities(universities) {
        const universitiesList = document.getElementById('universitiesList');
        universitiesList.innerHTML = ''; // Очистить список

        universities.forEach(university => {
            const universityItem = document.createElement('div');
            universityItem.classList.add('university');
            universityItem.innerHTML = `
                <a href="/university/${university.id}">
                    <img src="${university.image}" alt="${university.name}">
                    <h3>${university.name}</h3>
                    <p>${university.city}, ${university.country}</p>
                </a>
            `;
            universitiesList.appendChild(universityItem);
        });
    }

    // Функция для отображения сообщения "Нет результатов"
    function displayNoResultsMessage() {
        const universitiesList = document.getElementById('universitiesList');
        universitiesList.innerHTML = '<p>По вашему запросу университетов не найдено.</p>';
    }
});
