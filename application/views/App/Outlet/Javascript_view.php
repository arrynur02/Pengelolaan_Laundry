<script type="text/Javascript">
	$(document).ready(function() {
		var tabel_outlet = $('#tabel-outlet').DataTable({
			"processing":true,
			"serverSide":true,

			"ajax":{
				"type":"POST",
				"url":"<?= base_url();?>Outlet/get_all_by_tables",
			},
			
			"columns":[
				{"data":"id_outlet",
					render:function(data,type,row,meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}
			},
				{"data":"nama_outlet"},
				{"data":"alamat"},
				{"data":"tlp"},
				{"data":"aksi"},
			],
		});

		$(document).on('click','.btn-insert-outlet',function(){
			$('#modal-tambah').modal('show');
		});

		$('#btn-action-outlet').on('click',function(){
				$.ajax({
					type 	:"POST",
					url 	:BASEURL + "Outlet/insert_outlet",
					data 	:{
						nama: $('#nama-outlet').val(),
						alamat: $('#alamat-outlet').val(),
						tlp: $('#tlp').val(),
					},
					beforeSend:function() {
						$('#modal-tambah').modal('hide');
						loader_show();
					},success:function() {
						notify_success("Berhasil Tambah Outlet..");
						tabel_outlet.ajax.reload();
						loader_hide();

					},error:function() {
						notify_error("Gagal Tambah Outlet !!");
					}
				})
		});

		$('#tabel-outlet').on('click','.btn-edit-outlet',function() {
			let id = $(this).attr("data1");
			let nama = $(this).attr("data2");
			let alamat = $(this).attr("data3");
			let tlp = $(this).attr("data4");
			// --------------------------------
			$('#data-edit-outlet_id').val(id);
			$('#nama-outlet-e').val(nama);
			$('#alamat-outlet-e').val(alamat);
			$('#tlp-e').val(tlp);
			$('#modal-update').modal('show');
		});

		$('#tabel-outlet').on('click','.btn-act-delete',function() {
			data_id = $(this).attr("data_id");
			$('#data_id-outlet').val(data_id);
			$('#modal-confirm-outlet').modal('show');
		});

		$('#btn-delete-outlet-').on('click',function() {
				$.ajax({
					type 	:"POST",
					url 	:BASEURL + "Outlet/delete_outlet",
					data 	:{
						data_id:$("#data_id-outlet").val(),
					},
					beforeSend:function() {
						$('#modal-confirm-outlet').modal('hide');
						loader_show();
					},success:function() {
						notify_success("Berhasil Hapus Outlet..");
						tabel_outlet.ajax.reload();
						loader_hide();

					},error:function() {
						notify_error("Gagal Hapus Outlet !!");
					}
				})
		});

		$('#btn-action-outlet-edit').on('click',function() {
			let data_id = $('#data-edit-outlet_id').val();
			$.ajax({
					type 	:"POST",
					url 	:BASEURL + "Outlet/update_outlet/"+data_id,
					data 	:{
						nama_edit: $('#nama-outlet-e').val(),
						alamat_edit: $('#alamat-outlet-e').val(),
						tlp_edit: $('#tlp-e').val(),
					},
					beforeSend:function() {
						$('#modal-update').modal('hide');
						loader_show();
					},success:function() {
						notify_success("Berhasil Update Outlet..");
						tabel_outlet.ajax.reload();
						loader_hide();

					},error:function() {
						notify_error("Gagal Update Outlet !!");
					}
				});
		});
	});
</script>