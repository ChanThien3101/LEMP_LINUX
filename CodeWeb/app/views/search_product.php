<section>
	<div class="bg_in">
		<div class="wrapper_all_main">
			<div class="wrapper_all_main_right">
				<!--breadcrumbs-->
				<div class="breadcrumbs">
					<ol itemscope itemtype="http://schema.org/BreadcrumbList">
						<li itemprop="itemListElement" itemscope
							itemtype="http://schema.org/ListItem"><a itemprop="item"
							href="<?php echo BASE_URL?>"> <span itemprop="name">Trang chủ</span>
						</a>
							<meta itemprop="position" content="1" /></li>
						<li itemprop="itemListElement" itemscope
							itemtype="http://schema.org/ListItem"><span itemprop="item"> <strong
								itemprop="name"> Tất cả sản phẩm tìm kiếm</strong>
						</span>
							<meta itemprop="position" content="2" /></li>
					</ol>
					<ol itemscope itemtype="http://schema.org/BreadcrumbList">
					<?php
                    if (isset($_SESSION['msgdn'])) {
                        echo '<span style = "color:red; font-weight: bold;font-size: 20px;">' . $_SESSION['msgdn'] . '</span>';
                        unset($_SESSION['msgdn']);
                    }
                    ?>
                    </ol>
				</div>
				<!--breadcrumbs-->
				<div class="module_pro_all">
					<div class="box-title">
						<div class="title-bar">
							<h1>Tất cả sản phẩm</h1>

						</div>
					</div>
					<div class="pro_all_gird">
						<style type="text/css">
.grids.grids-list-product {
	height: 365px;
}
</style>
						<div class="girds_all list_all_other_page ">
         <?php
         foreach ($product_search as $key => $product) {
            if (Session::get('customerdn')) {
                ?>
                          <form
								action="<?php echo BASE_URL?>/giohang/themgiohang" method="post">
						
						<?php
            } else {
                echo '<form action="' . BASE_URL . '/khachhang/dangnhap"
									method="post">';
            }
            ?>
								<input type="hidden" value="<?php echo $product['id_product']?>"
									name="product_id"> <input type="hidden"
									value="<?php echo $product['title_product']?>"
									name="product_title"> <input type="hidden"
									value="<?php echo $product['image_product']?>"
									name="product_image"> <input type="hidden"
									value="<?php echo $product['price_product']?>"
									name="product_price"> <input type="hidden" value="1"
									name="product_quantity">
								<div class="grids grids-list-product">
									<div class="grids_in">
										<div class="content">
											<div class="img-right-pro">
												<a href="sanpham.php"> <img
													class="lazy img-pro content-image"
													src="<?php echo BASE_URL?>/public/uploads/product/<?php echo $product['image_product']?>"
													data-original="image/iphone.png" alt="Máy in Canon MF229DW" />
												</a>
												<div class="content-overlay"></div>
												<div class="content-details fadeIn-top">
													<ul class="details-product-overlay">
														<li><?php echo $product['desc_product']?></li>
													</ul>
												</div>
											</div>
											<div class="name-pro-right">
												<a
													href="<?php echo BASE_URL?>/sanpham/chitietsanpham/<?php echo $product['id_product']?>">
													<h3><?php echo $product['title_product']?></h3>
												</a>
											</div>
											<div class="add_card">
												<button type="submit" name="addcart"
													class="bg-btn btn-block">
													<i class="fa fa-shopping-cart text-white"
														aria-hidden="true"></i> Đặt hàng
												</button>
											</div>
											<div class="price_old_new">
												<div class="price">
													<span class="news_price"><?php echo number_format( $product['price_product'],0,',','.')?>đ </span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
            <?php
        }
        ?>
        
            <div class="clear"></div>

						</div>

						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				

			</div>

		</div>
	</div>

</section>