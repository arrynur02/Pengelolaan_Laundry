<script type="text/javascript">
	$(document).ready(function() {
		  tabel_member = $('#tabel-member').DataTable({
			"processing":true,
			"serverSide":true,
			"language":{
			"paginate":{
				"previous":"<i class='mdi mdi-chevron-left'>",
				"next":"<i class='mdi mdi-chevron-right'>"
				},
			},"ajax":{
				"url":BASEURL + "Member/tampil_datatables_member",
				"type":"POST",
			},
			"columns":[
				{"data":"id_member",
					render:function(data,type,row,meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}
			},
				{"data":"nama"},
				{"data":"alamat"},
				{"data":"jenis_kelamin",
					render:function(data,type) {
						if (data == "L") {
							return `<span class="badge badge-info-lighten badge-pill"> Laki-Laki </span>`
						}
						if (data == "P") {
							return `<span class="badge badge-danger-lighten badge-pill"> Perempuan </span>`
						}
						if (data == "") {
							return `<span class="badge badge-danger-lighten badge-pill"> ---- </span>`
						}
					}
			},
				{"data":"tlp"},
				{"data":"aksi"},
			],drawCallback:function(){
				$(".dataTables_paginate > .pagination").addClass("pagination-rounded")
				}
		}); 

		$(document).on('click','.btn-ins-member',function() {
			$('#modal-tambah-member').modal('show');
		});

		$('#tabel-member').on('click','.btn-delete-member',function() {
			$('#modal-confirm-member').modal('show');
			data_id = $(this).attr("data_id");
			$('#dt-id-delete-member').val(data_id);
		});

		$('#tabel-member').on('click','.btn-edit-member',function() {
			$('#modal-update-member').modal('show');
			data_id = $(this).attr("data_u");
				$.ajax({
					type 	:"GET",
					url 	:BASEURL + "Member/geTByIdMember/"+data_id,
					success:function(events) {
						let member = JSON.parse(events);
						$('#dt-id-updt-member').val(member[0].id_member)
						$('#nama-updt').val(member[0].nama);
						$('#jk-updt [value="'+member[0].jenis_kelamin+'"]').attr('selected',true);
						$('#tlp-updt').val(member[0].tlp);
						$('#alamat-updt').val(member[0].alamat);
					}
				})
		});

		$('#form-tambah-member').submit(prosestambahMember);

		$('#form-update-member').submit(prosesUpdateMember);

		$('#btn-action-delete-member-').click(prosesDeleteMember);

		// Area ---- Proses -----------------------------------------------------------------------------------------------

		
	});
	// Tambah ---------------------------------------------------
		function prosestambahMember(event) {
			event.preventDefault();
				$.ajax({
					type :"POST",
					url  :BASEURL + "Member/ins_member",
					data:{
						nama:$('#nama-ins').val(),
						jk:$('#jk-ins').val(),
						tlp:$('#tlp-ins').val(),
						alamat:$('#alamat-ins').val(),
					},
					beforeSend:function() {
						$('#modal-tambah-member').modal('hide');
						loader_show();			
					},success:function() {
						loader_hide();
						$('#form-tambah-member').trigger('reset');
						tabel_member.ajax.reload();
						notify_success("Berhasil Tambah Member..");
					},error:function() {
						notify_error("Gagal Tambah Member !!");
					}
				});
		}
		// Update --------------------------------------------------
		// function fuct_idUpdate(event) {
		// 	event.preventDefault();
		// 	let data_id = $('#dt-id-updt-member').val();
		// 		prosesUpdateMember(data_id);
		// }
		function prosesUpdateMember(event) {
			event.preventDefault();
				let data_id = $('#dt-id-updt-member').val();
				$.ajax({
					type :"POST",
					url  :BASEURL + "Member/updt_member/"+data_id,
					data:{
						nama:$('#nama-updt').val(),
						jk:$('#jk-updt').val(),
						tlp:$('#tlp-updt').val(),
						alamat:$('#alamat-updt').val(),
					},
					beforeSend:function() {
						$('#modal-update-member').modal('hide');
						loader_show();			
					},success:function() {
						loader_hide();
						$('#form-update-member').trigger('reset');
						tabel_member.ajax.reload();
						notify_success("Berhasil Update Member..");
					},error:function() {
						notify_error("Gagal Update Member !!");
					}
				});
		}
		// Delete ---------------------------------------------------
		function prosesDeleteMember() {
			let data_id = $('#dt-id-delete-member').val();
			$.ajax({
					type :"POST",
					url  :BASEURL + "Member/delete_member/"+data_id,
					beforeSend:function() {
						$('#modal-confirm-member').modal('hide');
						loader_show();			
					},success:function() {
						loader_hide();
						tabel_member.ajax.reload();
						notify_success("Berhasil Delete Member..");
					},error:function() {
						notify_error("Gagal Delete Member !!");
					}
				});
		}
</script>