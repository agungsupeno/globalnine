<!-------------------
KODE EKSEKUSI
Pemganggilan Ajax Barang dan Material
-------------------------->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		document.getElementById('nama_type').addEventListener('change', function () {
			var namaType = this.value;
			var kodeBarangSelect = document.getElementById('kode_barang');
			kodeBarangSelect.innerHTML = '<option value="">Barang</option>';
				
			if (namaType) {
				$.ajax({
					type: "POST",
					url: "Notifikasi/get_material_out.php",
				    data: { nama_type: namaType },
					success: function(data) {
						kodeBarangSelect.innerHTML += data;
					}
				});
			}
	});

	document.getElementById('kode_barang').addEventListener('change', function () {
		var kodeBarang = this.value;
		var materialSelect = document.getElementById('material');
		materialSelect.innerHTML = '<option value="">Material</option>';

		if (kodeBarang) {
		var selectedOption = this.options[this.selectedIndex];
		var material = selectedOption.getAttribute('data-material');

		if (material) {
			materialSelect.innerHTML += '<option value="' + material + '">' + material + '</option>';
			}
	    }
	});
</script>