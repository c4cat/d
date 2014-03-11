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

							<li><a href="<?php echo get_permalink($post->ID); ?>" id='hover-a'>Details</a></li>
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
		
		</div>