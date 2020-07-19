                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Invoice</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <!-- Invoice Logo-->
                                        <div class="clearfix">
                                            <div class="float-left mb-3">
                                                <img src="<?= base_url();?>assets/images/logo-light.png" alt="" height="18">
                                            </div>
                                            <div class="float-right">
                                                <h4 class="m-0 d-print-none">Invoice</h4>
                                            </div>
                                        </div>

                                        <!-- Invoice Detail-->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="float-left mt-3">
                                                    <p><b>Hello, <?= $invoice->nama_member; ?></b></p>
                                                    <p class="text-muted font-13">
                                                        <?= $invoice->alamat_member; ?>
                                                    </p>
                                                </div>

                                            </div><!-- end col -->
                                            <div class="col-sm-4 offset-sm-2">
                                                <div class="mt-3 float-sm-right">
                                                    <p class="font-13"><strong>Order Date: </strong> &nbsp;&nbsp;&nbsp; <?= $invoice->tgl; ?></p>
                                                    <p class="font-13"><strong>Order Status: </strong>
                                                        <?php if ($invoice->status == "baru") { ?>
                                                            <span class="badge badge-info float-right"> Baru </span>
                                                        <?php }elseif ($invoice->status == "proses") { ?>
                                                            <span class="badge badge-warning float-right"> Proses </span>
                                                        <?php }elseif ($invoice->status == "selesai") { ?>
                                                            <span class="badge badge-primary float-right"> Selesai </span>
                                                        <?php }elseif ($invoice->status == "diambil") { ?>
                                                            <span class="badge badge-success float-right"> Diambil </span>
                                                        <?php } ?>
                                                    </p>
                                                    <p class="font-13"><strong>Invoice: </strong> <span class="float-right"><?= $invoice->kode_invoice; ?></span></p>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <div class="row mt-4">
                                            <div class="col-sm-8">
                                                <h4>Outlet : <?= $invoice->nama_outlet; ?></h4><hr>
                                                <address>
                                                    Alamat : <?= $invoice->alamat_outlet; ?><br>
                                                   <!--  795 Folsom Ave, Suite 600<br>
                                                    San Francisco, CA 94107<br> -->
                                                    <abbr title="Phone">tlp:</abbr> <?= $invoice->tlp_outlet; ?>
                                                </address>
                                            </div> <!-- end col-->

                                            <!-- <div class="col-sm-4">
                                                <h6>Shipping Address</h6>
                                                <address>
                                                    Cooper Hobson<br>
                                                    795 Folsom Ave, Suite 600<br>
                                                    San Francisco, CA 94107<br>
                                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                                </address>
                                            </div> --> 
                                            <!-- end col-->

                                            <div class="col-sm-4">
                                                <div class="text-sm-right">
                                                    <img src="assets/images/barcode.png" alt="barcode-image" class="img-fluid mr-2" />
                                                </div>
                                            </div> <!-- end col-->
                                        </div>    
                                        <!-- end row -->        

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table mt-4">
                                                        <thead>
                                                            <tr><th>#</th>
                                                                <th>Paket Cucian</th>
                                                                <th>Qty</th>
                                                                <th>Harga</th>
                                                                <th class="text-right">Total</th>
                                                            </tr></thead>
                                                            <tbody>
                                                                <?php $n=1; foreach ($detail_transaksi as $row): ?>
                                                                <tr>
                                                                    <td><?= $n++; ?></td>
                                                                    <td>
                                                                        <b><?= $row->nama_paket; ?></b> <br/>
                                                                        <?= $row->keterangan; ?>
                                                                    </td>
                                                                    <td><?= $row->qty; ?></td>
                                                                    <td>Rp. <?= number_format($row->harga); ?></td>
                                                                    <td class="text-right">Rp. <?= number_format($row->qty*$row->harga); ?></td>
                                                                </tr>
                                                            <?php endforeach ?>
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end table-responsive-->
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="clearfix pt-3">
                                                    <h6 class="text-muted">Notes:</h6>
                                                    <small>
                                                        All accounts are to be paid within 7 days from receipt of
                                                        supplied as confirmation of work undertaken will be charged the
                                                        agreed quoted fee noted above.
                                                    </small>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="float-right mt-3 mt-sm-0">
                                                    <p><b>Sub-total:&nbsp;&nbsp;&nbsp; </b> <span class="float-right"><?php $total_harga = $total_harga;
                                                        echo 'Rp. '.number_format($total_harga).'';
                                                     ?></span></p>
                                                    <p><b>Pajak:</b> <span class="float-right"><?php $pajak = $detailTrans_row->pajak;
                                                        echo 'Rp. '.number_format($pajak).'';
                                                     ?></span></p>
                                                    <p><b>Diskon:</b> <span class="float-right"><?= $diskon = $detailTrans_row->diskon; ?> %</span></p>
                                                    <h3>
                                                        <?php $totalPajak = $total_harga + $pajak;
                                                        $hasil = $totalPajak-($diskon/100)*$totalPajak; 
                                                        echo 'Rp. '.number_format($hasil).'';

                                                        ?>
                                                    </h3>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->

                                        <div class="d-print-none mt-4">
                                            <div class="text-right">
                                                <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i> Print</a>
                                                <!-- <a href="javascript: void(0);" class="btn btn-info">Submit</a> -->
                                            </div>
                                        </div>   
                                        <!-- end buttons -->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->