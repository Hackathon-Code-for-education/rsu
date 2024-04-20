document.addEventListener('DOMContentLoaded', function() {
    // Загрузить товары из сервера
    fetch('/shop-products')
        .then(response => response.json())
        .then(data => {
            const productsContainer = document.querySelector('.shop__products');
            data.products.forEach(product => {
                const productItem = document.createElement('div');
                productItem.classList.add('shop__product');
                productItem.innerHTML = `
                    <img src="${product.image}" alt="${product.name}" class="shop__product__image">
                    <h3 class="shop__product__title">${product.name}</h3>
                    <p class="shop__product__price">${product.price} руб.</p>
                    <button class="shop__product__button">В корзину</button>
                `;
                productsContainer.appendChild(productItem);
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });

    // Обработка события "В корзину"
    const addToCartButtons = document.querySelectorAll('.shop__product__button');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.closest('.shop__product').dataset.productId; // Получить ID товара
            // Добавить товар в корзину (реализация зависит от вашей системы корзины)
            console.log('Добавить товар в корзину:', productId);
        });
    });
});