             <!-- ============================================================== -->
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Post Category</h4>
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
            
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                        
                            <div class="card-body">
                                <form class="form-horizontal form-material" enctype="multipart/form-data" action="<?php echo BASE_URL?>/post/insert_category" method="post">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Category Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Công nghệ 24h"
                                                class="form-control p-0 border-0" name="title_category_post"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Category Descriptionn</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea id="editor" rows="5" class="form-control p-0 border-0" name="desc_category_post"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Add Category</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
            </div>