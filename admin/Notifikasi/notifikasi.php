<script>
$(document).ready(function() {
    // Cek apakah ada notifikasi
    var response = '<?php echo isset($_GET["response"]) ? $_GET["response"] : ""; ?>';

    function showNotification(icon, title, message) {
        Swal.fire({
            icon: icon,
            title: title,
            text: message
        }).then((result) => {
            // Setelah notifikasi ditutup, arahkan kembali ke halaman asal tanpa parameter response
            if (result.isConfirmed) {
                window.location.href = window.location.pathname;
                // Hapus parameter 'response' dari URL agar notifikasi tidak muncul lagi
                history.replaceState({}, document.title, window.location.pathname);
            }
        });
    }

    if (response === "success") {
        showNotification('success', 'Data Berhasil Disimpan', 'Data telah berhasil disimpan ke dalam database.');
    } else if (response === "warning") {
        showNotification('warning', 'Gagal', 'Data Telah ada');
    } else if (response === "update_success") {
        showNotification('success', 'Data Berhasil Terupdate', 'Data telah berhasil disimpan ke dalam database.');
    } else if (response === "hapus_success") {
        showNotification('success', 'Data Berhasil Terhapus', 'Data telah berhasil disimpan ke dalam database.');
    }
});
</script>
