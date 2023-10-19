function editCategory(row, categoryId) {
    event.preventDefault(); 

    const categoryCell = row.querySelector('.category-name');
    const categoryName = categoryCell.innerText;
    
    const input = document.createElement('input');
    input.type = 'text';
    input.value = categoryName;
    
    categoryCell.innerHTML = '';
    categoryCell.appendChild(input);
    
    const saveButton = document.createElement('button');
    saveButton.textContent = 'save';
    
    const buttonCell = row.querySelector('.edit-button button');
    buttonCell.replaceWith(saveButton);
    
    input.focus();
    
    saveButton.addEventListener('click', async function() {
        if(confirm('Apakah Anda yakin ingin mengubah kategori ini?')){
            const newCategoryName = input.value;

            var xhr = new XMLHttpRequest();
            var method = "POST";
            var url = "EditCategory.php";

            var formData = new FormData();
            formData.append("category_id", categoryId);
            formData.append("category_name", newCategoryName);
            console.log(categoryId);
            console.log(newCategoryName);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                    } else {
                        console.error("Terjadi kesalahan: " + xhr.status);
                    }
                }
            };

            xhr.open(method, url, true);
            xhr.send(formData);
        }
    });
}



// Menangani klik tombol "delete"
async function deleteCategory(categoryId) {
    if (confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
        var xhr = new XMLHttpRequest();
        var method = "POST";
        var url = "DeleteCategory.php"; 

        var formData = new FormData();
        formData.append("category_id", categoryId);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    
                    const rowToDelete = document.querySelector(`tr[data-category-id="${categoryId}"]`);
                    if (rowToDelete) {
                        rowToDelete.remove();
                    }
                } else {
                    console.error("Terjadi kesalahan: " + xhr.status);
                }
            }
        };

        xhr.open(method, url, true);
        xhr.send(formData);
    }
}
