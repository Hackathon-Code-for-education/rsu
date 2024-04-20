document.addEventListener('DOMContentLoaded', function() {
    // Обработка кнопки "Начать поиск"
    const startSearchButton = document.querySelector('.hero__button');
    startSearchButton.addEventListener('click', function() {
        // Перенаправить пользователя на страницу поиска университетов
        window.location.href = '/search';
    });

    // Обработка кнопки "Подробнее" в секции "О нас"
    const moreInfoButton = document.querySelector('.about-us__button');
    moreInfoButton.addEventListener('click', function() {
        // Отобразить модальное окно с подробной информацией о проекте
        // (Пример реализации модального окна)
        const modal = document.createElement('div');
        modal.classList.add('modal');
        modal.innerHTML = `
            <div class="modal__content">
                <h2>Университи+ - О нас</h2>
                <p>Университи+ - это команда профессионалов, которые хотят помочь вам сделать правильный выбор университета. Мы собрали на нашем сайте информацию о лучших университетах России, чтобы вы могли найти тот, который идеально подойдет вам.</p>
                <button class="modal__close">Закрыть</button>
            </div>
        `;
        document.body.appendChild(modal);

        const modalCloseButton = document.querySelector('.modal__close');
        modalCloseButton.addEventListener('click', function() {
            modal.remove();
        });
    });
});