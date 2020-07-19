<!-- Standard modal -->
<div id="modal-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Tambah User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                   <div class="form-group">
                       <label>Nama</label>
                       <input type="text" class="form-control" id="nama">
                   </div>
                   <div class="form-group">
                       <label>Username</label>
                       <input type="text" class="form-control" id="username">
                   </div>
                   <div class="form-group">
                       <label>Password</label>
                       <input type="text" class="form-control" id="pssword">
                   </div>
                   <div class="form-group">
                       <label>Outlet</label>
                       <select name="" id="outlet" class="form-control">
                            <option> Outlet..</option>
                            <?php foreach ($outlet->result() as $x) {
                              echo '<option value="'.$x->id_outlet.'"> '.$x->nama_outlet.'</option>';
                            } ?>
                       </select>
                   </div>
                   <div class="form-group">
                       <label>Role</label>
                       <select name="" id="role" class="form-control">
                            <option> Pilih Role ..</option>
                            <option value="admin"> Admin</option>
                            <option value="kasir"> Kasir</option>
                            <option value="owner"> Owner</option>
                       </select>
                   </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button id="btn-action-insert-outlet" type="button" class="btn btn-success">Tambah</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Standard modal -->
<div id="modal-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               <form>
                   <div class="form-group">
                    <input type="hidden" id="data-id-user-updt">
                       <label>Nama</label>
                       <input type="text" class="form-control" id="nama-edit">
                   </div>
                   <div class="form-group">
                       <label>Username</label>
                       <input type="text" class="form-control" id="username-edit">
                   </div>
                   <div class="form-group">
                       <label>Password</label>
                       <input type="text" class="form-control" id="password-edit">
                   </div>
                   <div class="form-group">
                       <label>Outlet</label>
                       <select name="" id="outlet-edit" class="form-control">
                            <option> Outlet..</option>
                            <?php foreach ($outlet->result() as $x) {
                              echo '<option value="'.$x->id_outlet.'"> '.$x->nama_outlet.'</option>';
                            } ?>
                       </select>
                   </div>
                   <div class="form-group">
                       <label>Role</label>
                       <select name="" id="role-edit" class="form-control">
                            <option> Pilih Role ..</option>
                            <option value="admin"> Admin</option>
                            <option value="kasir"> Kasir</option>
                            <option value="owner"> Owner</option>
                       </select>
                   </div>
               </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button id="btn-action-updt-outlet" type="button" class="btn btn-primary">Update</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Warning Alert Modal -->
<div id="modal-confirm-user" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-warning h1 text-warning"></i>
                    <h4 class="mt-2">Anda Yakin Ingin Hapus Data Ini ?</h4>
                    <input type="hidden" id="dt-id-delete-user">
                    <button type="button" class="btn btn-light my-2" data-dismiss="modal">Batal</button>
                    <button type="button" id="btn-action-delete-user-" class="btn btn-warning my-2">Hapus</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->