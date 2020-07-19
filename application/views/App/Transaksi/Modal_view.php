<!-- Tambah Modal -->
<div id="modal-tambah-transaksi" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body p-4">
        <h4 class="text-center mb-3">Tambah Transaksi</h4><hr>
        <form id="tambahTrans">
          <div class="row">
           <div class="col-md-4">
            <div class="form-group">
             <label> Nama Outlet</label>
             <select class="form-control" id="outlet-ins"> 
               <option> Pilih Outlet..</option>
               <?php foreach ($outlet as $key): ?>
                 <option value="<?= $key->id_outlet; ?>"> <?= $key->nama_outlet; ?></option>
               <?php endforeach ?>
             </select>
           </div>
         </div>
         <div class="col-md-4">
          <div class="form-group">
           <label> Batas Waktu</label>
           <input type="datetime-local" class="form-control" id="bw-ins">
         </div>
       </div>
       <div class="col-md-4">
        <div class="form-group">
         <label> Tanggal Bayar</label>
         <input type="datetime-local" class="form-control" id="tb-ins">
       </div>
     </div>

   </div>
   <div class="row">
     <div class="col-md-12">
      <div class="form-group">
       <label> Member</label>
       <input class="form-control" type="text" placeholder="Ketikan Nama Member" id="keyword-member-">
       <div id="tabel-member-"></div>
     </div>
   </div>

 </div>
 <button type="submit" class="btn btn-success btn-next-Transaksi"> Lanjut</button>   
 <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
</form>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal tambah Detail Transaksi -->
<div id="modal-detail-transaksi" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-full-width">
    <div class="modal-content">
      <div class="modal-body p-4">
        <h4 class="text-center mb-3"></h4><hr>
        <form id="">
         <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <input type="hidden" id="id-invoice-detail-trans">
                <div class="form-group">
                  <label> Invoice</label>
                  <input type="text" id="kd-invoice-detail-trans" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label> Member</label>
                  <input type="text" id="nm-member-detail-trans" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label> Kasir</label>
                  <input type="text" class="form-control" value="<?= $this->session->userdata('nama'); ?>" readonly>
                </div>

              </div>
            </div>
          </div>
          
        </div>
        <button type="submit" class="btn btn-success"> Save</button>   
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button> 
      </form>  
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Detail Transaksi -->
<div id="modal-detail-transaksi-2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-full-width">
    <div class="modal-content">
      <div class="modal-body p-4">
        <button class="close" data-dismiss="modal">x</button>
        <h4 class="text-center mb-3"></h4><hr>
        <form id="form-edit_data_transaksi">
         <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <label class="text-center"> Status Transaksi</label><hr>
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" id="status-detail-transaksi">
                      <option value="proses"> Proses </option>
                      <option value="selesai"> Selesai </option>
                      <option value="diambil"> Diambil </option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control" id="status-detail-transaksi-2">
                        <option value="belum_dibayar"> Belum Dibayar</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <input type="hidden" id="id-invoice-detail-trans-2">
                    <div class="form-group">
                      <label> Invoice</label>
                      <input type="text" id="kd-invoice-detail-trans-2" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label> Member</label>
                      <input type="text" id="nm-member-detail-trans-2" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label> Kasir</label>
                      <input type="text" class="form-control" value="<?= $this->session->userdata('nama'); ?>" readonly>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label> Ganti Outlet</label>
                  <select id="outlet-updt-trans-2" class="form-control">
                    <option> Pilih Outlet..</option>
                    <?php foreach ($outlet as $srow) { ?>
                      <option value="<?= $srow->id_outlet; ?>"><?= $srow->nama_outlet; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header bg-success text-white">
                    <h5>Tambah Paket Cucian</h5>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label> Nama Paket</label>
                      <select class="form-control" id="nama-paket-detail_trans-2"></select>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="number" class="form-control" placeholder="Qty" id="qty_detrans">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <textarea class="form-control" id="keterangan-deTrans" placeholder="Keterangan"></textarea>
                        </div>
                      </div>
                    </div>
                    <button id="btn-insert_detailTrans" type="button" class="btn btn-success"> Tambah</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Paket Cucian</th>
                      <th>Jenis</th>
                      <th>Qty</th>
                      <th>Harga</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="tabel-detail_trans-"></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5>Total</h5><hr>
                <input type="hidden" id="total-input-transaksi_">
                <div class="mt-2" id="total-harga_detail-trans">
                  Rp.0
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">

                    <div class="form-group">
                      <label> Bayar</label>
                      <input type="number" class="form-control" id="input-bayar-detrans" oninput="input_transaksi()">
                    </div>
                    <div class="form-group">
                      <label> Kembalian</label>
                      <input type="number" class="form-control" id="input-kembalian-detrans" readonly>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h4>Transaksi</h4><hr>
                <div class="form-group">
                  <label> SubTotal</label>
                  <input type="text" class="form-control" id="subtotal_detail-transaksi" readonly>
                </div>
                <div class="form-group">
                  <label> Pajak</label>
                  <div class="input-group">
                    <div class="input-group-append">
                      <span class="input-group-text">Rp</span>
                    </div>
                    <input type="number" class="form-control" id="pajak_transaksi-" oninput="inputPajak_()">
                  </div>
                </div>
                <div class="form-group">
                  <label> Diskon</label>
                  <div class="input-group">
                    <input type="number" class="form-control" id="diskon_transaksi" readonly>
                    <div class="input-group-prepend">
                      <span class="input-group-text">%</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="forl-group">
                  <label> Batas Waktu</label>
                  <input type="date" class="form-control" id="input_bw-updt">
                  <input type="text" id="batas_waktu-updt" class="form-control" data-toggle="input-mask" data-mask-format="0000/00/00 00:00:00">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label> Tanggal Bayar</label>
                  <input type="date" class="form-control" id="input_tb-updt">
                  <input type="text" class="form-control" id="tgl_bayar-updt" data-toggle="input-mask" data-mask-format="0000/00/00 00:00:00">
                </div>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary"> Update</button>   
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button> 
      </form>  
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- comfirm detail Alert Modal -->
<div id="modal-confirm_transaksi" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body p-4">
        <div class="text-center">
          <i class="dripicons-warning h1 text-warning"></i>
          <h4 class="mt-2">Anda Yakin Ingin Hapus Data Ini ?</h4>
          <input type="hidden" id="dt-id-delete-transaksi-">
          <button type="button" class="btn btn-light my-2" data-dismiss="modal">Batal</button>
          <button type="button" id="btn-action-delete-transaksi" class="btn btn-warning my-2">Hapus</button>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->