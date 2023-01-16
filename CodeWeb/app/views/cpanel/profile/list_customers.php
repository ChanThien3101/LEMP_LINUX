 <!-- ============================================================== -->
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">List of Customers</h4>
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
                            <h4 class="box-title">Customers Table</h4>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Customer Name</th>
                                            <th class="border-top-0">Phone</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Address</th>
                                            <th class="border-top-0">Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $i = 0;
                                    foreach ($list_customer as $key => $cus){
                                        $i++
                                    ?>
                                        <tr>
                                       		<td><?php echo $i?></td>
                                            <td><?php echo $cus['customers_name']?></td>
                                            <td><?php echo $cus['customers_phone']?></td>
                                            <td><?php echo $cus['customers_email']?></td>
                                            <td><?php echo $cus['customers_address']?></td>
                                            <td class="far fa-hand-point-right">
                                            <a class="far fa-trash-alt" href="<?php echo BASE_URL?>/khachhang/delete_customer/<?php echo $cus['customers_id']?>"></a>
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
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>