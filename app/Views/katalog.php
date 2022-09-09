<?= $this->extend('layout'); ?>

<?= $this->section('isi') ?>
<?= csrf_field(); ?>

<div class="container py-5">
    <div class="row">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="#">Meja</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="d-flex">
                        <select class="form-control">
                            <option>Featured</option>
                            <option>A to Z</option>
                            <option>Item</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row katalogTampil">
            </div>


        </div>

    </div>
</div>
<!-- End Content -->


<div class="viewmodal" style="display: none;"></div>

<!-- Start Script -->
<script src="<?= base_url() ?>/assets/js/jquery-1.11.0.min.js"></script>
<script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
<!-- End Script -->

<script>
    function katalogTampil() {
        $.ajax({
            url: "<?= base_url() ?>/home/katalogTampil",
            dataType: "json",
            success: function(response) {
                if (response.data) {
                    $('.katalogTampil').html(response.data);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + '\n' + thrownError);
            }
        });
    }

    $(document).ready(function() {
        katalogTampil();
    });
</script>

<?= $this->endSection('isi') ?>