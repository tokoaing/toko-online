<?= $this->extend('layout'); ?>

<?= $this->section('isi') ?>
<style>
    * {
        margin: 0;
        padding: 0
    }


    .card {
        width: 400px;
        background-color: #efefef;
        border: none;
        cursor: pointer;
        transition: all 0.5s;
    }

    .image img {
        transition: all 0.5s
    }

    .card:hover .image img {
        transform: scale(1.5)
    }
</style>



<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class="image d-flex flex-column justify-content-center align-items-center">
            <table class="table table-striped">
                <thead>
                    <tr align="center">
                        <th>
                            <img src="<?= base_url() ?>/assets/img/favicon.png" alt="" srcset="">
                            <br>
                            <br>
                        </th>
                    </tr>
                    <tr align="center">
                        <th><?= $useralamat ?>, RT/RW <?= $userrt . '/' . $userrw ?>, Kel. <?= $kelurahan ?>, Kec. <?= $kecamatan ?>, <?= $kota_kabupaten ?> - <?= $propinsi ?>, <?= $kodepos ?></th>
                    </tr>
                    <tr align="center">
                        <th><?= $usertelp ?></th>
                    </tr>
                </thead>
            </table>
        </div>

        <!-- Control the column width, and how they should appear on different devices -->
        <div class="row mb-1">
            <div class="col-sm-6 text-left bg-success">
                <h6 class="mt-1">Nama Lengkap</h6>
            </div>
            <div class="col-sm-6 text-right" style="background-color:LightGray;">
                <h6 class=" mt-1"><?= $usernama ?></h6>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-sm-6 text-left bg-success">
                <h6 class="mt-1">Email</h6>
            </div>
            <div class="col-sm-6 text-right" style="background-color:LightGray;">
                <h6 class=" mt-1"><?= $userid ?></h6>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-sm-6 text-left bg-success">
                <h6 class="mt-1">Jenis Kelamin</h6>
            </div>
            <div class="col-sm-6 text-right" style="background-color:LightGray;">
                <h6 class=" mt-1"><?= $usergender ?></h6>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-sm-6 text-left bg-success">
                <h6 class="mt-1">Tanggal Lahir</h6>
            </div>
            <div class="col-sm-6 text-right" style="background-color:LightGray;">
                <h6 class=" mt-1"><?= date('d-m-Y', strtotime($userlahir)) ?></h6>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('isi') ?>