<script type="text/Javascript">
	$(document).ready(function() {
		tabel_transaksi = $('#tabel_transaksi').DataTable({
			"processing":true,
			"serverSide":true,
			"ajax":{
				"type" :"POST",
				"url"  :BASEURL + "Transaksi/getDatatables",
			},
			"language":{
				"paginate":{
					"previous":"<i class='mdi mdi-chevron-left'></i>",
					"next":"<i class='mdi mdi-chevron-right'></i>",
				}
			},
			"columns":[
			{"data":"id_transaksi",
			render:function(data,type,row,meta) {
				return meta.row + meta.settings._iDisplayStart + 1;
			}
		},
		{"data":"nama_member"},
		{"data":"tgl"},
		{"data":"batas_waktu"},
		{"data":"tgl_bayar"},
		{"data":"biaya_tambahan",
		render:function(data,type) {
			if (data == 0) {
				return '--';
			}
		}
	},
	{"data":"diskon",
	render:function(data,type) {
		if (data == 0) {
			return '--';
		}else{
			return ``+data+`%`;
		}
	}
},
{"data":"pajak",
render:function(data,type) {
	if (data == 0) {
		return '--';
	}else{
		var bilangan = data;
		var reverse = bilangan.toString().split('').reverse().join(''),
		ribuan  = reverse.match(/\d{1,3}/g);
		ribuan  = ribuan.join('.').split('').reverse().join('');
		return "Rp. " + ribuan;
	}
}		
},
{"data":"status",
render:function(data,type) {
	if (data == "baru") {
		return `<span class="badge badge-info badge-pill">`+data+`</span>`;
	}
	if (data == "proses") {
		return `<span class="badge badge-warning badge-pill">`+data+`</span>`;
	}
	if (data == "selesai") {
		return `<span class="badge badge-success badge-pill">`+data+`</span>`;
	}
	if (data == "diambil") {
		return `<span class="badge badge-danger badge-pill">`+data+`</span>`;
	}
}
},
{"data":"dibayar",
render:function(data,type) {
	if (data == "belum_dibayar") {
		return `<span class="badge badge-warning badge-pill">`+data+`</span>`;
	}else{
		return `<span class="badge badge-success badge-pill">`+data+`</span>`;
	}
}
},
{"data":"aksi"},
],drawCallback:function(){
	$(".dataTables_paginate > .pagination").addClass("pagination-rounded")
}
});

		$(document).on('click','.btn-ins-transaksi',function() {
			$('#modal-tambah-transaksi').modal('show');
		});

		$('#form-tambah-transaksi').on('submit',function(event) {
			event.preventDefault();
			$.get({
				type 	:"POST",
				url 	:BASEURL + "Transaksi/insert_transaksi",
				data 	:{
					outlet:$('#outlet-ins').val(),
					bw:$('#bw-ins').val(),
					tb:$('#tb-ins').val(),
					member:$('#member-ins').val(),
					bt:$('#bt-ins').val(),
					pajak:$('#pajak-ins').val(),
					diskon:$('#diskon-ins').val(),
				},
				beforeSend:function() {
					$('#modal-tambah-transaksi').modal('hide');
					loader_show();
				},success:function() {
					loader_hide();
					tabel_transaksi.ajax.reload();
					$('#form-tambah-transaksi').trigger('reset');
					notify_success("Berhasil Tambah Transaksi");
				},error:function() {
					notify_error("Gagal Tambah Transaksi");
				}
			})
		});

		$('#keyword-member-').on('keyup',function() {
			var keymem = $(this).val();
			$.get({
				type 	:"POST",
				url 	:BASEURL + "Transaksi/getMemberBykeyword/"+keymem,
				dataType:"JSON",
				success:function(isthis) {
					if (keymem != "") {
						contents_ = `<table class="table table-bordered dt-responsive w-100 mt-3">
						<thead>
						<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Aksi</th>
						</tr>
						</thead>
						<tbody>`+isthis.isi_tabel+`</tbody>
						</table>`;
						$('#tabel-member-').html(contents_);
					}else{
						alert("harap Isikan Member ..");
						$('#tabel-member-').html('');
					}
					if (true) {}
				}
		})
		});

		$('#tambahTrans').on('submit',function(e) {
			e.preventDefault();
			let keywrdmember = $('#keyword-member-').val()
			btnnxtT = $(this).val();
			$.get({
				type 	:"POST",
				url 	:BASEURL + "Transaksi/transaksi_",
				data 	:{
					outlet:$('#outlet-ins').val(),
					batas_waktu:$('#bw-ins').val(),
					tgl_bayar:$('#tb-ins').val(),
					member:$('#data_id-Nama_member').val(),
				},
				dataType:"JSON",
				success:function(irest) {
					$('#modal-tambah-transaksi').modal('hide');
					tabel_transaksi.ajax.reload();
					notify_success("Berhasil Tambah Transaksi");
					$('#kd-invoice-detail-trans').val(irest.kode_invoice);
					$('#nm-member-detail-trans').val(irest.nama_member);
					$('#id-invoice-detail-trans').val(irest.id_transaksi);
				}
			})
			// $('#modal-detail-transaksi').modal('show');
		});

		$('#tabel_transaksi').on('click','.btn-delete-transaksi',function() {
			let id = $(this).attr("data_id");
			$('#dt-id-delete-transaksi-').val(id); 
			$('#modal-confirm_transaksi').modal('show');
		});

		$('#btn-action-delete-transaksi').on('click',function() {
			let id_transaksi = $('#dt-id-delete-transaksi-').val();
			$.ajax({
				type 	:"POST",
				url 	: BASEURL + "Transaksi/delete_transaksi_/"+id_transaksi,
				beforeSend:function() {
					$('#modal-confirm_transaksi').modal('hide');
				},success:function() {
					tabel_transaksi.ajax.reload();
					notify_success("Berhasil Hapus Data Transaksi");
				},error:function() {
					tabel_transaksi.ajax.reload();
					notify_error("Gagal Hapus Data Transaksi");
				}
			})
		});

		$('#tabel_transaksi').on('click','.btn-edit-transaksi',function() {
			$('#modal-detail-transaksi-2').modal('show');
			let data_id = $(this).attr("data1");
			$.get({
				type 	:"GET",
				url 	:BASEURL + "Transaksi/getdetailTransaksi_2/"+data_id,
				dataType:"json",
				success:function(data) {
					if (data.pajak == 0) {
						pajak = '';
					}else{
						pajak = data.pajak;
					}
					if (data.diskon == 0) {
						diskon = '';
					}else{
						diskon = data.diskon;
					}
					tabel_detail_trans(data.id_transaksi);
					$('#kd-invoice-detail-trans-2').val(data.kode_invoice);
					$('#nm-member-detail-trans-2').val(data.nama_member);
					$('#id-invoice-detail-trans-2').val(data.id_transaksi);
					$('#batas_waktu-updt').val(data.batas_waktu);
					$('#tgl_bayar-updt').val(data.tgl_bayar);
					$('#outlet-updt-trans-2 [value="'+data.id_outlet+'"]').attr('selected',true);
					$('#nama-paket-detail_trans-2').html(data.nama_paket);
					$('#diskon_transaksi').val(diskon);
					$('#pajak_transaksi-').val(pajak)
				}
			});
		});
		function tabel_detail_trans(id_transaksi) {
			$.get({
				type 	:"POST",
				url 	:BASEURL + "Transaksi/gettabeldetailTrans_/"+id_transaksi,
				// data 	:{id:id_transaksi},
				dataType :"json",
				success:function(respons_) {
					var bilangan = respons_.total_jum;
					var reverse = bilangan.toString().split('').reverse().join(''),
					ribuan  = reverse.match(/\d{1,3}/g);
					ribuan  = ribuan.join(',').split('').reverse().join('');

					$('#tabel-detail_trans-').html(respons_.data_tabel_detail_trans);
					tampil_total = `<h4> Rp. `+ribuan+`</h4>`;
					$('#total-harga_detail-trans').html(tampil_total);
					$('#total-input-transaksi_').val(respons_.total_jum);
					$('#subtotal_detail-transaksi').val(respons_.total_jum);
					// total_harga(respons_.total_jum);
				}
			});
		}

		$('#outlet-updt-trans-2').on('input',function() {
			let data_paket_id = $(this).val();
			$.get({
				type 	:"POST",
				url 	:BASEURL + "Transaksi/selectByOutlet/"+data_paket_id,
				dataType: "json",
				success:function(respons) {
					$('#nama-paket-detail_trans-2').html(respons);
				}
			})
		});
		$('#btn-insert_detailTrans').on('click',function() {
			let id_transaksi = $('#id-invoice-detail-trans-2').val();
			$.ajax({
				type 	:"POST",
				url 	:BASEURL + "Transaksi/tambah_detailTrans/",
				data 	:{
					id_transaksi:id_transaksi,
					id_paket:$('#nama-paket-detail_trans-2').val(),
					qty:$('#qty_detrans').val(),
					keterangan:$('#keterangan-deTrans').val(),
				},success:function() {
					$('#qty_detrans').val('');
					$('#keterangan-deTrans').val('');
					tabel_detail_trans(id_transaksi);
					notify_success("Berhasil Tambah Paket Cucian..");
				},error:function() {
					notify_error("Gagal Tambah Paket Cucian..");
				}
			})
		});

		$('#tabel-detail_trans-').on('click','.btn-delete-detail_transaksi',function() {
			// $('#modal-confirm_delete-detail_trans').modal('show');
			let confirm_ = confirm("Anda Yakin Ingin Hapus Data Ini ?"); 
			let data_id = $(this).attr("data_id");
			let id_transaksi = $(this).attr("id_transaksi");
			$('#dt-id-delete-detail_trans').val(data_id);
			if (confirm_ == true) {
				$.get({
					type 	:"GET",
					url 	:BASEURL + "Transaksi/delete_detail_transaksi/"+data_id,
					success:function() {
						$('#tr_tabel-detailTrans-'+data_id+'').remove();
						tabel_detail_trans(id_transaksi);
						notify_success("Berhasil Hapus Paket Cucian..");
					},error:function() {
						notify_error("Gagal Hapus Paket Cucian !!");
					}
				})
			}
		});

		// load detail invoice
		$('#tabel_transaksi').on('click','.btn-zoom-transaksi',function() {
			let content_detail = $(this).attr("data-target");
			$.ajax({
				url :content_detail,
				cache:false,
				beforeSend:function() {
					loader_show();
				},success:function(load) {
					loader_hide();
					$('#this-content-').empty().append(load);
				}
			})
		});
		// $(document).on('click','.btn-back-detail_invoce',function() {
		// 	let href_back = $(this).attr("data-target");
		// 		$.ajax({
		// 			url 	:href_back,
		// 			cache   :false,
		// 			beforeSend:function() {
		// 				loader_show();
		// 			},success:function(success) {
		// 				$('#tabel_transaksi').ajax.reload();
		// 				loader_hide();
		// 				$('#this-content-').empty().append(success);
		// 			}
		// 		});
		// })
		$('#status-detail-transaksi').on('input',function() {
			let status = $(this).val();
			if (status == "selesai") {
				$('#status-detail-transaksi-2').append(`<option value="dibayar">Dibayar</option>`);
			}else{
				$('#status-detail-transaksi-2').html('<option value="belum_dibayar">Belum Dibayar</option>');
			}
		})
		// $('#input-bayar-detrans').on('keyup',function() {
		// 	let bayar = $(this).val();
		// 	let pajak = $('#pajak_transaksi-').val();
		// 	let diskon = $('#diskon_transaksi').val();
		// 	// jumlah = pajak+diskon;
		// 	output = bayar-(diskon/100)*diskon;
		// 	$('#input-kembalian-detrans').val(output);
		// });
		// $('#input-bayar-detrans').on('keyup',function() {
		// 	bayar = $(this).val();
		// 	let total = $('#subtotal_detail-transaksi').val();
		// 	hasil = bayar-total;
		// 	$('#input-kembalian-detrans').val(hasil)
		// })
		// $('#pajak_transaksi-').on('keyup',function() {
		// 	const pajak = $(this).val();
		// 	const total = $('#total-input-transaksi_').val();
		// 	if (pajak == "") {
		// 		hasil = $('#subtotal_detail-transaksi').val();;
		// 	}else{
		// 		hasil = parseInt(total) + parseInt(pajak);
		// 	}

		// 	var bilangan = hasil;
		// 	var reverse = bilangan.toString().split('').reverse().join(''),
		// 	ribuan  = reverse.match(/\d{1,3}/g);
		// 	ribuan  = ribuan.join(',').split('').reverse().join('');
		// 	totals = `<h4>Rp. `+ribuan+`</h4>`;

		// 	$('#total-input-transaksi_').val(hasil);
		// 	$('#total-harga_detail-trans').html(totals);
		// });
		$('#diskon_transaksi').on('input',function() {
			let diskon = $('#diskon_transaksi').val();
			let total = $('#total-input-transaksi_').val();
			if (diskon == "") {
				hasil = $('#subtotal_detail-transaksi').val();
			}else{
				hasil = total-(diskon/100)*total;
			}

			var bilangan = hasil;
			var reverse = bilangan.toString().split('').reverse().join(''),
			ribuan  = reverse.match(/\d{1,3}/g);
			ribuan  = ribuan.join(',').split('').reverse().join('');
			totals = `<h4>Rp. `+ribuan+`</h4>`;

			$('#total-input-transaksi_').val(hasil);
			$('#total-harga_detail-trans').html(totals);
		});
		$('#form-edit_data_transaksi').on('submit',function(o) {
			o.preventDefault();
			let id_transaksi = $('#id-invoice-detail-trans-2').val();
			$.ajax({
				type 	:"POST",
				url 	:BASEURL + "Transaksi/edit_transaksi/"+id_transaksi,
				data 	:{
					status_transaksi:$('#status-detail-transaksi').val(),
					status_bayar:$('#status-detail-transaksi-2').val(),
					outlet:$('#outlet-updt-trans-2').val(),
					pajak:$('#pajak_transaksi-').val(),
					diskon:$('#diskon_transaksi').val(),
					batas_waktu:$('#batas_waktu-updt').val(),
					tgl_bayar:$('#tgl_bayar-updt').val(),
					total_harga:$('#total-input-transaksi_').val(),
				},beforeSend:function() {
					$('#modal-detail-transaksi-2').modal('hide');
				},success:function() {
					tabel_transaksi.ajax.reload();
					notify_success("Berhasil Edit Transaksi");
				},error:function() {
					notify_error("Gagal Edit Transaksi");
				}
			})
		});
		// Input Date & Time
		$('#input_bw-updt').on('input',function() {
			let value = $(this).val();
			$('#batas_waktu-updt').val(value);
		});
		$('#input_tb-updt').on('input',function() {
			let value = $(this).val();
			$('#tgl_bayar-updt').val(value);
		});
	});
function input_transaksi() {
	let bayar = $('#input-bayar-detrans').val();
	let total = $('#total-input-transaksi_').val();
	let pajak = $('#pajak_transaksi-').val();
	let diskon = $('#diskon_transaksi').val();
	
	if (bayar == "") {
		output = '';
	}else{
		output = bayar-total;
	}
	$('#input-kembalian-detrans').val(output);
}
// function input_transaksi_2() {
// 	let bayar = $('#input-bayar-detrans').val();
// 	let total = $('#total-input-transaksi_').val();
// 	let pajak = $('#pajak_transaksi-').val();
// 	let diskon = $('#diskon_transaksi').val();

// 	if (pajak == "" || diskon == "") {
// 		hasil = total;
// 	}else{
// 		if (pajak) {
// 			hasil = parseInt(total) + parseInt(pajak);
// 			var bilangan = hasil;
// 			var reverse = bilangan.toString().split('').reverse().join(''),
// 			ribuan  = reverse.match(/\d{1,3}/g);
// 			ribuan  = ribuan.join(',').split('').reverse().join('');
// 			totals = `<h4>Rp. `+ribuan+`</h4>`;

// 			$('#total-input-transaksi_').val(hasil);
// 			$('#total-harga_detail-trans').html(totals);
// 		}else if (diskon) {
// 			let diskon = $('#diskon_transaksi').val();
// 			let total = $('#total-input-transaksi_').val();
// 			if (diskon == "") {
// 				hasil = $('#subtotal_detail-transaksi').val();
// 			}else{
// 				hasil = total*10/100;
// 				// hasil = total-(diskon/100)*total;
// 			}

// 			var bilangan = hasil;
// 			var reverse = bilangan.toString().split('').reverse().join(''),
// 			ribuan  = reverse.match(/\d{1,3}/g);
// 			ribuan  = ribuan.join(',').split('').reverse().join('');
// 			totals = `<h4>Rp. `+ribuan+`</h4>`;

// 			$('#total-input-transaksi_').val(hasil);
// 			$('#total-harga_detail-trans').html(totals);
// 		}
// 	}

// }
function inputPajak_() {
	$('#diskon_transaksi').attr("readonly",false);
	let bayar = $('#input-bayar-detrans').val();
	let pajak = $('#pajak_transaksi-').val();
	let total = $('#subtotal_detail-transaksi').val();

	if (pajak == "") {
		ripiah = total;
	}else{
		output1 = parseInt(total) + parseInt(pajak);
		rupiah = output1;
	}
	var bilangan = rupiah;
	var reverse = bilangan.toString().split('').reverse().join(''),
	ribuan  = reverse.match(/\d{1,3}/g);
	ribuan  = ribuan.join(',').split('').reverse().join('');
	totals = `<h4>Rp. `+ribuan+`</h4>`;

	$('#total-input-transaksi_').val(rupiah);
	$('#total-harga_detail-trans').html(totals);
}
function clickSendId(id) {
	$('#data_id-Nama_member').val(id);
}
</script>