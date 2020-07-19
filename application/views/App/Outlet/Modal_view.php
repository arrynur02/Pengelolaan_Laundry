<!-- Standard modal -->
<div id="modal-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Tambah Outlet</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                   <div class="form-group">
                       <label>Nama</label>
                       <input type="text" class="form-control" id="nama-outlet">
                   </div>
                   <div class="form-group">
                       <label>Alamat</label>
                       <input type="text" class="form-control" id="alamat-outlet">
                   </div>
                   <div class="form-group">
                       <label>Telephone</label>
                       <input type="text" class="form-control" id="tlp">
                   </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button id="btn-action-outlet" type="button" class="btn btn-success">Tambah</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Standard modal -->
<div id="modal-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Tambah Outlet</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                   <input type="hidden" id="data-edit-outlet_id">
                   <div class="form-group">
                       <label>Nama</label>
                       <input type="text" class="form-control" id="nama-outlet-e">
                   </div>
                   <div class="form-group">
                       <label>Alamat</label>
                       <input type="text" class="form-control" id="alamat-outlet-e">
                   </div>
                   <div class="form-group">
                       <label>Telephone</label>
                       <input type="text" class="form-control" id="tlp-e">
                   </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button id="btn-action-outlet-edit" type="button" class="btn btn-primary">Update</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modal-confirm-outlet" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-warning h1 text-warning"></i>
                    <h4 class="mt-2">Anda Yakin Ingin Hapus Data Ini ??</h4>
                    <input type="hidden" id="data_id-outlet">
                    <button type="button" class="btn btn-light my-2" data-dismiss="modal">Batal</button>
                    <button id="btn-delete-outlet-" type="button" class="btn btn-warning my-2">Hapus</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->