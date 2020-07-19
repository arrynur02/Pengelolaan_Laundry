				<!-- Start Content-->
				<div class="container-fluid">

					<!-- start page title -->
					<div class="row">
						<div class="col-12">
							<div class="page-title-box">
								<h4 class="page-title">Halaman Laporan</h4>
							</div>
						</div>
					</div>     
					<!-- end page title --> 

					<div class="row">
						<div class="col-12">

							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-lg-12">
											<div class="d-print-none mb-2 float-right">
												<div class="text-right">
													<a href="javascript:window.print()" class="btn btn-light"><i class="mdi mdi-printer"></i> Print</a>
													<!-- 	<a href="javascript: void(0);" class="btn btn-info">Submit</a> -->
												</div>
											</div> 
											<div>
												<?= $title; ?>
												<table class="table dt-responsive table-bordered nowrap" id="tabel-laporan_transaksi">
													<thead>
														<tr>
															<th>No</th>
															<th>Kode Invoice</th>
															<th>Outlet</th>
															<th>Member</th>
															<th>Tgl</th>
															<th>Batas Waktu</th>
															<th>Tgl Bayar</th>
															<th>Diskon</th>
															<th>Pajak</th>
															<th>Status</th>
															<th>Dibayar</th>
															<th>Kasir</th>
														</tr>
													</thead>
													<tbody>
														<?php $n=1; foreach ($transaksi as $key) { ?>
															<tr>
																<td><?= $n++; ?></td>
																<td>INV - <?= $key->kode_invoice; ?></td>
																<td><?= $key->nama_outlet; ?></td>
																<td><?= $key->nama_member; ?></td>
																<td><?= $key->tgl; ?></td>
																<td><?= $key->batas_waktu; ?></td>
																<td><?= $key->tgl_bayar; ?></td>
																<td><?php if ($key->diskon == 0) {
																	echo '--';
																}else{echo ''.$key->diskon.'%';} ?></td>
																<td><?php if ($key->pajak == 0) {
																	echo '--';
																}else{
																	echo 'Rp. '.number_format($key->pajak).'';
																} ?></td>
																<td><?= $key->status; ?></td>
																<td><?= $key->dibayar; ?></td>
																<td><?= $key->nama_user; ?></td>
															</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div> <!-- end col -->
									</div>  <!-- end row -->
								</div> <!-- end card body-->
							</div> <!-- end card -->

						</div>
						<!-- end col-12 -->
					</div> <!-- end row -->

				</div> <!-- container -->