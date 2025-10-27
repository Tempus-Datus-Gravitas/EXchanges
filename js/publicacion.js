// Script para manejar acciones de los botones
document.addEventListener('DOMContentLoaded', () => {
    const comprarBtn = document.querySelector('.comprar');
    const carritoBtn = document.querySelector('.carrito');

    comprarBtn.addEventListener('click', () => {
        alert('Gracias por tu compra 🛒');
    });

    carritoBtn.addEventListener('click', () => {
        alert('Producto agregado al carrito ✅');
    });
});