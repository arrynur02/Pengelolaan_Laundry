<!-- Warning Alert Modal -->
<div id="modal-confirm-paket" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-warning h1 text-warning"></i>
                    <h4 class="mt-2">Anda Yakin Ingin Hapus Data Ini ?</h4>
                    <input type="hidden" id="dt-id-delete-paket">
                    <button type="button" class="btn btn-light my-2" data-dismiss="modal">Batal</button>
                    <button type="button" id="btn-action-delete-paket-" class="btn btn-warning my-2">Hapus</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Tambah Modal -->
<div id="modal-tambah-paket" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-4">
                <h4 class="text-center mb-3">Tambah Paket</h4><hr>
               <form id="form-tambah-paket">
                <div class="form-group">
                <label> Outlet</label>
                <select class="form-control" id="outlet-ins"> 
                       <option> Pilih Outlet..</option>
                       <?php foreach ($outlet as $srow): ?>
                         <option value="<?= $srow->id_outlet;  ?>"><?= $srow->nama_outlet;  ?></option>
                       <?php endforeach ?>
                   </select>
               </div>
                <div class="form-group">
                   <label> Nama Paket</label>
                   <input id="nama-ins" type="text" class="form-control">
               </div>
               <div class="form-group">
                   <label> Jenis</label>
                   <select class="form-control" id="jenis-ins"> 
                       <option> Pilih Jenis Paket..</option>
                       <option value="kiloan"> Kiloan</option>
                       <option value="selimut"> Selimut</option>
                       <option value="bed_cover"> Bed Cover</option>
                       <option value="kaos"> Kaos</option>
                   </select>
               </div>
               <div class="form-group">
                   <label> Harga</label>
                   <input type="text" class="form-control" id="harga-ins" data-toggle="input-mask" data-mask-format="000.000.000" data-reverse="true">
               </div>
               <button type="submit" class="btn btn-success"> Save</button>   
               <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
               </form>   
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Update Modal -->
<div id="modal-update-paket" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-4">
                <h4 class="text-center mb-3">Update Paket</h4><hr>
               <form id="form-update-paket">
                <input type="hidden" id="dt-id_paket-">
                <div class="form-group">
                <label> Outlet</label>
                <select class="form-control" id="outlet-updt"> 
                       <option> Pilih Outlet..</option>
                       <?php foreach ($outlet as $srow): ?>
                         <option value="<?= $srow->id_outlet;  ?>"><?= $srow->nama_outlet;  ?></option>
                       <?php endforeach ?>
                   </select>
               </div>
                <div class="form-group">
                   <label> Nama Paket</label>
                   <input id="nama-updt" type="text" class="form-control">
               </div>
               <div class="form-group">
                   <label> Jenis</label>
                   <select class="form-control" id="jenis-updt"> 
                       <option> Pilih Jenis Paket..</option>
                       <option value="kiloan"> Kiloan</option>
                       <option value="selimut"> Selimut</option>
                       <option value="bed_cover"> Bed Cover</option>
                       <option value="kaos"> Kaos</option>
                   </select>
               </div>
               <div class="form-group">
                   <label> Harga</label>
                   <input type="number" class="form-control" id="harga-updt" data-toggle="input-mask" data-mask-format="000.000.000" data-reverse="true">
               </div>
               <button type="submit" class="btn btn-primary"> Update</button>   
               <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
               </form>   
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->