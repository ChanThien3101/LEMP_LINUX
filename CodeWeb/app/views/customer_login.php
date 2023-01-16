
<section>
	<div class="bg_in">

		<div class="contact_form">
			<br>
			<form action="<?php echo BASE_URL?>/khachhang/insert_dangky"
				method="post">
				<div class="contact_left">
					<h5 class="title_login">Đăng ký khách hàng</h5>
					<div class="form_contact_in">
						<div class="box_contact">

							<div class="content-box_contact">
								<div class="row">
									<div class="input">
										<label>Họ và tên: <span style="color: red;">*</span></label> <input
											type="text" name="txtHoTen" required class="clsip">
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->
								<div class="row">
									<div class="input">
										<label>Số điện thoại: <span style="color: red;">*</span></label>
										<input type="text" name="txtDienThoai" required
											onkeydown="return checkIt(event)" class="clsip">
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->
								<div class="row">
									<div class="input">
										<label>Địa chỉ: <span style="color: red;">*</span></label> <input
											type="text" name="txtDiaChi" required class="clsip">
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->
								<div class="row">
									<div class="input">
										<label>Email: <span style="color: red;">*</span></label> <input
											type="email" name="txtEmail"
											onchange="return KiemTraEmail(this);" required class="clsip">
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->
								<div class="row">
									<div class="input">
										<label>Mật khẩu: <span style="color: red;">*</span></label> <input
											type="text" name="txtPassword"
											onchange="return KiemTraEmail(this);" required class="clsip">
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->

								<div class="row btnclass">
									<div class="input ipmaxn ">
										<input type="submit" class="btn-gui" name="dangky"
											id="frmSubmit" value="Đăng ký">
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
			</form>
			<form autocomplete="off"
				action="<?php echo BASE_URL?>/khachhang/login_customer"
				method="post">
				<div class="contact_right">
					<h5 class="title_login">Đăng nhập khách hàng</h5>
					<div class="form_contact_in">
						<div class="box_contact">
							<div class="content-box_contact">

								<!---row---->

								<div class="row">
									<div class="input">
										<label>Email / SĐT : <span style="color: red;">*</span></label> <input
											type="text" name="username"
											onchange="return KiemTraEmail(this);" required class="clsip"
											placeholder="email or phone number">
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->
								<div class="row">
									<div class="input">
										<label>Mật Khẩu: <span style="color: red;">*</span></label> <input
											type="password" name="password" required class="clsip"
											placeholder="* * * * *">
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->


								<div class="row btnclass">
									<div class="input ipmaxn ">
										<input type="submit" class="btn-gui" name="dangnhap"
											id="frmSubmit" value="Đăng Nhập">
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->
								<div class="row btnclass">
									<div class="input ipmaxn ">
				<?php
    if (isset($_SESSION['msgdn'])) {
        echo '<span style = "color:red; font-weight: bold;font-size: 20px;">' . $_SESSION['msgdn'] . '</span>';
        unset($_SESSION['msgdn']);
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
			</form>
		</div>
	</div>
</section>
<!---End bg_in----->