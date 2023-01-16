
<section>
	<div class="bg_in">
		<br>
		<div class="contact_form">
			<div class="contact_left">
				<div class="ch-contacts-details">
					<ul class="contact-list">
						<li class="addr"><strong class="title">Địa chỉ của chúng tôi</strong>
							<p>
								<em><strong>3t phone</strong></em><br /> <em> 333B Minh Phụng,
									Phường 2, Quận 11, HCM<br /> Điện thoại : 0932 023 992<br />
								</em>
							
							<p>

								<a href="<?php echo BASE_URL?>" class="arrow-link"><i
									class="fa fa-long-arrow-left" aria-hidden="true"></i> Về trang
									chủ</a>

							</p></li>
					</ul>
					<!--                        <div class="hiring-box"> -->
					<!--                         <strong class="title">Chào bạn!</strong> -->

					<!--                         <p>Mọi thắc mắc bạn hãy gửi về mail của chúng tôi <strong>thietbivanphong@gmail.com</strong> chúng tôi sẽ giải đáp cho bạn.</p> -->


					<!--                         </div>  -->
				</div>
			</div>
			<div class="contact_right">
				<div class="form_contact_in">
					<div class="box_contact">
					<?php
    
    if (isset($_SESSION['hoso'])) {
        
        ?>
						<form name="FormDatHang" method="post" action="<?=BASE_URL?>/contact/guimail">
						<?php
        foreach ($_SESSION['hoso'] as $key => $infor) {
            ?>
            							
							<div class="content-box_contact">
								<div class="row">
									<div class="input">
										<label>Họ và tên: <span style="color: red;">*</span></label> <input
											type="text" name="name"
											value="<?php echo $infor['customers_name']?>" readonly
											required class="clsip">
									</div>
									<div class="clear"></div>
								</div>
								
								
								<!---row---->
								<div class="row">
									<div class="input">
										<label>Email: <span style="color: red;">*</span></label> <input
											type="text" name="email"
											onchange="return KiemTraEmail(this);"
											value="<?php echo $infor['customers_email']?>" readonly
											required class="clsip">
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->
								<div class="row">
									<div class="input">
										<label>Nội dung: <span style="color: red;">*</span></label>
										<textarea type="text" name="noidung" class="clsipa" required></textarea>
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->
								<div class="row btnclass">
									<div class="input ipmaxn ">
										<input type="submit" class="btn-gui" name="frmSubmit"
											id="frmSubmit" value="Gửi liên hệ"> <input type="reset"
											class="btn-gui" value="Nhập lại">
									</div>
									<div class="clear"></div>
								</div>
								<!---row---->
								<div class="clear"></div>
							</div>
											<?php
        }
        ?>
								</form>
								<?php
    }
    ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!---End bg_in----->