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
<script src="<?= base_url() ?>/template/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- <script src="<?= base_url() ?>/template/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script> -->

<!-- Template JS File -->
<script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

<!-- Needed Page Specific JS File -->
<script src="<?= base_url() ?>/template/assets/js/page/modules-datatables.js"></script>

<!-- Scripting JS -->
<script>
    function setToForm(latitude, longitude) {
        $('input[name="latitude"]').val(latitude); // Set input lat
        $('input[name="longitude"]').val(longitude); // Set input lng
    }
</script>

</body>

</html>