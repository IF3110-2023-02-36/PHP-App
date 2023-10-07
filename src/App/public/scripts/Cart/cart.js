function updateCart(button) {
    if(confirm("Apakah anda yakin ingin mengubah ini?")){
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
}

function deleteCartItem(button) {
    if(confirm("Apakah anda yakin ingin menghapus ini?"))
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


function showCheckoutAlert(message) {
    const checkoutAlert = document.getElementById("checkout-alert");
    checkoutAlert.textContent = message;
    checkoutAlert.style.backgroundColor = "green";
    checkoutAlert.style.color = "white";
    checkoutAlert.style.padding = "10px";
    checkoutAlert.style.display = "block";
    
    // Set timeout to hide the alert after a few seconds (e.g., 3 seconds)
    setTimeout(function() {
        checkoutAlert.style.display = "none";
    }, 3000); // 3000 milliseconds = 3 seconds
}
