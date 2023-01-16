<?php
foreach ($details_product as $key => $product) {
    $name_product = $product['title_product'];
    $name_category_product = $product['title_category_product'];
    $id_cate = $product['id_category_product'];
}
?>

<section>
<?php
foreach ($details_product as $key => $details) {
    ?>
   <div class="bg_in">
		<div class="wrapper_all_main">
			<div class="wrapper_all_main_right no-padding-left"
				style="width: 100%;">
				<div class="breadcrumbs">
					<ol itemscope itemtype="http://schema.org/BreadcrumbList">
						<li itemprop="itemListElement" itemscope
							itemtype="http://schema.org/ListItem"><a itemprop="item"
							href="<?php echo BASE_URL?>"> <span itemprop="name">Trang chủ</span></a>
							<meta itemprop="position" content="1" /></li>
						<li itemprop="itemListElement" itemscope
							itemtype="http://schema.org/ListItem"><a itemprop="item"
							href="<?php echo BASE_URL?>/sanpham/danhmuc/<?php echo $id_cate?>">
								<span itemprop="name"><?php echo $name_category_product?></span>
						</a>
							<meta itemprop="position" content="2" /></li>
						<li itemprop="itemListElement" itemscope
							itemtype="http://schema.org/ListItem"><span itemprop="item"> <strong
								itemprop="name">
                     <?php echo $name_product?>
                     </strong>
						</span>
							<meta itemprop="position" content="3" /></li>
					</ol>
				</div>
				<div class="content_page">
					<div class="content-right-items margin0">
						<div class="title-pro-des-ct">
							<h1><?php echo $name_product?></h1>
						</div>
						<div class="slider-galery ">
							<div id="sync1" class="owl-carousel owl-theme">
								<div class="item">
									<img
										src="<?php echo BASE_URL?>/public/uploads/product/<?php echo $details['image_product']?>"
										width="100%">
								</div>

							</div>
							<div id="sync2" class="owl-carousel owl-theme">
								<div class="item">
									<img
										src="<?php echo BASE_URL?>/public/uploads/product/<?php echo $details['image_product']?>"
										width="100%">
								</div>

							</div>
						</div>
						<div class="content-des-pro">
							<div class="content-des-pro_in">
								<div class="pro-des-sum">
									<div class="price">
										<p class="code_skin" style="margin-bottom: 10px">
											<span>Mã hàng: <a href="chitietsp.php"><?php echo $details['id_product']?></a>
												| Thương hiệu: <a href=""><?php echo $details['title_category_product']?></a></span>
										</p>
										<div class="status_pro">
											<span><b>Trạng thái:</b> Còn hàng</span>
										</div>
										<div class="status_pro">
											<span><b>Xuất xứ:</b> Việt Nam</span>
										</div>
									</div>
									<div class="color_price">
										<span class="title_price bg_green">Giá bán</span> <?php echo number_format( $details['price_product'],0,',','.')?> <span>vnđ</span>.
										(GIÁ CHƯA VAT)
										<div class="clear"></div>
									</div>

								</div>
								<div class="clear"></div>
							</div>
							<div class="content-pro-des">
								<div class="content_des">
									<p style="font-size: 16px; font-weight: bold;"><?php echo $details['title_product']?></p>
									<br />
									<p><?php echo $details['desc_product']?></p>

								</div>
							</div>
							
							<?php 
							if (Session::get('customerdn')) {
							    ?>
                          <form
						action="<?php echo BASE_URL?>/giohang/themgiohang" method="post">
						
						<?php
                    } else {
                        
                        echo '<form
						action="' . BASE_URL . '/khachhang/dangnhap" method="post">';
                    }
                    ?>
							
							
								<input type="hidden" value="<?php echo $details['id_product']?>"
									name="product_id"> <input type="hidden"
									value="<?php echo $details['title_product']?>"
									name="product_title"> <input type="hidden"
									value="<?php echo $details['image_product']?>"
									name="product_image"> <input type="hidden"
									value="<?php echo $details['price_product']?>"
									name="product_price">
								<!-- 							 <input type="hidden" value="1" -->
								<!-- 							name="product_quantity"> -->

								<div class="ct">
									<div class="number_price">
										<div class="custom pull-left">
											<button
												onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 0 ) result.value--;return false;"
												class="reduced items-count" type="button">-</button>
											<input type="text" class="input-text qty" title="Qty"
												value="1" maxlength="99" id="qty" name="product_quantity">
											<button
												onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
												class="increase items-count" type="button">+</button>
											<div class="clear"></div>
										</div>
										<div class="clear"></div>
									</div>
									<div class="wp_a">


										<button type="submit" class="view_duan">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i> <span
												class="text-mobile-buy">Mua hàng</span>
										</button>
										<!-- 										<button type="submit" href="tel:090 66 99 038" -->
										<!-- 											class="view_duan"> -->
										<!-- 											<i class="fa fa-phone" aria-hidden="true"></i> <span -->
										<!-- 												class="text-mobile-buy">Gọi ngay</span> -->
										<!-- 										</button> -->


										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
							</form>
							<div class="tags_products prodcut_detail">
								<div class="tab_link">
									<h3 class="title_tab_link">TAGS:</h3>
									<div class="content_tab_link">
										<a href="tag/"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="content-des-pro-suport">
							<div class="box-setup">
								<div class="title-setup">
									<i class="fa fa-tasks" aria-hidden="true"></i> Dịch vụ &amp;
									Chú ý
								</div>
								<div class="info-setup">
									<div class="row-setup">
										<p style="text-align: justify">Quý khách vui lòng liên hệ với
											nhân viên bán hàng theo số điện thoại Hotline sau :</p>
										<p>
											<span style="color: #d50100">0399 819 699</span>&nbsp;để biết
											thêm chi tiết về Phụ kiện sản phẩm.
										</p>
									</div>
								</div>
							</div>
							<div class="info-prod prod-price freeship">
								<span class="title">
									<p>
										<!-- <img alt="chuyển hàng miễn phí tại thietbivanphong123.com" src="/data/upload/ship-hang-mien-phi.png" style="height:33px; width:60px" /> -->
										Bạn sẽ được giao hàng miễn phí trong khu vực Đà Nẵng khi mua
										sản phẩm này.
									</p>
								</span> <span class="row more"><a href="" title="">Xem thêm</a>
								</span>
							</div>
							<div class="bx-contact">
								<span class="title-cnt">Bạn cần hỗ trợ?</span>
								<p>Chat với chúng tôi :</p>
								<p>
									<img alt="icon skype "
										src="<?php echo BASE_URL?>/public/images/icon skype.png"
										style="height: 24px; width: 24px" />&nbsp;<a
										href="skype:quangtran.123corp?chat">dhduc@vku.udn.vn</a>
								</p>

							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="wrapper_all_main_right">
				<div class="clear"></div>
				<div class="clear"></div>
				<div class="dmsub">
					<div class="tags_products desktop">
						<div class="tab_link">
							<h3 class="title_tab_link">TAGS:</h3>
							<div class="content_tab_link">
								<a href="<?php echo BASE_URL?>/sanpham/danhmuc/<?php echo $id_cate?>"><?php echo $details['title_category_product']?></a>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="content-brank">
               <p><strong>Apple </strong>tự hảo<strong>&nbsp;</strong>là thương hiệu Việt Nam về sản phẩm tủ rack 19", tủ cửa lưới, tủ treo tường, bảo vệ thiết bị mạng an toàn, dễ dàng quản lý và vận hành.</p>
               </div> -->
				<div class="module_pro_all">
					<div class="box-title">
						<div class="title-bar">
							<h3>Sản phẩm liên quan</h3>
						</div>
					</div>
					<div class="pro_all_gird">
						<div class="girds_all list_all_other_page ">
						
						<?php foreach ($related_product as $key => $related){
						if (Session::get('customerdn')) {
                        ?>
                          <form
						action="<?php echo BASE_URL?>/giohang/themgiohang" method="post">
						
						<?php
                    } else {
                        
                        echo '<form
						action="' . BASE_URL . '/khachhang/dangnhap" method="post">';
                    }
                    ?>
								<input type="hidden" value="<?php echo $related['id_product']?>"
									name="product_id"> <input type="hidden"
									value="<?php echo $related['title_product']?>"
									name="product_title"> <input type="hidden"
									value="<?php echo $related['image_product']?>"
									name="product_image"> <input type="hidden"
									value="<?php echo $related['price_product']?>"
									name="product_price"> <input type="hidden" value="1"
									name="product_quantity">

								<div class="grids">
									<div class="grids_in">
										<div class="content">
											<div class="img-right-pro">
												<a href="sanpham.php"> <img
													class="lazy img-pro content-image"
													src="<?php echo BASE_URL?>/public/uploads/product/<?php echo $related['image_product']?>"
													data-original="image/iphone.png" alt="Máy in Canon MF229DW" />
												</a>
												<div class="content-overlay"></div>
												<div class="content-details fadeIn-top">
													<ul class="details-product-overlay">
														<li><?php echo $related['desc_product']?></li>

													</ul>
												</div>
											</div>
											<div class="name-pro-right">
												<a
													href="<?php echo BASE_URL?>/sanpham/chitietsanpham/<?php echo $related['id_product']?>">
													<h3><?php echo $related['title_product']?></h3>
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
													<span class="news_price"><?php echo number_format( $related['price_product'],0,',','.')?> </span>
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
			</div>
			<!--end:left-->
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
  <?php
}
?>
   <script>
      jQuery(document).ready(function() {
      
      
      
          var div_fixed = jQuery('.product_detail_info').offset().top;
      
          jQuery(window).scroll(function() {
      
              if (jQuery(window).scrollTop() > div_fixed) {
      
                  jQuery('.tabs-animation').addClass('fix_top');
      
              } else {
      
                  jQuery('.tabs-animation').removeClass('fix_top');
      
              }
      
          });
      
          jQuery(window).load(function() {
      
              if (jQuery(window).scrollTop() > div_fixed) {
      
                  jQuery('.tabs-animation').addClass('fix_top');
      
              }
      
          });
      
      });
      
   </script>
</section>
<!--end:body-->
