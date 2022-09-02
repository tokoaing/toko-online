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

    .name {
        font-size: 22px;
        font-weight: bold
    }

    .idd {
        font-size: 14px;
        font-weight: 600
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class="image d-flex flex-column justify-content-center align-items-center">
            <button class="btn btn-secondary"> <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" /></button>
            <span class="name mt-3"><?= $usernama ?></span>
            <span class="idd">Email : <?= $userid ?></span>
            <span class="idd">Telp. : <?= $usertelp ?></span>
            <span class="idd">Password : <?= $userpassword ?></span>
            <span class="idd">Jenis Kelamin : <?= $usergender ?></span>
            <span class="idd">Tanggal Lahir : <?= date('d-m-Y', strtotime($userlahir)) ?></span>
            <span class="idd text-center">Alamat : <?= $useralamatid ?>, RT/RW <?= $userrt . '/' . $userrw ?>, Kel. <?= $kelurahan ?>, Kec. <?= $kecamatan ?>, <?= $kota_kabupaten ?> - <?= $propinsi ?>, <?= $kodepos ?> </span>
            <span class="idd"><?= $usermap ?></span>
        </div>
    </div>
</div>

<?= $this->endSection('isi') ?>