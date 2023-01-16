
<section>
	<div class="bg_in">
		<div class="col-md-7 col-xs-12 col-sm-12"
			style="padding: 0; margin-top: 10px;">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<img src="<?php echo BASE_URL?>/public/images/Banner_1.jpg"
							alt="Siêu khuyến mãi">
					</div>

					<div class="item">
						<img src="<?php echo BASE_URL?>/public/images/Banner_2.jpg"
							alt="Siêu khuyến mãi">
					</div>

					<div class="item">
						<img src="<?php echo BASE_URL?>/public/images/Banner_3.png"
							alt="Siêu khuyến mãi">
					</div>
					
					<div class="item">
						<img src="<?php echo BASE_URL?>/public/images/Banner_4.jpg"
							alt="Siêu khuyến mãi">
					</div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel"
					data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a> <a class="right carousel-control" href="#myCarousel"
					data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div class="col-md-4 col-xs-12 col-sm-12"
			style="padding: 0; margin-left: 30px; margin-top: 5px;">
			<div class="row">
				<div class="panel  panel-warning panel-styling">
					<div class="panel-heading">Tin tức cập nhật</div>
					<div class="panel-body scrollable-panel">
						<?php
    foreach ($post_index as $key => $post) {
        ?>
							<div class="row">
							<a href="<?php echo BASE_URL?>/tintuc/chitiettin/<?php echo $post['id_post']?>">
							<div class="col-md-4 col-xs-4 col-sm-4">
								<img
									src="<?php echo BASE_URL?>/public/uploads/post/<?php echo $post['image_post']?>">
							</div>
							<div class="col-md-8 col-xs-8 col-sm-8">
								<p><?php echo substr($post['title_post'], 0,35)?>...</p>
								<h5><?php echo substr($post['content_post'], 0,35)?>...</h5>
								<!-- substr(): cắt ký tự -->
							</div>
							</a>
						</div>
							<?php
    }
    ?>
							
							<hr>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="clear"></div>
</section>
