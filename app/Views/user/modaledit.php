<!-- Modal -->
<div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">


            <form action="<?= base_url('user/updatedata') ?>" class="formsimpan">
                <?= csrf_field(); ?>

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">


                    <input type="hidden" name="useridlama" id="useridlama" value="<?= $userid ?>">

                    <div class="form-group">
                        <label for="">User Nama</label>
                        <input type="text" name="usernama" id="usernama" value="<?= $usernama ?>" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="userlevel" id="userlevel" class="form-control">
                            <option value="" selected>Pilih Level</option>
                            <option value=""></option>
                            <?php foreach ($datalevel as $rowlevel) : ?>
                                <option value="<?= $rowlevel['levelid'] ?>" <?= ($rowlevel['levelid'] == $userlevel) ? 'selected' : '' ?>><?= $rowlevel['levelnama'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback errorUserLevel"></div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-success" id="tombolsimpan" autocomplete="off">Simpan</button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" id="batal">Batal</button>
                </div>


            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.formsimpan').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.error) {
                        let err = response.error;

                        if (err.errUserLevel) {
                            $('#userlevel').addClass('is-invalid');
                            $('.errorUserLevel').html(err.errUserLevel);
                        } else {
                            $('#userlevel').removeClass('is-invalid');
                            $('#userlevel').addClass('is-valid');
                        }

                    }

                    if (response.sukses) {
                        $('#modalEdit').modal('hide');
                        swal.fire(
                            'Berhasil',
                            response.sukses,
                            'success'
                        ).then((result) => {
                            window.location.reload();
                        })
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError);
                }
            });

            return false;
        });

        $('#batal').click(function(e) {
            e.preventDefault();
            window.location.reload();
        });

    });
</script>