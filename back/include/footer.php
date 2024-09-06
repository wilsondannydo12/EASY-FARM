 <!-- status --------------------- -->
<div class="modal fade" id="status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">UPDATE STATUS</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
     <form action="" method="post">
          <input type="hidden" name="status_id" id="status_id">
          <div class="col-12 col-md-12">
              <label class="switch switch-text switch-success">
                <input type="checkbox" name="status" class="switch-input" checked="true">
                <span data-on="On" data-off="Off" class="switch-label"></span>
                <span class="switch-handle"></span>
              </label>
          </div><br>
      <div class="modal-footer">
      <button type="submit" name="updateStatusBtn" class="btn btn-primary">Save changes</button>
    </div>
      </form>
    </div>
    
  </div>
</div>
</div>
<!-- status ends -->
<section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>COPYRIGHT © <?php echo date("Y"); ?> AGRO BUSINESS ALL RIGHTS RESERVED.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/wow/wow.min.js"></script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="http://localhost/elearning/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/select2/select2.min.js">
    </script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- Main JS-->
    <script src="<?php echo(BASE_LINK); ?>/assets/js/main.js"></script>
    <script>
        $(document).ready(function () {
           $('#_table').DataTable();
        });

        function status(id){
            document.getElementById('status_id').value=id;
        }
  </script>