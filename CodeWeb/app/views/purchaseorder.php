<section>
	<div class="bg_in">
		<div class="content_page cart_page">
			<div class="breadcrumbs">
				<ol itemscope itemtype="http://schema.org/BreadcrumbList">
					<li itemprop="itemListElement" itemscope
						itemtype="http://schema.org/ListItem"><a itemprop="item"
						href="<?php echo BASE_URL ?>"> <span itemprop="name">Trang chủ</span></a>
						<meta itemprop="position" content="1" /></li>
					<li itemprop="itemListElement" itemscope
						itemtype="http://schema.org/ListItem"><span itemprop="item"> <strong
							itemprop="name"> Đơn hàng </strong>
					</span>
						<meta itemprop="position" content="2" /></li>
				</ol>
			</div>
			<div class="box-title">
				<div class="title-bar">
					<h1>Đơn hàng của bạn</h1>
				</div>
			</div>
               <?php
            if (isset($_SESSION['msg'])) {
                echo '<span style = "color:blue; font-weight: bold; font-size: 20px;">' . $_SESSION['msg'] . '</span>';
                unset($_SESSION['msg']);
            }
            ?>

               <div class="content_text">
				<div class="container_table">
					<table class="table table-hover table-condensed">
						<thead>
							<tr class="tr tr_first">
								<th>Hình ảnh</th>
								<th>Tên sản phẩm</th>

								<th>Giá</th>
								<th style="width: 100px;">Số lượng</th>
								<th>Thành tiền</th>
								<th style="width: 50px; text-align: center;"></th>
							</tr>
						</thead>
						<tbody>
                           <?php
                        if (isset($_SESSION['customerdn'])) {
                            
                            $total = 0;
                            foreach ($order_details as $key => $value) {
                            ?>
                           <form
								action="<?php echo BASE_URL ?>/donhang/edit_donhang/<?php echo $value['order_code'] ?>"
								method="POST">
                               <?php
                                    $subtotal = $value['product_quantity'] * $value['price_product'];
                                    $total += $subtotal;
                                    ?>
                              <tr class="tr">
									<td data-th="Hình ảnh">
										<div class="col_table_image col_table_hidden-xs">
											<img
												src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $value['image_product'] ?>"
												alt="<?php echo $value['title_product'] ?>"
												class="img-responsive" />
										</div>
									</td>
									<td data-th="Sản phẩm">
										<div class="col_table_name">
											<h4 class="nomargin"><?php echo $value['title_product'] ?></h4>
										</div>
									</td>

									<td data-th="Giá"><span class="color_red font_money"><?php echo number_format($value['price_product'],0,',','.').'đ' ?></span></td>

									<td data-th="Số lượng">
										<div class="clear margintop5">
											<div class="floatleft">

												<input type="number" min="1" class="inputsoluong"
													name="qty[<?php echo $value['product_id'] ?>]"
													value="<?php echo $value['product_quantity'] ?>">
											</div>

										</div>
										<div class="clear"></div>
									</td>

									<td data-th="Thành tiền" class="text_center"><span
										class="color_red font_money"><?php echo number_format($subtotal,0,',','.').'đ' ?></span></td>

									<td class="actions aligncenter">

										<button type="submit" style="box-shadow: none;"
											value="<?php echo $value['product_id'] ?>" name="delete_order"
											class="btn btn-sm btn-warning">Xóa</button>

										<button type="submit" style="box-shadow: none;"
											value="<?php echo $value['product_id'] ?>" name="update_order"
											class="btn btn-sm btn-primary">Cập nhật</button>
									</td>

								</tr>

							</form>
							
                           <?php
                                
                            }
                            ?>
                            <tr>
								<td colspan="7" class="textright_text">
									<div class="sum_price_all">
										<span class="text_price">Tổng tiền thành toán</span>: <span
											class="text_price color_red"><?php echo number_format($total,0,',','.').'đ' ?></span>
									</div>
								</td>
							</tr>
                            <?php 
                        } else {
                            ?>
                           <tr>
								<td colspan="7">
									<div class="sum_price_all">
										<span class="text_price">Đơn hàng</span> <span
											class="text_price color_red">Trống</span>
									</div>
								</td>
							</tr>
                           <?php
                        }
                        ?>
                        </tbody>
						<tfoot>
							<tr class="tr_last">
								<td colspan="7"><a href="<?php echo BASE_URL ?>"
									class="btn_df btn_table floatleft"><i
										class="fa fa-long-arrow-left"></i> Tiếp tục mua hàng</a>
									<div class="clear"></div></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="clear"></div>
<!---End bg_in----->