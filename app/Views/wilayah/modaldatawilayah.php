<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>/assets_admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets_admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<script src="<?= base_url() ?>/assets_admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets_admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets_admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets_admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<div class="modal fade" id="modalDataWilayah" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Data Wilayah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table style="width: 100%;" id="datatabelwilayah" class="table table-sm table-bordered table-hover dataTable dtr-inline collapsed">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelurahan</th>
                            <th>Kecamatan</th>
                            <th>Kota/Kabupaten</th>
                            <th>Propinsi</th>
                            <th>Kodepos</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    function listModalDataWilayah() {
        var table = $('#datatabelwilayah').dataTable({
            destroy: true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url() ?>/wilayah/listDataModal",
                "type": "POST",
            },
            "colomnDefs": [{
                "targets": [0, 6],
                "orderable": false,
            }, ],
        });
    }

    function pilih(id, kelurahan, kecamatan, kota_kabupaten, propinsi, kodepos) {
        $('#id_wilayah').val(id);
        $('#kelurahan').val(kelurahan);
        $('#kecamatan').val(kecamatan);
        $('#kota_kabupaten').val(kota_kabupaten);
        $('#propinsi').val(propinsi);
        $('#kodepos').val(kodepos);
        $('#useralamatid').val(id);

        $('#modalDataWilayah').modal('hide');
    }




    $(document).ready(function() {
        listModalDataWilayah();
    });

    $('#closeModal').click(function(e) {
        e.preventDefault();
        $('#modalDataWilayah').modal('hide');
    });
</script>