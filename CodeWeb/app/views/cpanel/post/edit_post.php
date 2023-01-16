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
            foreach ($postbyid as $key => $post) {
                ?>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
               
                <!-- Row -->
                <form class="form-horizontal form-material" enctype="multipart/form-data" action="<?php echo BASE_URL?>/post/update_post/<?php echo $post['id_post']?>" method="post">
                <div class="row">
                <!-- Column -->
                
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                    <label class="col-md-12 p-0">Post Images</label>
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="<?php echo BASE_URL?>/public/uploads/post/<?php echo $post['image_post']?>">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="<?php echo BASE_URL?>/public/uploads/post/<?php echo $post['image_post']?>"
                                           class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white mt-2"><?php echo $post['title_post']?></h4>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box mt-5 d-md-flex">
                                <div class="col-md-4 col-sm-4 text-center">
                                   <input type="file" class="form-control p-0 border-0" name="image_post">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                         
                            <div class="card-body">
                                <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Post Title</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Samsung và những sản phẩm sắp ra mắt"
                                                class="form-control p-0 border-0" name="title_post" value="<?php echo $post['title_post']?>"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Post Details</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea id="editor" rows="5" class="form-control p-0 border-0" name="content_post"><?php echo $post['content_post']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">News Category</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="category_post">
                                            <?php
                                                foreach ($category as $key => $cate) {
                                                    ?>
                                            				<option
                                            					<?php if ($cate['id_category_post'] == $post['id_category_post']){echo 'selected';}?>
                                            					value="<?php echo $cate['id_category_post']?>"><?php echo $cate['title_category_post']?></option>
                                            	<?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update Post</button>
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

