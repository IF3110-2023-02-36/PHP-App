function showEditConfirmation() {
    // Tampilkan dialog konfirmasi
    var result = confirm("Apakah Anda yakin ingin mengedit ini?");

    // Jika pengguna mengklik "OK", kembalikan `true` untuk melanjutkan, jika tidak, kembalikan `false` untuk membatalkan pengiriman formulir.
    return result;
}

function showDeleteConfirmation() {
    // Tampilkan dialog konfirmasi
    var result = confirm("Apakah Anda yakin ingin menghapus ini?");

    // Jika pengguna mengklik "OK", kembalikan `true` untuk melanjutkan, jika tidak, kembalikan `false` untuk membatalkan pengiriman formulir.
    return result;
}
