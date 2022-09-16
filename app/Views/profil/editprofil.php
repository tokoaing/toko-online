<!-- Modal Ganti Foto -->
<div class="modal fade" id="modalGantiFoto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalGantiFotoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalGantiFotoLabel">Edit Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url() ?>/upload/<?= $userfoto ?>" alt="" srcset="">

                <form method="post" action="<?= base_url(); ?>/profil/simpanfoto" class="editfoto" enctype="multipart/form-data">

                    <input type="hidden" class="form-control" name="userid" id="userid" value="<?= session()->iduser ?>">

                    <div class="form-group">
                        <label for="formFileLg" class="form-label">Masukan Gambar :</label>
                        <input class="form-control form-control-lg" type="file" name="userfoto" id="userfoto">
                        <div class="invalid-feedback errorUserFoto"></div>
                    </div>
                    <div class="d-grid mt-3">
                        <input type="submit" value="Upload Gambar" class="btn btn-block btn-outline-success" />
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal Ganti Profil -->
<div class="modal fade" id="modalGantiProfil" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalGantiProfilLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalGantiProfilLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group row">
                    <label for="usernama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="usernama" id="usernama" placeholder="Masukan Nama Lengkap">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- Modal Ganti Alamat -->
<div class="modal fade" id="modalGantiAlamat" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalGantiAlamatLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalGantiAlamatLabel">Edit Alamat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        // hide modal foto
        $('.close').click(function(e) {
            e.preventDefault();
            $('#modalGantiFoto').modal('hide');
            window.location.reload();
        });

        // hide modal profil
        $('.close').click(function(e) {
            e.preventDefault();
            $('#modalGantiProfil').modal('hide');
            window.location.reload();
        });

        // hide modal alamat
        $('.close').click(function(e) {
            e.preventDefault();
            $('#modalGantiAlamat').modal('hide');
            window.location.reload();
        });

    });
</script>