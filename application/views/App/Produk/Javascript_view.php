<script type="text/Javascript">
	$(document).ready(function() {
		tabel_paket = $('#tabel_paket').DataTable({
			"processing":true,
			"serverSide":true,
			"language":{
				"paginate":{
					"previous":"<i class='mdi mdi-chevron-left'>",
					"next":"<i class='mdi mdi-chevron-right'>"
				},
			},"ajax":{
				"type":"POST",
				"url" : BASEURL + "Produk/getall_dt",
			},
				"columns":[
					{"data":"id_paket",
						render:function(data,type,row,meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
					{"data":"nama_outlet"},
					{"data":"nama_paket"},
					{"data":"jenis"},
					{"data":"harga",
						render:function(data,type,row,meta){
	                    var bilangan = data;
						var	reverse = bilangan.toString().split('').reverse().join(''),
							ribuan 	= reverse.match(/\d{1,3}/g);
							ribuan	= ribuan.join('.').split('').reverse().join('');

						return "Rp. "+ribuan;
                     }     
				},
					{"data":"aksi"},
				],drawCallback:function() {
					$(".dataTables_paginate > .pagination").addClass("pagination-rounded")
				}
		});
		$(document).on('click','.btn-ins-paket',function() {
			$('#modal-tambah-paket').modal('show');
		});

		$('#form-tambah-paket').submit(prossestambahpaket);

		$('#form-update-paket').submit(prossesupdatepaket);

		$('#tabel_paket').on('click','.btn-actn-delete',function() {
			$('#modal-confirm-paket').modal('show');
			data_id = $(this).attr("data_id");
			$('#dt-id-delete-paket').val(data_id);
		});

		$('#btn-action-delete-paket-').click(prossesDeletepaket);

		$('#tabel_paket').on('click','.btn-edit-paket',function() {
			let data_id = $(this).attr("data1");
			 	$.get({
			 		type 	:"GET",
			 		url 	:BASEURL + "Produk/getById/"+data_id,
			 		dataType:"JSON",
			 		success:function(respons) {
			 			var bilangan = respons.harga;
						var	reverse = bilangan.toString().split('').reverse().join(''),
							ribuan 	= reverse.match(/\d{1,3}/g);
							ribuan	= ribuan.join('.').split('').reverse().join('');
			 			$('#modal-update-paket').modal('show');
			 			$('#dt-id_paket-').val(respons.id_paket);
			 			$('#outlet-updt [value="'+respons.id_outlet+'"]').attr('selected',true);
			 			$('#nama-updt').val(respons.nama_paket);
			 			$('#jenis-updt [value="'+respons.jenis+'"]').attr('selected',true);
			 			$('#harga-updt').val(ribuan);
			 		}
			 	});
		});

	});
	// Tambah -------------------------------------------------------------
	function prossestambahpaket(event) {
		event.preventDefault();
			$.ajax({
					type :"POST",
					url  :BASEURL + "Produk/ins_produk",
					data:{
						outlet:$('#outlet-ins').val(),
						nama:$('#nama-ins').val(),
						jenis:$('#jenis-ins').val(),
						harga:$('#harga-ins').val(),
					},
					beforeSend:function() {
						$('#modal-tambah-paket').modal('hide');
						loader_show();			
					},success:function() {
						loader_hide();
						$('#form-tambah-paket').trigger('reset');
						tabel_paket.ajax.reload();
						notify_success("Berhasil Tambah Paket..");
					},error:function() {
						notify_error("Gagal Tambah Paket !!");
					}
				});
		}
		// Delete -------------------------------------------------------
		function prossesDeletepaket(event) {
			event.preventDefault();
				let data_id = $('#dt-id-delete-paket').val();
				$.get({
					type 	:"GET",
					url 	:BASEURL + "Produk/delete_produk/"+data_id,
					beforeSend:function() {
						$('#modal-confirm-paket').modal('hide');
						loader_show();			
					},success:function() {
						loader_hide();
						tabel_paket.ajax.reload();
						notify_success("Berhasil Hapus Paket..");
					},error:function() {
						notify_error("Gagal Hapus Paket !!");
					}
				});
		}
		function prossesupdatepaket(event) {
			event.preventDefault();
				let data_id = $('#dt-id_paket-').val();
				$.get({
					type 	:"POST",
					url 	:BASEURL + "Produk/update_produk/"+data_id,
					data:{
						outlet:$('#outlet-updt').val(),
						nama:$('#nama-updt').val(),
						jenis:$('#jenis-updt').val(),
						harga:$('#harga-updt').val(),
					},beforeSend:function() {
						$('#modal-update-paket').modal('hide');
						loader_show();			
					},success:function() {
						loader_hide();
						tabel_paket.ajax.reload();
						notify_success("Berhasil Update Paket..");
					},error:function() {
						notify_error("Gagal Update Paket !!");
					}
				});
		}
</script>