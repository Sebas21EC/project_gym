const quantityInput = document.getElementById('quantity');
const unitPriceInput = document.getElementById('unit_price');
const totalPriceInput = document.getElementById('total_price');

// Agregar event listeners para detectar cambios en los valores
quantityInput.addEventListener('input', updateTotalPrice);
unitPriceInput.addEventListener('input', updateTotalPrice);

function updateTotalPrice() {
    // Obtener los valores de cantidad y precio unitario
    const quantity = parseFloat(quantityInput.value);
    const unitPrice = parseFloat(unitPriceInput.value);

    // Calcular el precio total
    const totalPrice = quantity * unitPrice;

    // Actualizar el valor del campo de precio total
    totalPriceInput.value = totalPrice.toFixed(2); 
}



