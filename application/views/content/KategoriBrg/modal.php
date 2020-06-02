<!-- Modal Add -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD DATA </h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div id="my" class="form-group">
                        <label class="col-md-12">Kategori</label>
                        <div class="col-md-12">
                            <input type="text" id="nama_kat" name="nama_kat" class="tipess form-control" required> </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="pelanggans_id_delete" class="pelanggans_id_delete" id="pelanggans_id_delete">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" id="btnEdit" href="#">Simpan</a>
            </div>
        </div>
    </div>
</div>