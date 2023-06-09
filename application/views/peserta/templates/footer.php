        </div>
    </div>
    <!-- Button trigger modal -->



    <!-- Modal Logout -->
    <div id="logoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi keluar sistem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Apakah anda yakin ingin keluar dari sistem?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('logout'); ?>" class="btn  btn-secondary">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation-->
    <div class="modal fade" id="ujianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- <div class="modal-body">Apakah anda siap untuk memulai ujian sekarang!</div>
                    <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Batal</button>
                    <a id="btn-ujian" class="btn btn-secondary" href="#"><i class="fas fa-location-arrow"></i> Mulai</a>
                </div> -->
            </div>
        </div>
    </div>

    <script>
        function ujianConfirm(url){
            $('#btn-ujian').attr('href', url);
            $('#ujianModal').modal();
        }
    </script>


    <!-- Required Js -->
    <script src="<?= base_url('assets/js/vendor-all.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/ripple.js'); ?>"></script>
    <script src="<?= base_url('assets/js/pcoded.min.js'); ?>"></script>

    <!-- Apex Chart -->
    <script src="<?= base_url('assets/js/plugins/apexcharts.min.js'); ?>"></script>
    <!-- custom-chart js -->
    <script src="<?= base_url('assets/js/pages/dashboard-main.js'); ?>"></script>

    <!-- datatable Js -->
    <script src="<?= base_url('assets/js/plugins/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/plugins/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/pages/data-basic-custom.js'); ?>"></script>

    <script src="<?= base_url('assets/js/plugins/jquery.bootstrap.wizard.min.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#besicwizard').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });
            $('#btnwizard').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });
        });

        $(document).ready(function() {
    $('table.table-data-testing').DataTable();
} );
    </script>

    <!-- trumbowyg editor -->
    <script src="<?= base_url('assets/js/plugins/trumbowyg.min.js'); ?>"></script>
    <script>
        // tinymce editor
        $(window).on('load', function() {
            $('#tinymce-editor').trumbowyg({
                svgPath: 'assets/css/plugins/icons.svg',
                btns: [
                    ['viewHTML'],
                    ['undo', 'redo'],
                    ['formatting'],
                    ['strong', 'em', 'del'],
                    ['superscript', 'subscript'],
                    ['link'],
                    ['insertImage'],
                    ['unorderedList', 'orderedList'],
                    ['horizontalRule'],
                    ['removeformat'],
                    ['fullscreen']
                ]
            });
        });
    </script>
</body>

</html>