function updateCart(button) {
    var quantityInput = button.parentElement.parentElement.querySelector('.quantity-input');
    var productId = quantityInput.dataset.productId; 
    var newQuantity = quantityInput.value; 

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'UpdateCart', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            window.location.reload(); 
        }
    };
    
    xhr.send('product_id=' + productId + '&new_quantity=' + newQuantity);
}

function deleteCartItem(button) {
    var quantityInput = button.parentElement.parentElement.querySelector('.quantity-input');
    var productId = quantityInput.dataset.productId; 

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'DeleteCart', true); // Ubah URL menjadi 'delete_cart.php'
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                window.location.reload(); 
            } 
        }
    };

    xhr.send('product_id=' + productId);
}


