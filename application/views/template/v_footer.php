<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2023 <div class="bullet"></div> Developed By <a href="">Moch Syafrizal Azhar</a>
    </div>
    <div class="footer-right">
        2.3.0
    </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url() ?>/template/node_modules/datatables/media/js/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>/template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/izitoast/dist/js/iziToast.js"></script>
<script src="<?= base_url() ?>/template/node_modules/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="<?= base_url() ?>/template/node_modules/selectric/public/jquery.selectric.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/jquery_upload_preview/assets/js/jquery.uploadPreview.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<!-- Template JS File -->
<script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

<!-- Scripting JS -->
<script>
    function setToForm(latitude, longitude, marker) {
        $('input[name="latitude"]').val(latitude); // Set input lat
        $('input[name="longitude"]').val(longitude); // Set input lng

        // Lakukan reverse geocoding untuk mendapatkan alamat
        var geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(latitude, longitude);

        geocoder.geocode({
            'location': latlng
        }, function(results, status) {
            if (status === 'OK') {
                if (results[0]) {
                    var address = results[0].formatted_address;
                    $('input[name="alamat"]').val(address); // Set input alamat

                    // Update marker title dengan alamat
                    marker.setTitle(address);
                }
            }
        });
    }

    $("#toastr-1").click(function() {
        iziToast.info({
            title: "Berhasil",
            message: "Data telah di Reset",
            position: "topRight",
            displayMode: "replace",
        });
    });

    $("#table-1").dataTable({
        columnDefs: [{
            sortable: false,
            targets: [0]
        }],
    });

    $("select").selectric();
    $.uploadPreview({
        input_field: "#image-upload", // Default: .image-upload
        preview_box: "#image-preview", // Default: .image-preview
        label_field: "#image-label", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });
    $(".inputtags").tagsinput('items');
</script>
<script>
    var flashgagal = $('#flashgagal').data('flashgagal');
    if (flashgagal) {
        iziToast.error({
            title: 'Gagal',
            message: flashgagal,
            position: 'topRight',
            displayMode: 'replace',
        });
    }
</script>
<script>
    var flash = $('#flash').data('flash');
    if (flash) {
        iziToast.success({
            title: 'Berhasil',
            message: flash,
            position: 'topRight',
            displayMode: 'replace',
        });
    }

    $(document).on('click', '#tombol-hapus', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');

        swal({
                title: 'Yakin ingin menghapus data ini?',
                text: 'Data yang sudah dihapus tidak dapat dikembalikan lagi!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = link;
                }
            });
    });
</script>
</body>

</html>