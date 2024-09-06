<?php 
  session_start();
 ?>
<?php include 'include/head.php'; ?>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <?php include 'include/header.php'; ?>
        <!-- END HEADER DESKTOP-->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            
            <section>
                <div class="container"><br>
                    <div class="row">
                        <?php include 'php/product_server.php'; ?>
                        <div class="col-xl-12">
                            <!-- PAGE CONTENT--> 
                            <div class="page-content">
                                <div class="row">
                                    <!-- -------------------first row-------------------------- -->
                                    <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">PRODUCT LIST</h3>
                        <?php
                        if (isset($success)) { ?>
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
                         
                           <div class="card">
                                    <div class="card-body">
                                      <div class="table-data__tool">
                                          <div class="table-data__tool-left">
                                              
                                          </div>
                                          <div class="table-data__tool-right">
                                            <?php if (!empty($_SESSION['type']) AND strtolower($_SESSION['type']) != "superadmin") { ?>
                                              <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#add">
                                                  <i class="zmdi zmdi-plus"></i>Register Product</button>
                                              <?php } ?>
                                          </div>
                                      </div>
                                    <div style="overflow-x:auto;">
                                      <table class="table table-striped" id="_table" style="width:100%">
                                          <thead>
                                              <tr>
                                                  <th>#</th>
                                                  <th>SKU</th>
                                                  <th>PRODUCT NAME</th>
                                                  <th>SHOP</th>
                                                  <th>TYPE</th>
                                                  <th>VENDOR</th>
                                                  <th>OLD PRICE</th>
                                                  <th>NEW PRICE</th>
                                                  <th>AVAILABILITY</th>
                                                  <th>STATUS</th>
                                                  <th>ACTION</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php 
                                                $i = 1;
                                                $cur_user = $_SESSION['id'];
                                                if (!empty($_SESSION['type']) AND strtolower($_SESSION['type']) == "superadmin") {
                                                  $qry = $db->prepare("SELECT product_tbl.*, shop.shop_name, product_type.pro_type, users.firstname, users.lastname FROM product_tbl INNER JOIN shop ON shop.id=product_tbl.shop INNER JOIN product_type ON product_type.id=product_tbl.product_type INNER JOIN users ON users.id=product_tbl.vendor");
                                                }else{
                                                  $qry = $db->prepare("SELECT product_tbl.*, shop.shop_name, product_type.pro_type, users.firstname, users.lastname FROM product_tbl INNER JOIN shop ON shop.id=product_tbl.shop INNER JOIN product_type ON product_type.id=product_tbl.product_type INNER JOIN users ON users.id=product_tbl.vendor WHERE users.id='$cur_user'");
                                                }
                                                $qry->execute();
                                                $results=$qry->fetchAll(PDO::FETCH_OBJ);
                                                foreach($results as $result){
                                                    $status = $result->status;
                                                    if ($status == "active") {
                                                        $stShow = "Active";
                                                        $color = "green";
                                                    }else{
                                                        $stShow = "Inactive";
                                                        $color = "red";
                                                    }

                                                    if (strtolower($result->availability) == "available") {
                                                        $available = "In Stock";
                                                        $av_color = "green";
                                                    }else{
                                                        $available = "Out of Stock";
                                                        $av_color = "red";
                                                    }
                                                    
                                            ?>
                                                <tr class="">
                                                  <td><?php echo $i; ?></td>
                                                  <td><?php echo $result->sku; ?></td>
                                                  <td><?php echo $result->product_name; ?></td>
                                                  <td><?php echo $result->shop_name; ?></td>
                                                  <td><?php echo $result->pro_type; ?></td>
                                                  <td><?php echo $result->firstname; ?> <?php echo $result->lastname; ?></td>
                                                  <td>GH&#8373;<?php echo number_format($result->old_price,2); ?></td>
                                                  <td>GH&#8373;<?php echo number_format($result->new_price,2); ?></td>
                                                  <td>
                                                    <div style="color:<?php echo $av_color;?>"> <?php echo htmlentities($available);?></div>
                                                  </td>
                                                  <td>
                                                    <div style="color:<?php echo $color;?>"> <?php echo htmlentities($stShow);?></div>
                                                  </td>

                                                  <td align="center">
                                                   <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                          Action
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">

                                                      <a class="dropdown-item edit-data" href="javascript:void(0)" data-toggle="modal" data-target="#status" onclick="status('<?php echo $result->id; ?>');"><span class="fa fa-edit text-primary"></span> Status</a>

                                                      <div class="dropdown-divider"></div>

                                                      <a class="dropdown-item edit-data" href="javascript:void(0)" data-toggle="modal" data-target="#update" onclick="edit('<?php echo $result->id; ?>');"><span class="fa fa-edit text-primary"></span> Update</a>

                                                      <div class="dropdown-divider"></div>
                                                      <a class="dropdown-item delete_data" href="<?php echo(BASE_LINK); ?>/deletion/remove/<?php echo $result->id; ?>/product_tbl/product" onclick="return confirm('Are you sure you want to delete this product?')"><span class="fa fa-trash text-danger"></span> Delete</a>
                                                    </div>
                                                  </td>
                                                </tr>
                                                <?php $i++;  } ?>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- END DATA TABLE -->
                                  </div>
                                </div>
                            </div>
                            <!-- END PAGE CONTENT-->
                        </div>
                    </div>
                </div>
            </section>

          
          <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTER PRODUCT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="mb-3 col-md-9 mb-3">
                          <label for="firstname" class="form-label">Product Image</label>
                          <input type="file" class="form-control" name="productImage" id="productImage" onchange="document.getElementById('previewProfile').src = window.URL.createObjectURL(this.files[0]); check_profileImg_ext(this.value);" required>
                        </div>
                        <div class="col-md-3">
                            <img id="previewProfile" class="profile-preview-img" src="<?php echo(BASE_LINK); ?>/assets/images/photo_default.png" alt="Preview Will Show Here" style="" />
                        </div>
                      
                        <div class="col-12 col-md-12 mb-3">
                            <label for="product_name" class=" form-control-label">Product Name:</label>
                            <input type="text" id="product_name" name="product_name" class="form-control">
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                            <label for="sku" class=" form-control-label">SKU:</label>
                            <input type="text" id="sku" name="sku"  class="form-control">
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                            <label for="product_type" class=" form-control-label">Product Type:</label>
                            <select class="form-control" name="product_type" id="product_type" required>
                                <option value="">Select Product Type</option>
                                <?php 
                                    $product_type_sql=$db->query("SELECT * FROM product_type WHERE status='active'");
                                    $pro_row_data = $product_type_sql->fetchAll(PDO::FETCH_OBJ);
                                     foreach($pro_row_data as $pro_data){?>
                                    <option value="<?php echo $pro_data->id;?>"><?php echo  $pro_data->pro_type;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                            <label for="shop" class=" form-control-label">Shop:</label>
                            <select class="form-control" name="shop" id="shop" required>
                                <option value="">Select shop </option>
                                <?php 
                                    $shop_sql=$db->query("SELECT * FROM shop WHERE status='active'");
                                    $shop_row_data = $shop_sql->fetchAll(PDO::FETCH_OBJ);
                                     foreach($shop_row_data as $shop_data){?>
                                    <option value="<?php echo $shop_data->id;?>"><?php echo  $shop_data->shop_name;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                            <label for="old_price" class=" form-control-label">Old Price:</label>
                            <input type="text" id="old_price" name="old_price"  class="form-control" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                            <label for="new_price" class=" form-control-label">New Price:</label>
                            <input type="text" id="new_price" name="new_price" class="form-control" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                          <label for="availability" class=" form-control-label">Availability:</label>
                          <select class="form-control" name="availability" id="availability">
                            <option value="">Select Availability</option>
                            <option value="available">In Stock</option>
                            <option value="not available">Out of Stock</option>
                          </select>
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                          <label for="description" class=" form-control-label">Description:</label>
                          <textarea class="form-control" name="description" id="description" required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" name="addProductBtn" id="addProductBtn" class="btn btn-primary">Submit</button>
                  </div>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>

          <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">UPDATE PRODUCT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div id="product_detail"></div>
                  </div>
                  
                </div>
              </div>
            </div>
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
                        <input type="hidden" name="status_id" id="product_id">
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
        <!-- modal end ------------------------------- -->

      <!-- COPYRIGHT-->
      <?php include 'include/footer.php'; ?>

    <script type="text/javascript">
      function status(id) {
        document.getElementById('product_id').value=id;
      }

      function edit(id) {
          jQuery.ajax({
          url: "php/fetch_product_for_edit.php",
          data:{
            id : id
          },
          type: "POST",
              success:function(data){
                $("#product_detail").html(data);

              },  
              error:function (){}
          });
      }
    </script>

</body>

</html>
<!-- end document-->

