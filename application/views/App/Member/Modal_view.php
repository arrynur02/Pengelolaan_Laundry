<!-- Tambah Alert Modal -->
<div id="modal-tambah-member" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-4">
                <h4 class="text-center mb-3">Tambah Member</h4><hr>
               <form id="form-tambah-member">
                <div class="form-group">
                   <label> Nama</label>
                   <input id="nama-ins" type="text" class="form-control">
               </div>
               <div class="form-group">
                   <label> Jenis kelamin</label>
                   <select class="form-control" id="jk-ins"> 
                       <option> Pilih Gender..</option>
                       <option value="L"> Laki-Laki</option>
                       <option value="P"> Perempuan</option>
                   </select>
               </div>
               <div class="form-group">
                   <label> Tlp/no.hp</label>
                   <input type="number" class="form-control" id="tlp-ins">
               </div>
               <div class="form-group">
                   <label> Alamat</label>
                   <textarea id="alamat-ins" cols="30" rows="5" class="form-control"></textarea>
               </div>
               <button type="submit" class="btn btn-success"> Save</button>   
               <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
               </form>   
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Update Alert Modal -->
<div id="modal-update-member" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-4">
                <h4 class="text-center mb-3">Update Member</h4><hr>
               <form id="form-update-member">
                <input type="hidden" id="dt-id-updt-member">
                <div class="form-group">
                   <label> Nama</label>
                   <input id="nama-updt" type="text" class="form-control">
               </div>
               <div class="form-group">
                   <label> Jenis kelamin</label>
                   <select class="form-control" id="jk-updt"> 
                       <option> Pilih Gender..</option>
                       <option value="L"> Laki-Laki</option>
                       <option value="P"> Perempuan</option>
                   </select>
               </div>
               <div class="form-group">
                   <label> Tlp/no.hp</label>
                   <input type="number" class="form-control" id="tlp-updt">
               </div>
               <div class="form-group">
                   <label> Alamat</label>
                   <textarea id="alamat-updt" cols="30" rows="5" class="form-control"></textarea>
               </div>
               <button type="submit" class="btn btn-primary"> Update</button>   
               <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
               </form>   
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Warning Alert Modal -->
<div id="modal-confirm-member" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-warning h1 text-warning"></i>
                    <h4 class="mt-2">Anda Yakin Ingin Hapus Data Ini ?</h4>
                    <input type="hidden" id="dt-id-delete-member">
                    <button type="button" class="btn btn-light my-2" data-dismiss="modal">Batal</button>
                    <button type="button" id="btn-action-delete-member-" class="btn btn-warning my-2">Hapus</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->