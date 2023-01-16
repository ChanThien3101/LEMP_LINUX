 <!-- ============================================================== -->
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Order List</h4>
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
                            <h2 class="box-title">Order Table</h2>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Code Orders</th>
                                            <th class="border-top-0">Order Date</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                        $i = 0;
                                        foreach ($order as $key => $ord) {
                                            $i ++;
                                            ?>
                                        <tr>
                                            <td><?php echo $i?></td>
                                			<td><?php echo $ord['order_code']?></td>
                                			<td><?php echo $ord['order_date']?></td>
                                			<td><?php
                                        if ($ord['order_status'] == 0) {
                                            echo 'Đơn hàng mới';
                                        } else {
                                            echo 'Đã xử lý';
                                        }
                                        ?></td>
                                            <td>
                                                <a href="<?php echo BASE_URL?>/order/order_details/<?php echo $ord['order_code']?>">Details</a> ~ 
                                                <a href="<?php echo BASE_URL?>/order/delete_order/<?php echo $ord['order_code']?>">Delete</a>
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
