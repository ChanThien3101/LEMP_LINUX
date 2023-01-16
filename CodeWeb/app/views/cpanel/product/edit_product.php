             <!-- ============================================================== -->
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Update Product</h4>
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
            <?php
                foreach ($productbyid as $key => $pro) {
                    ?>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
               
                <!-- Row -->
                <form class="form-horizontal form-material" enctype="multipart/form-data" action="<?php echo BASE_URL?>/product/update_product/<?php echo $pro['id_product']?>" method="post">
                <div class="row">
                <!-- Column -->
                
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                    <label class="col-md-12 p-0">Image Product</label>
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="<?php echo BASE_URL?>/public/uploads/product/<?php echo $pro['image_product']?>">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="<?php echo BASE_URL?>/public/uploads/product/<?php echo $pro['image_product']?>"
                                                class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white mt-2"><?php echo $pro['title_product']?></h4>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box mt-5 d-md-flex">
                                <div class="col-md-4 col-sm-4 text-center">
                                   <input type="file" class="form-control p-0 border-0" name="image_product">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                         
                            <div class="card-body">
                                
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Title Product</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="<?php echo $pro['title_product']?>"
                                                class="form-control p-0 border-0" name="title_product"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Price Product</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="25000000"
                                                class="form-control p-0 border-0" name="price_product" value="<?php echo $pro['price_product']?>"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Quantity Product</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="<?php echo $pro['quantity_product']?>"
                                                class="form-control p-0 border-0" name="quantity_product"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Product Description</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea id="editor" rows="5" class="form-control p-0 border-0" name="desc_product"><?php echo $pro['desc_product']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Product Portfolio</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="category_product">
                                                	<?php
                                                foreach ($category as $key => $cate) {
                                                    ?>
                                            				<option
                                            					<?php if ($cate['id_category_product'] == $pro['id_category_product']){echo 'selected';}?>
                                            					value="<?php echo $cate['id_category_product']?>"><?php echo $cate['title_category_product']?></option>
                                            	<?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Featured Products</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="product_hot">
                                                <?php
                                                    if ($pro['product_hot'] == 0) {
                                                        ?>
                                                      		  	<option selected value="0">No</option>
                                                				<option value="1">Yes</option>
                                                				<?php
                                                    } else {
                                                        ?>
                                                				<option value="0">No</option>
                                                				<option selected value="1">Yes</option>
                                                				<?php
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update Product</button>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                   
                    <!-- Column -->
                </div>
                 </form>
                <!-- Row -->
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

                <?php 
                }
                ?>
