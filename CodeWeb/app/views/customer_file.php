
<section>
	<div class="bg_in">

		<div class="contact_form">
			<br>
			<form
				action="<?php echo BASE_URL?>/khachhang/update_khachhang/<?php echo $_SESSION['customer_id'] ?>"
				method="post">
				<?php
    foreach ($_SESSION['hoso'] as $key => $infor) {
        // if ($_SESSION['hoso'][$key]['customers_id'] == $_SESSION['userid']) {
        ?>
				<div class="contact_left">
					<h5 class="title_login">Hồ sơ khách hàng</h5>

					<div class="form_contact_in">
						<div class="box_contact">

							<div class="content-box_contact">
								<div class="row">
									<div class="input">
										<label>Họ và tên: <span style="color: red;">*</span>
										</label> <input type="text" name="txtHoTen" required
											class="clsip" value="<?php echo $infor['customers_name']?>">
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->
								<div class="row">
									<div class="input">
										<label>Số điện thoại: <span style="color: red;">*</span></label>
										<input type="text" name="txtDienThoai" required
											onkeydown="return checkIt(event)" class="clsip"
											value="<?php echo $infor['customers_phone']?>">
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->
								<div class="row">
									<div class="input">
										<label>Địa chỉ: <span style="color: red;">*</span></label> <input
											type="text" name="txtDiaChi" required class="clsip"
											value="<?php echo $infor['customers_address']?>">
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->
								<div class="row">
									<div class="input">
										<label>Email: <span style="color: red;">*</span></label> <input
											type="email" name="txtEmail"
											onchange="return KiemTraEmail(this);" required class="clsip"
											value="<?php echo $infor['customers_email']?>">
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->


								<div class="row btnclass">
									<div class="input ipmaxn ">
										<input type="submit" class="btn-gui" name="luu" id="frmSubmit"
											value="Lưu"> <input type="submit" class="btn-gui" name="xoa"
											id="frmSubmit" value="Xóa Tài Khoản">
									</div>
									<div class="clear"></div>
								</div>

								<!---row---->

								<div class="row btnclass">
									<div class="input ipmaxn ">
				<?php
        if (isset($_SESSION['msg'])) {
            echo '<span style = "color:red; font-weight: bold;font-size: 20px;">' . $_SESSION['msg'] . '</span>';
            unset($_SESSION['msg']);
        }
        ?>
										</div>
									<div class="clear"></div>
								</div>
								<!---row---->
								<div class="clear"></div>
							</div>

						</div>
					</div>

				</div>
				  <?php
        // }
    }
    ?>
			</form>


		</div>
	</div>
</section>
<!---End bg_in----->