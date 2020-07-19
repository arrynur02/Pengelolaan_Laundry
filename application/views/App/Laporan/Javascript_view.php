<script>
	$(document).ready(function() {
		$('#tabel-laporan_transaksi').DataTable({
			"async":false,
			"language":{
				"paginate":{
					"previous":"<i class='mdi mdi-chevron-left'>",
					"next":"<i class='mdi mdi-chevron-right'>"
				},
			},drawCallback:function() {
				$(".dataTables_paginate > .pagination").addClass("pagination-rounded")
			}
		});
	})
</script>