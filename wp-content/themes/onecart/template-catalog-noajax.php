<?php if (ocart_catalog_version() == 1) { ?>

<div id="catalog">

	<div class="wrap">
	
		<div class="catalogWrapper">
		
			<?php
			$sort = ocart_get_option('sort_products');
			if ($sort == 1) {
			$args = array( 'post_type' => 'product', 'numberposts' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', get_query_var( 'taxonomy' ) => get_query_var( 'term' ) );
			} else {
			$args = array( 'post_type' => 'product', 'numberposts' => -1, get_query_var( 'taxonomy' ) => get_query_var( 'term' ) );
			}
			$posts = get_posts( $args );
			?>

			<?php if (count($posts) > 0) { ?>
			
			<ul class="prods">
			
				<?php foreach ($posts as $post): setup_postdata($post); ?>

					<li id="item-<?php the_ID(); ?>" rel="<?php the_permalink(); ?>">
						<?php if (!ocart_get_option('disable_cart')) { ?>
						<?php ocart_product('tag'); ?>
						<?php } ?>
						<?php ocart_product('catalog_image'); ?>
						<div class="label">
							<div class="label-content">
								<span class="title"><?php ocart_product('title'); ?></span>
								<?php if (ocart_get_option('disable_cart') && ocart_get_option('disable_prices')) { } else { ?>
								<div class="price"><?php ocart_product('price'); ?></div>
								<?php } ?>
							</div>
						</div>
					</li>

				<?php endforeach; ?>

			</ul>
			
			<div class="nextItem"></div>
			<div class="prevItem"></div>
					
			<div class="nextproduct"></div>
			<div class="prevproduct"></div>
			
			<script type="text/javascript">
			
				// init carousel
				$('.prods').carouFredSel({
					width: 977,
					height: 277,
					scroll: 1,
					align: "left",
					auto: false,
					direction: "right",
					prev: {
						button: '.prevItem',
						onBefore: function(){
								$('.prods li').removeClass('viewport');
								$('.prevproduct').stop().animate({left: 0});
								$('.prods').trigger("currentVisible", function( items ) {
									items.addClass( 'viewport' );
									var next_item_id = $('.prods li.viewport:last').next().attr('id').replace(/[^0-9]/g, '');
									$('.nextproduct').load('<?php echo get_template_directory_uri(); ?>/ajax/getimage.php?id=' + next_item_id, function(){
										$('.prevproduct').hide().stop().animate({left: '-200px'});
									});
								});
						},
						onAfter: function(){
								$('.prods li').removeClass('viewport');
								$('.prods').trigger("currentVisible", function( items ) {
									items.addClass( 'viewport' );
									var $img = $('.prods li.viewport:first').last(),
										$prev = $img.prev();
									if (0==$prev.length) {
										$prev = $img.siblings().last();
									}
									var prev_item_id = $prev.attr('id').replace(/[^0-9]/g, '');
									$('.prevproduct').load('<?php echo get_template_directory_uri(); ?>/ajax/getimage.php?id=' + prev_item_id, function(){
										$('.prevproduct').show();
									});
								});
						}
					},
					next: {
						button: '.nextItem',
						onBefore: function(){
								$('.prods li').removeClass('viewport');
								$('.nextproduct').stop().animate({right: 0});
								$('.prods').trigger("currentVisible", function( items ) {
									items.addClass( 'viewport' );
									var prev_item_id = $('.prods li.viewport:first').attr('id').replace(/[^0-9]/g, '');
									$('.prevproduct').load('<?php echo get_template_directory_uri(); ?>/ajax/getimage.php?id=' + prev_item_id, function(){
										$('.nextproduct').hide().stop().animate({right: '-200px'});
									});
								});
						},
						onAfter: function(){
								$('.prods li').removeClass('viewport');
								$('.prods').trigger("currentVisible", function( items ) {
									items.addClass( 'viewport' );
									var next_item_id = $('.prods li.viewport:last').next().attr('id').replace(/[^0-9]/g, '');
									$('.nextproduct').load('<?php echo get_template_directory_uri(); ?>/ajax/getimage.php?id=' + next_item_id, function(){
										$('.nextproduct').show();
									});
								});
						}
					}
				});

				// change next/prev product
				if ($('.prods li').size() >= 7 ) {
					$('.prods').trigger("currentVisible", function( items ) {
						items.addClass( 'viewport' );
						var next_item_id = $('.prods li.viewport:last').next().attr('id').replace(/[^0-9]/g, '');
						$('.nextproduct').load('<?php echo get_template_directory_uri(); ?>/ajax/getimage.php?id=' + next_item_id);
						var last_item_id = $('.prods li:last').attr('id').replace(/[^0-9]/g, '');
						$('.prevproduct').load('<?php echo get_template_directory_uri(); ?>/ajax/getimage.php?id=' + last_item_id);
					});
				}
				
			</script>
			
			<?php } ?>

		</div>
	
	</div>
	
</div>

<?php } else { ?>

<div id="index">
	<div class="wrap">
		

		<script type="text/javascript">
		//<![CDATA[
		if (typeof newsletter_check !== "function") {
		window.newsletter_check = function (f) {
		    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
		    if (!re.test(f.elements["ne"].value)) {
		        alert("The email is not correct");
		        return false;
		    }
		    if (f.elements["ny"] && !f.elements["ny"].checked) {
		        alert("You must accept the privacy statement");
		        return false;
		    }
		    return true;
		}
		}
		//]]>
		</script>
	
		<!-- categories, options -->
		<div class="filter">
			<div style="margin-top:20px">
			<div class="newsletter newsletter-subscription">
			<form method="post" action="http://dress4club.com/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">

			<table cellspacing="5" cellpadding="0" border="0">

			<!-- email -->
			<tr><h3>NEWSLETTER SIGNUP</h3></tr>
			<tr><td><input type="email" placeholder="Email" name="ne" size="20" required></td><td class="newsletter-td-submit"><input class="newsletter-submit" id="newsletter-submit" type="submit" value="Subscribe"/></td></tr>
			<tr></tr>

			</table>
			</form>
			</div>
			<div class='the-pint'>
			 	<a data-pin-do="embedUser" href="http://www.pinterest.com/dress4club/" data-pin-scale-width="60" data-pin-scale-height="290" data-pin-board-width="188">Visit Dress4Club's profile on Pinterest.</a>
			</div>
		</div>
			<?php ocart_show_grid_filters() ?>
		</div>
	
		<div class="catalog">
			<?php 
			if(!isset($_GET['page'])){
				$the_page = 1;
			}else{
				$the_page = $_GET['page'];
			}
			$the_offect = $the_page * 9;
			$posts = get_posts( array( 'post_type' => 'product','numberposts' =>9,'offset' => $the_offect ) ); ?>

			<ul class="catalog_list_plus">
				<?php 
				foreach ($posts as $post) {
					setup_postdata($post);
				 ?>
				 <li id="product-<?php the_ID(); ?>">
					
					<?php if (!ocart_get_option('disable_cart') && ocart_product_in_stock()) { ?>
					<div class="catalog_quickadd"><span><?php _e('Select Options','ocart'); ?></span></div>
					<?php } ?>
					
					<a href="javascript:lightbox(null, '<?php echo get_template_directory_uri(); ?>/ajax/product_lightbox.php', '', '<?php the_ID(); ?>', '<?php echo get_permalink($post->ID); ?>');">
						
						<?php ocart_product('product_hover'); ?>
						<?php the_post_thumbnail( 'catalog-thumb', array('title' => '', 'class' => 'preload') ); ?>
						
						<?php if (!ocart_get_option('disable_cart')) { ?>
						
						<?php
						$status = get_post_meta($post->ID, 'status', true);
						// $link = get_post_meta($post->ID, 'buylink', true);
						$mark_as_onsale = get_post_meta($post->ID, 'mark_as_onsale', true);
						$mark_as_new = get_post_meta($post->ID, 'mark_as_new', true);
						if ($status == 'sold') {
						echo "<span class='catalog_item_status catalog_item_status_sold'>".__('Sold Out!','ocart')."</span>";
						} elseif (isset($mark_as_onsale) && $mark_as_onsale == 'on') {	
						echo "<span class='catalog_item_status catalog_item_status_sale'>".ocart_sticker_text('sale')."</span>";
						} elseif (isset($mark_as_new) && $mark_as_new == 'on' && ocart_is_new_product() ) {
						echo "<span class='catalog_item_status catalog_item_status_new'>".ocart_sticker_text('new')."</span>";
						}
						if (isset($mark_as_new) && isset($mark_as_onsale) && $mark_as_new == 'on' && $mark_as_onsale == 'on' && ocart_is_new_product() ) {
							echo '<div class="sticker_new">'.ocart_sticker_text('new', $wrap='span').'</div>';
						}
						?>
						
						<?php } ?>
		
						<span class="catalog_item_title">
							<span class="title"><?php the_title(); ?></span>
							
							<?php if (ocart_get_option('disable_cart') && ocart_get_option('disable_prices')) { } else { ?>
							<span class="price_orig"><?php ocart_product('plain_original_price'); ?></span>
							<span class="price">
								<?php ocart_product('price_in_grid'); ?>
								<?php if (ocart_has_product_tag()) { ?>
								<span class="catalog_item_options">
									<span class="catalog_item_options_div">
										<span class="arr"></span>
										<?php ocart_list_product_tag() ?>
									</span>
								</span>
								<?php } ?>
							</span>
							<?php } ?>
							
						</span>
					</a>
					<?php 
					$product_id = get_the_ID();
					$post2 = get_post($product_id);
					setup_postdata($post2);
					$link = get_post_meta($post2->ID, 'buylink', true);
					// echo($img);
					?>
					

					<div class="hover-box">
						<a href="<?php echo($link); ?>" id='buy-a' target='_blank'></a>
						<div id='bt'>
						<p><?php the_title(); ?></p>
						<ul>
							<li><iframe src="//www.facebook.com/plugins/like.php?href=<?php echo($link); ?>&amp;width&amp;layout=button&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:35px;" allowTransparency="true"></iframe></li>
							<li><a target='_blank' href="//www.pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); echo urlencode($image[0]); ?>&description=<?php echo urlencode($post->post_title); ?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a></li>

							<li><a href="javascript:lightbox(null, '<?php echo get_template_directory_uri(); ?>/ajax/product_lightbox.php', '', '<?php the_ID(); ?>', '<?php echo get_permalink($post->ID); ?>');" id='hover-a'>Details</a></li>
						</ul>
						</div>
					</div>
				</li>
				<?php } ?>
			</ul>
			<!-- load more -->
			<!-- <div class="progress-bar blue stripes" id='the-pro'><span style="width:100%;"><a href="javascript:void(0)" class='the-next'>Click To Load More...</a></span></div> -->
			<div id="page_plus">
				<a href="">&lt;&lt;</a>
				<a href="<?php if($the_page<2){echo('/');}else{echo('?page='+ ($the_page-1));}  ?>">&lt;</a>
				<a href="?page=<?php echo('?page='+ ($the_page+1)); ?>">&gt;</a>
				<a href="?page=<?php  ?>">&gt;&gt;</a>
			</div>
			<div class="clear"></div>
			<!-- load more -->
		
		</div><div class="clear"></div>
	
	</div>
</div>

<?php } ?>