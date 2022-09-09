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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class="image d-flex flex-column justify-content-center align-items-center">
            <table class="table table-striped">
                <thead>
                    <tr align="center">
                        <th><img src="<?= base_url() ?>/assets/img/favicon.png" alt="" srcset=""></th>
                    </tr>
                    <tr align="center">
                        <th><?= $usernama ?></th>
                    </tr>
                    <tr align="center">
                        <th><?= $userid ?></th>
                    </tr>
                    <tr align="center">
                        <th><?= date('d-m-Y', strtotime($userlahir)) ?></th>
                    </tr>
                    <tr align="center">
                        <th><?= $usergender ?></th>
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
    </div>
</div>


<?= $this->endSection('isi') ?>