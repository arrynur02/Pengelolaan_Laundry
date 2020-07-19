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
												<table class="table dt-responsive table-bordered nowrap w-100" id="tabel_transaksi">
													<thead>
														<tr>
															<th>No</th>
															<th>Outlet</th>
															<th>Alamat</th>
															<th>tlp</th>
														</tr>
													</thead>
													<tbody>
														<?php $n=1; foreach ($outlet as $key) {
															echo '<tr>';
															echo '<td>'.$n++.'</td>';
															echo '<td>'.$key->nama_outlet.'</td>';
															echo '<td>'.$key->alamat.'</td>';
															echo '<td>'.$key->tlp.'</td>';
															echo '</tr>';
														} ?>
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