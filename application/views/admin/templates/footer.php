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
                    <a href="<?= base_url('admin/logout'); ?>" class="btn  btn-secondary">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah kamu yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang dihapus tidak dapat dipulihkan!</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Batal</button>
                        <a id="btn-delete" class="btn btn-danger" href="#"><i class="feather icon-trash"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteConfirm(url){
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>

    <div id="dataModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
             <div class="modal-content">  
                  <div class="modal-header">  
                       <h5 class="modal-title">Detail User</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>  
                  <div class="modal-body" id="detail_user">  
                  </div>  
                  <div class="modal-footer">  
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                  </div>  
             </div>  
        </div>  
    </div> 

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

            $('#tabswizard').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
            });
        });

        $(document).ready(function() {
        $('table.table-data-testing').DataTable();
        $('table.table-data-result').DataTable();
        $('table.table-daftar').DataTable();
        $('table.table-ditetapkan').DataTable();
        $('table.table-semua-data').DataTable();
    } );
    </script>

    <!-- Ckeditor js -->
    <script src="<?= base_url('assets/js/plugins/ckeditor.js'); ?>"></script>
    <script type="text/javascript">
        $(window).on('load', function () {
            ClassicEditor.create(document.querySelector('#classic-editor'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>


    
    <script>
    $(document).ready(function(){
        $('.btn-analisis-detail').click(function(){
            var data_id = $(this).data("id");
            var pkerjaanA = $(this).data("pkerjaanA");
            var pkerjaanB = $(this).data("pkerjaanB");
            $.ajax({
                url: "<?= base_url('admin/analisis/detail'); ?>",
                method: "POST",
                data: {
                    data_id: data_id,
                    pkerjaanA: pkerjaanA
                },
                success: function(data){
                    $("#detail_user").html(data)
                    $("#dataModal").modal('show')
                }
            })
        })
    })
    </script>
</body>
</html>