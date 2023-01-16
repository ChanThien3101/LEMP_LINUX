<?php
foreach ($details_post as $key => $post) {
    $name_post = $post['title_post'];
    $name_category_post = $post['title_category_post'];
    $id_cate = $post['id_category_post'];
}
?>

<!--start:body-->
<section>
<?php
foreach ($details_post as $key => $details) {
    ?>
	<div class="bg_in">
		<div class="wrapper_all_main">
			<div class="breadcrumbs">
				<ol itemscope itemtype="http://schema.org/BreadcrumbList">
					<li itemprop="itemListElement" itemscope
						itemtype="http://schema.org/ListItem"><a itemprop="item"
						href="<?php echo BASE_URL?>"> <span itemprop="name">Trang chủ</span></a>
						<meta itemprop="position" content="1" /></li>
					<li itemprop="itemListElement" itemscope
						itemtype="http://schema.org/ListItem"><a itemprop="item"
						href="<?php echo BASE_URL?>/tintuc/danhmuc/<?php echo $id_cate?>">
							<span itemprop="name"><?php echo $name_category_post?></span>
					</a>
						<meta itemprop="position" content="2" /></li>
					<li itemprop="itemListElement" itemscope
						itemtype="http://schema.org/ListItem"><span itemprop="item"> <strong
							itemprop="name">
                     <?php echo $name_post?>
                     </strong>
					</span>
						<meta itemprop="position" content="3" /></li>
				</ol>
			</div>
			<!--breadcrumbs-->
			<div class="content_page">
				<div class="box-title">
					<div class="title-bar">
						<h1><?php echo $name_post?></h1>
					</div>
				</div>
				<div class="content_text"><?php echo $details['content_post']?></div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="module_pro_all">
			<div class="box-title">
				<div class="title-bar">
					<h3>Tin tức liên quan</h3>
				</div>
			</div>
			<div class="pro_all_gird">
				<div class="girds_all list_all_other_page ">
				<?php
    foreach ($related_post as $key => $related) {
        ?>
					<div class="grids">
						<div class="grids_in">
							<div class="content">
								<div class="img-right-pro">
									<a
										href="<?php echo BASE_URL?>/tintuc/chitiettin/<?php echo $related['id_post']?>">
										<img class="lazy img-pro content-image"
										src="<?php echo BASE_URL?>/public/uploads/post/<?php echo $related['image_post']?>"
										data-original="image/iphone.png" alt="Máy in Canon MF229DW" />
									</a>

								</div>
								<div class="name-pro-right">
									<a
										href="<?php echo BASE_URL?>/tintuc/chitiettin/<?php echo $related['id_post']?>">
										<h3><?php echo $related['title_post']?></h3>
									</a>
								</div>
							</div>
						</div>
						<!--start:left-->
						<div class="wrapper_all_main_left"></div>
						<!--end:left-->
						<div class="clear"></div>
					</div>
					<?php
    }
    ?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>
</section>
<!---End bg_in----->
