<!-- General JS Scripts -->
<script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url() ?>/template/node_modules/izitoast/dist/js/iziToast.js"></script>

<!-- Template JS File -->
<script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
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
</body>

</html>