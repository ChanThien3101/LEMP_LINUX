 <!-- ============================================================== -->
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Order Details</h4>
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
                            <h2 class="box-title">Orderer</h2>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Customer Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Phone Number</th>
                                            <th class="border-top-0">Address</th>
                                            <th class="border-top-0">Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                    $i = 0;
                                    foreach ($order_info as $key => $ord_if) {
                                        $i ++;
                                    ?>
                                        <tr>
                                        <td><?php echo $i?></td>
                            			<td><?php echo $ord_if['name']?></td>
                            			<td><?php echo $ord_if['email']?></td>
                            			<td><?php echo $ord_if['sodienthoai']?></td>
                            			<td><?php echo $ord_if['diachi']?></td>
                            			<td><?php echo $ord_if['noidung']?></td>
                                        </tr>
                                   <?php 
                                    }
                                   ?>        
                               
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="white-box">
                            <h2 class="box-title">Order Table</h2>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Product's Name</th>
                                            <th class="border-top-0">Image</th>
                                            <th class="border-top-0">Total</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Into Money</th>
                                            <th class="border-top-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                        $i = 0;
                                        $total = 0;
                                        foreach ($order_details as $key => $ord) {
                                        $total += $ord['price_product'] * $ord['product_quantity'];
                                        $i ++;
                                        ?>
                                        <tr>
                                           	<td><?php echo $i?></td>
                                			<td><?php echo $ord['title_product']?></td>
                                			<td><img class="img_add" alt="<?php echo $ord['title_product']?>"
                                				src="<?php echo BASE_URL?>/public/uploads/product/<?php echo $ord['image_product']?>"></td>
                                			<td><?php echo $ord['product_quantity']?></td>
                                			<td><?php echo number_format($ord['price_product'],0,',','.').'đ'?></td>
                                			<td><?php echo number_format($ord['price_product']*$ord['product_quantity'],0,',','.').'đ'?></td>
                                			<td><?php if ($ord['quantity_product'] > 0){echo 'Còn hàng';} else{ echo 'Hết hàng';} ?></td>
                                        </tr>
                                           <?php 
                                            }
                                            ?>
                                             <form action="<?php echo BASE_URL?>/order/order_confirm/<?php echo $ord['order_code'] ?>" method="post">
                                		<tr>
                                			<td><input type="submit" name="update_order" value="Processed" class="btn btn-success"></td>
                                			<td align="right" colspan="6">Tổng Tiền: <?php echo number_format($total,0,',','.').'đ'?></td>
                                		</tr>
                                		<tr>
                                		<td><a href="<?php echo BASE_URL?>/order/order" class="far fa-arrow-alt-circle-left"> Back</a></tr>
                                		</form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>