 <!-- ============================================================== -->
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">List of Products</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="<?php echo BASE_URL?>/login/dashboard" class="fw-normal">Dashboard</a></li>
                            </ol>
                            <a href="<?php echo BASE_URL?>/login/logout" target="_blank" class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h2 class="box-title">Products Table</h2>
                            <h3><a class="fas fa-hand-point-right" href="<?php echo BASE_URL?>/product/add_product"> Add Product</a></h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Title Product</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Quantity</th>
                                            <th class="border-top-0">Category</th>
                                            <th class="border-top-0">Image</th>
                                            <th class="border-top-0">Hot</th>
                                            <th class="border-top-0">Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                    $i = 0;
                                    foreach ($product as $key => $pro) {
                                        $i ++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $pro['title_product']?></td>
                                            <td><?php echo number_format($pro['price_product'],0,',','.').' vnđ'?></td>
                                            <td><?php echo $pro['quantity_product']?></td>
											<td><?php echo $pro['title_category_product']?></td>
                                			<td><img class="img_add"
                                				src="<?php echo BASE_URL?>/public/uploads/product/<?php echo $pro['image_product']?>"></td>
                                            <td><?php
                                                if ($pro['product_hot'] == 0) {
                                                    echo "No";
                                                } else {
                                                    echo "Yes";
                                                }
                                                ?></td>
                                            <td>
                                                <a href="<?php echo BASE_URL?>/product/edit_product/<?php echo $pro['id_product']?>">Edit</a> ~ 
                                                <a href="<?php echo BASE_URL?>/product/delete_product/<?php echo $pro['id_product']?>">Delete</a>
                                            </td>
                                        </tr>
                                           <?php 
                                }
                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
            




