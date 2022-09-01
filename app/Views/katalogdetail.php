<?= $this->extend('layout'); ?>

<?= $this->section('isi') ?>


<input type="hidden" id="namauser" value="<?= session()->namauser ?>">

<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="<?= base_url() ?>/assets/img/<?= $prodgambar ?>" alt="<?= $prodnama ?>" id="product-detail"">
                </div>
                <div class=" row">
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <?php
                                    $nomor = 1;
                                    foreach ($productDetail->getResultArray() as $rowGambar) :
                                    ?>
                                        <div class="col-2">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?= base_url() ?>/assets/img/<?= $rowGambar['detprofoto'] ?>" alt="Product Image <?= $nomor++ ?>">
                                            </a>
                                        </div>

                                    <?php endforeach ?>
                                </div>
                            </div>
                            <!--/.First slide-->

                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?= $prodnama ?></h1>
                        <p class="h3 py-2">Rp. <?= number_format($prodharga) ?></p>
                        <p class="py-2">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Brand:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong><?= $branchnama ?></strong></p>
                            </li>
                        </ul>

                        <h6>Description:</h6>
                        <p><?= $proddeskripsi ?></p>

                        <!-- <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Avaliable Color :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>White / Black</strong></p>
                            </li>
                        </ul> -->

                        <!-- <h6>Specification:</h6>
                        <ul class="list-unstyled pb-3">
                            <li>Lorem ipsum dolor sit</li>
                            <li>Amet, consectetur</li>
                            <li>Adipiscing elit,set</li>
                            <li>Duis aute irure</li>
                            <li>Ut enim ad minim</li>
                            <li>Dolore magna aliqua</li>
                            <li>Excepteur sint</li>
                        </ul> -->

                        <form action="" method="GET">
                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <!-- <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item">Size :
                                            <input type="hidden" name="product-size" id="product-size" value="S">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success btn-size">S</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success btn-size">M</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success btn-size">L</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success btn-size">XL</span></li>
                                    </ul>
                                </div> -->
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity
                                            <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="button" class="btn btn-success btn-lg" onclick="pesanSekarang('<?= $prodid ?>')">Pesan</button>
                                </div>
                                <div class="col d-grid">
                                    <button type="button" class="btn btn-success btn-lg" onclick="addKeranjang('<?= $prodid ?>')">Tambah ke Keranjang</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->


<script>
    // tambah pesanan
    function pesanSekarang(id) {
        let namauser = $('#namauser').val();
        if (namauser == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda belum login!',
            })
        } else {
            alert('sudah login');
        }
    }


    // tambah ke keranjang
    function addKeranjang(id) {
        let namauser = $('#namauser').val();
        if (namauser == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda belum login!',
            })
        } else {
            alert('sudah login');
        }
    }
</script>


<?= $this->endSection('isi') ?>