<script>
	$(document).ready(function() {
		var table_user = $('#istables').DataTable({
		"processing":true,
		"serverSide":true,
		"language":{
			"paginate":{
				"previous":"<i class='mdi mdi-chevron-left'>",
				"next":"<i class='mdi mdi-chevron-right'>"
			},
		},"ajax":{
			"type":"POST",
			"url":"<?= base_url();?>Management_user/datatables",
		},
		"columns":[
			{"data":"id_user",
				render:function(data,type,row,meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
		},
			{"data":"nama_outlet"},
			{"data":"nama"},
			{"data":"username"},
			{"data":"role",
				render:function(data,type) {
					if (data == "admin") {
						return `<a href="javascript:void(0)" class="badge badge-outline-success badge-pill badge">`+data+`</a>`;
					}else if (data == "kasir") {
						return `<a href="javascript:void(0)" class="badge badge-outline-warning badge-pill">`+data+`</a>`;
					}else if (data == "owner") {
						return `<a href="javascript:void(0)" class="badge badge-outline-info badge-pill">`+data+`</a>`;
					}else{
						return `<a href="javascript:void(0)" class="badge badge-outline-danger badge-pill">Null</a>`;
					}
				}
		},
		{"data":"aksi"},
		],drawCallback:function(){
		$(".dataTables_paginate > .pagination").addClass("pagination-rounded")
		}
		});
		// --------------------------------------- Proses Tambah Data ----------------------------------------------
		$(document).on('click','.btn-insert',function(){
			$('#modal-tambah').modal('show');
		});

		$('#btn-action-insert-outlet').on('click',function() {
			$.ajax({
				type 	:"POST",
				url 	:BASEURL + "Management_user/insert_users",
				data 	:{
					nama:$('#nama').val(),
					username:$('#username').val(),
					password:$('#pssword').val(),
					outlet:$('#outlet').val(),
					role:$('#role').val(),
				},
				beforeSend:function() {
					$('#modal-tambah').modal('hide');
					loader_show();
				},success:function() {
					table_user.ajax.reload();
					loader_hide();
					notify_success("Berhasil Tambah User ..");
				},error:function() {
					notify_error("Gagal Tambah User !!");
				}
			});
		});
		// ------------------------------------------ Proses Edit Data --------------------------------------------
		$('#istables').on('click','.btn-edit-user',function(){
			let id = $(this).attr("data_u1");
			let nama = $(this).attr("data_u2");
			let username = $(this).attr("data_u3");
			let password = $(this).attr("data_u4");
			let role = $(this).attr("data_u5");
			let outlet = $(this).attr("data_u6");
			// ---------------------------------------------------------
			$('#data-id-user-updt').val(id);
			$('#nama-edit').val(nama);
			$('#username-edit').val(username);
			$('#password-edit').val(password);
			$('#role-edit [value="'+role+'"]').attr('selected',true);
			$('#outlet-edit [value="'+outlet+'"]').attr('selected',true);
			$('#modal-update').modal('show');
		});


		$('#btn-action-updt-outlet').on('click',function() {
			let data_id = $('#data-id-user-updt').val();
			$.ajax({
				type 	:"POST",
				url 	:BASEURL + "Management_user/update_users/"+data_id,
				data 	:{
					nama_e:$('#nama-edit').val(),
					username_e:$('#username-edit').val(),
					password_e:$('#password-edit').val(),
					outlet_e:$('#outlet-edit').val(),
					role_e:$('#role-edit').val(),
				},
				beforeSend:function() {
					$('#modal-update').modal('hide');
					loader_show();
				},success:function() {
					table_user.ajax.reload();
					loader_hide();
					notify_success("Berhasil Update User ..");
				},error:function() {
					notify_error("Gagal Update User !!");
				}
			})
		});
		// ---------------------------- Proses Hapus Data -------------------------------------------------------
		$('#istables').on('click','.btn-delete-usr',function() {
			data_id = $(this).attr("data_id");
			$('#dt-id-delete-user').val(data_id);
			$('#modal-confirm-user').modal('show');
		});


		$('#btn-action-delete-user-').on('click',function() {
			    let data_id = $('#dt-id-delete-user').val();
				$.ajax({
					type :"GET",
					url  :BASEURL + "Management_user/delete_users/"+data_id,
				beforeSend:function() {
					$('#modal-confirm-user').modal('hide');
					loader_show();
				},success:function() {
					table_user.ajax.reload();
					loader_hide();
					notify_success("Berhasil Hapus User ..");
				},error:function() {
					notify_error("Gagal Hapus User !!");
				}
			});
		});
		// --------------------------------------- End Crud ------------------------------------------------------------

	});
</script>