<?php 
  session_start();
  include '../include/head.php';
 
/*delete--------------------------------------------------*/
if(!empty($_GET['deletion_id'])){

    $deletion_id = $_GET['deletion_id']; 
    $table = $_GET['table'];
    $page = $_GET['page'];

    $sql="DELETE FROM $table WHERE id=:deletion_id";
    $query = $db->prepare($sql);
    $query->bindParam(':deletion_id',$deletion_id,PDO::PARAM_STR);
    $query->execute();
    if($query){
      $success = "Item removed successfully"; ?>
      <script type="text/javascript">
        window.setTimeout(function(){
            window.location.href = "<?php echo (BASE_LINK); ?>/<?php echo($page); ?>";

        }, 1000);
      </script>
    <?php }else {
      $error = "Oops..., Something went wrong. Try again";  ?>
      <script type="text/javascript">
        window.setTimeout(function(){
            window.location.href = "<?php echo (BASE_LINK); ?>/<?php echo($page); ?>";

        }, 1000);
      </script>
    <?php
    }
}
?>

<?php
if (isset($success)) { ?>
	<br><br><br><br><br>
     <section class="alert-wrap">
        <div class="container">
            <!-- ALERT-->
            <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content"><?php echo $success; ?></span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
            </div>
            <!-- END ALERT-->
        </div>
    </section><br>
 <?php } ?>

 <?php
if (isset($error)) { ?>
     <section class="alert-wrap">
        <div class="container">
            <!-- ALERT-->
            <div class="alert alert-danger" role="alert">
                <i class="zmdi zmdi-check-circle"></i>
                <span class="content"><?php echo $error; ?></span>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="zmdi zmdi-close-circle"></i>
                    </span>
                </button>
            </div>
            <!-- END ALERT-->
        </div>
    </section><br>
 <?php } ?>

 <?php include '../include/footer.php'; ?>

    

</body>

</html>