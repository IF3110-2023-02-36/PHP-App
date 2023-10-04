function editCategory(row, categoryId) {
    event.preventDefault()
    // Dapatkan elemen <td> yang berisi nama kategori
    const categoryCell = row.querySelector('.category-name');
    
    // Dapatkan teks saat ini
    const categoryName = categoryCell.innerText;
    
    // Buat elemen input untuk mengedit nama kategori
    const input = document.createElement('input');
    input.type = 'text';
    input.value = categoryName;
    
    // Ganti elemen <td> dengan elemen input
    categoryCell.innerHTML = '';
    categoryCell.appendChild(input);
    
    // Buat tombol "save"
    const saveButton = document.createElement('button');
    saveButton.textContent = 'save';
    
    // Tambahkan tombol "save" ke dalam form
    row.querySelector('form').appendChild(saveButton);
    
    // Fokuskan input
    input.focus();
    
    // Tambahkan event listener untuk menyimpan perubahan saat tombol "save" diklik
    saveButton.addEventListener('click', function() {
        // Simpan perubahan ke server atau lakukan yang lain sesuai kebutuhan
        const newCategoryName = input.value;

        var xhr = new XMLHttpRequest();
        var method = "POST"; // Gantilah sesuai dengan jenis permintaan yang Anda perlukan
        var url = "EditCategory.php"; // Gantilah dengan URL controller yang sesuai

        var formData = new FormData();
        formData.append("category_id", categoryId); // Gunakan categoryId yang sudah didapatkan
        formData.append("category_name", newCategoryName); // Gantilah dengan data yang sesuai

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Berhasil, Anda dapat menangani respons di sini
                    console.log(xhr.responseText);
                } else {
                    // Gagal, Anda dapat menangani kesalahan di sini
                    console.error("Terjadi kesalahan: " + xhr.status);
                }
            }
        };

        xhr.open(method, url, true);
        xhr.send(formData); // Gantilah dengan objek data yang sesuai
    });
}


// Menangani klik tombol "delete"
function deleteCategory(categoryId) {
    if (confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
        // Konfirmasi penghapusan
        var xhr = new XMLHttpRequest();
        var method = "POST";
        var url = "DeleteCategory.php"; // Gantilah dengan URL controller yang sesuai

        var formData = new FormData();
        formData.append("category_id", categoryId);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Kategori berhasil dihapus, Anda dapat menangani respons di sini
                    console.log(xhr.responseText);
                    
                    // Hapus baris dari tabel
                    const rowToDelete = document.querySelector(`tr[data-category-id="${categoryId}"]`);
                    if (rowToDelete) {
                        rowToDelete.remove();
                    }
                } else {
                    // Gagal, Anda dapat menangani kesalahan di sini
                    console.error("Terjadi kesalahan: " + xhr.status);
                }
            }
        };

        xhr.open(method, url, true);
        xhr.send(formData);
    }
}
