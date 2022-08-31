<input type="hidden" id="namauser" value="<?= session()->namauser ?>">
<?php foreach ($tampilkatalog as $rowproduct) : ?>

    <div class="col-md-4">
        <div class="card mb-4 product-wap rounded-0">
            <div class="card rounded-0">
                <img class="card-img rounded-0 img-fluid" src="<?= base_url() ?>/assets/img/<?= $rowproduct['prodgambar'] ?>">
                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                    <ul class="list-unstyled">
                        <li><a class="btn btn-success text-white" href="#" onclick="tambahFavorit('<?= $rowproduct['prodid'] . ',' . session()->namauser ?>')"><i class="far fa-heart"></i></a></li>
                        <li><a class="btn btn-success text-white mt-2" href="#" onclick="detailBarang('<?= $rowproduct['prodid'] . ',' . session()->namauser ?>')"><i class="far fa-eye"></i></a></li>
                        <li><a class="btn btn-success text-white mt-2" href="#" onclick="tambahKeranjang('<?= $rowproduct['prodid'] . ',' . session()->namauser ?>')"><i class="fas fa-cart-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <a href="#" class="h3 text-decoration-none"><strong><?= $rowproduct['prodnama'] ?></strong></a>
                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                    <li><?= $rowproduct['prodtype'] ?></li>
                </ul>
                <ul class="list-unstyled d-flex justify-content-center mb-1">
                    <li>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-muted fa fa-star"></i>
                        <i class="text-muted fa fa-star"></i>
                    </li>
                </ul>
                <p class="text mb-0"><?= $rowproduct['proddeskripsi'] ?></p>
            </div>
        </div>
    </div>

<?php endforeach ?>

<script>
    // tambah ke list Favorit
    function tambahFavorit(id) {
        let namauser = $('#namauser').val();
        let login = "";
        if (namauser == "") {
            Swal.fire({
                icon: 'error',
                title: 'Silahkan login terlebih dahulu...',
                showCancelButton: true,
                confirmButtonText: 'Login',
                cancelButtonText: 'Batal',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $('#modalLogin').modal('show');
                }
            })
        } else {
            alert(namauser);
        }
    }

    // lihat detail barang
    function detailBarang(id) {
        let namauser = $('#namauser').val();
        if (namauser == "") {
            Swal.fire({
                icon: 'error',
                title: 'Silahkan login terlebih dahulu...',
                showCancelButton: true,
                confirmButtonText: 'Login',
                cancelButtonText: 'Batal',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $('#modalLogin').modal('show');
                }
            })
        } else {
            alert(namauser);
        }
    }

    // tambah ke keranjang
    function tambahKeranjang(id) {
        let namauser = $('#namauser').val();
        if (namauser == "") {
            Swal.fire({
                icon: 'error',
                title: 'Silahkan login terlebih dahulu...',
                showCancelButton: true,
                confirmButtonText: 'Login',
                cancelButtonText: 'Batal',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $('#modalLogin').modal('show');
                }
            })
        } else {
            alert(namauser);
        }
    }
</script>