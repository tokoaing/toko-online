<?= $this->extend('template/layout') ?>


<?= $this->section('isi') ?>



<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header bg-success">
        <h3 class="card-title"><?= $title ?></h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus text-white"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <div class="col-12 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-body mt-2">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="lead"><b><?= $tampildata['perunama'] ?></b></h2>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small mb-3"><span class="fa-li"><i class="fas fa-map-marker"></i></span><?= $tampildata['perualamat'] ?></li>
                                <li class="small mb-3"><span class="fa-li"><i class="fas fa-map-marked-alt"></i></span><?= $tampildata['perualamatlink'] ?></li>
                                <li class="small mb-3"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span><?= $tampildata['perutelp'] ?></li>
                                <li class="small mb-3"><span class="fa-li"><i class="fas fa-fax"></i></span><?= $tampildata['perufax'] ?></li>
                                <li class="small mb-3"><span class="fa-li"><i class="fas fa-mail-bulk"></i></span><?= $tampildata['peruemail'] ?></li>
                                <li class="small mb-3"><span class="fa-li"><i class="fab fa-whatsapp"></i></span><?= $tampildata['peruwa'] ?></li>
                            </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img src="<?= base_url() ?>/upload/<?= $tampildata['peruicon'] ?>" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a href="#" class="btn btn-sm btn-primary" onclick="edit('<?= $tampildata['peruid'] ?>')">
                            <i class="fas fa-city"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


<div class="viewmodal" style="display: none;"></div>

<script>
    function edit(peruid) {
        $.ajax({
            type: "post",
            url: "<?= base_url() ?>/perusahaan/formedit/" + peruid,
            dataType: "json",
            success: function(response) {
                if (response.data) {
                    $('.viewmodal').html(response.data).show();
                    $('#modalEdit').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + '\n' + thrownError);
            }
        });
    }
</script>

<?= $this->endSection('isi') ?>