<?= $this->extend('layout'); ?>

<?= $this->section('isi') ?>
<?= csrf_field(); ?>

<div class="container-fluid mb-5">
    <h1 class="text-center mt-3 mb-3">Daftar Belanja</h1>
    <div class="row m-2">
        <table class="table" style="position: relative;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Product</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Sub Total</th>
                    <th>#</th>
                </tr>
            </thead>
            <?php
            $noker = 1;
            $totalProduct = 0;
            $totalBelanja = 0;
            foreach ($datakeranjang->getResultArray() as $rowKeranjang) :
            ?>
                <tbody>
                    <tr>
                        <td><?= $noker++ ?></td>
                        <td><img src="<?= base_url() ?>/assets/img/<?= $rowKeranjang['prodgambar'] ?>" alt="<?= $rowKeranjang['prodgambar'] ?>" width="50px" height="50px"></td>
                        <td><?= $rowKeranjang['prodnama'] ?></td>
                        <td><?= number_format($rowKeranjang['prodharga']) ?></td>
                        <td>
                            <div class="col-5">
                                <input type="number" name="kerjml" id="kerjml" class="form-control input-number" value="<?= $rowKeranjang['kerjml'] ?>" min="1" max="<?= $rowKeranjang['prodstock'] ?>">
                            </div>
                        </td>
                        <td><?= number_format($rowKeranjang['prodharga'] * $rowKeranjang['kerjml'])  ?></td>
                        <td><button type="button" class="btn btn-danger" onclick="hapusItemKeranjang('<?= sha1($rowKeranjang['kerid']) ?>')"><i class='fas fa-trash-alt'></i></button></td>
                    </tr>
                </tbody>
            <?php
                $totalProduct += $rowKeranjang['kerjml'];
                $totalBelanja += $rowKeranjang['prodharga'] * $rowKeranjang['kerjml'];
            endforeach
            ?>
        </table>

        <div class="row">
            <div class="col-6">
                <h4 id="totalHargaBelanjaan">Total Harga : <?= number_format($totalBelanja) ?></h4>
            </div>
            <div class="col-6 text-right">
                <button type="button" class="btn btn-danger" onclick="hapusSemuaeranjang('<?= sha1(session()->iduser) ?>')">Kosongkan Kerajang</button>
                <button type="button" class="btn btn-primary" onclick="lanjutBelanja()">Lanjutkan Belanja</button>
                <button type="button" class="btn btn-success">Lanjutkan Pemesanan</button>
            </div>
        </div>
        <div class="text-right">

        </div>

    </div>
</div>



<script>
    function hapusItemKeranjang(id) {
        Swal.fire({
            title: 'Apakah kamu yakin ?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url() ?>/home/hapusItemKeranjang/" + id,
                    dataType: "json",
                    success: function(response) {
                        Swal.fire(
                            'Berhasil!',
                            response.sukses,
                            'success'
                        ).then((result) => {
                            window.location.reload();
                        })
                    }
                });
            }
        })
    }

    function hapusSemuaeranjang(iduser) {
        Swal.fire({
            title: 'Apakah kamu yakin ?',
            text: "Mengosongkan keranjang Anda!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Kosongkan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url() ?>/home/hapusSemuaKeranjang/" + iduser,
                    dataType: "json",
                    success: function(response) {
                        Swal.fire(
                            'Berhasil!',
                            response.sukses,
                            'success'
                        ).then((result) => {
                            window.location.reload();
                        })
                    }
                });
            }
        })
    }

    function lanjutBelanja() {
        window.location.href = '<?= base_url() ?>/home/katalog';
    }
</script>


<?= $this->endSection('isi') ?>