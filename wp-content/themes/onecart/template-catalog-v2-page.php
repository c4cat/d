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
		<a href="template-catalog-v2.php" id="" title="template-catalog-v2">template-catalog-v2</a>}
		//]]>
		</script>

		
		<!-- categories, options -->
		<div class="filter">

			<?php ocart_show_grid_filters() ?>
			<div style="margin:20px 0"><iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FDress4Club%2F1409603325952688&amp;width=190&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:190px; height:290px;" allowTransparency="true"></iframe></div>
			<div id='the-fix'>
			<div style="margin:20px 0">
                <div class="newsletter newsletter-subscription">
					<form method="post" action="http://dress4club.com/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
						<table cellspacing="5" cellpadding="0" border="0">
						<!-- email -->
							<tr><h3>NEWSLETTER SIGNUP123</h3></tr>
							<tr><td><input type="email" placeholder="Email" name="ne" size="20" required></td><td class="newsletter-td-submit"><input class="newsletter-submit" id="newsletter-submit" type="submit" value="Subscribe"/></td></tr>
							<tr></tr>
						</table>
					</form>
				</div>
				<!-- pint -->
				<div class='the-pint'>
					 <a data-pin-do="embedUser" href="http://www.pinterest.com/dress4club/" data-pin-scale-width="60" data-pin-scale-height="290" data-pin-board-width="188">Visit Dress4Club's profile on Pinterest.</a>
				</div>
			</div>
			</div>
		</div>
	
		<div class="catalog">

			<?php $posts = get_posts( array( 'post_type' => 'product', 'numberposts' => -1 ) ); ?>
			<div class="catalog_title"><ins><?php _e('All Products','ocart'); ?></ins><span><?php if (count($posts) == 1) { printf(__('<span class="totalprod"><span id="products_count">%s</span> Product Found</span>','ocart'), count($posts)); } else { printf(__('<span class="totalprod"><span id="products_count">%s</span> Products Found</span>','ocart'), count($posts)); } ?></span></div>
			
			<ul class="catalog_list2">
			<?php
			global $post, $paged;
			$orig_post = $post;
			$post_per_page = 15;
			$real_paged = ($paged <= 1) ? 1 : $paged;
			//var_dump($posts);
			$allpost_count = count($posts);
			$total_paged = ceil($allpost_count / $post_per_page);
			$real_paged = ($real_paged > $total_paged) ? $total_paged : $real_paged;
			$post_begin = ($real_paged - 1) * $post_per_page;
			$post_end = $post_begin + $post_per_page - 1;
			$post_end = ($post_end > ($allpost_count - 1)) ? ($allpost_count - 1) : $post_end;
			$i = 0;
			 if ($posts): ?>

				
					<?php
					    foreach ($posts as $post) {
					        // 只显示当前页面内的
					        if ($i >= $post_begin && $i <= $post_end) {
					            setup_postdata($post);
					?>
						<li><p><a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a></p></li>
					<?php } $i++; ?>
					<?php } ?>
				

					</ul>
				<?php endif; ?>
				<?php $post = $orig_post;?>
				<?php
				if (1 != $total_paged) { ?>
				    <div class="page-link">
				        <div id="pageintion">
				        	<ul></ul>
				<?php
				    $cur_link = get_permalink();
				    $prev = $real_paged - 1;
				    $next = $real_paged + 1;
				    $showitems = ($range * 2) + 1;
				    //输出第一页
				    echo '<li class="prev"><a href="' . get_pagenum_link(1) . '" alt="prev" title="prev"></a></li>';
				    //输出最后一页
				    for ($i = 1; $i <= $total_paged; $i++) {
				        if (1 != $total_paged && (!($i >= $real_paged + $post_per_page + 1 || $i <= $real_paged - $real_paged - 1) || $total_paged <= $showitems)) {
				            echo ($real_paged == $i) ? "<li><span class='current'><a href='#'>" . $i . "</a></span></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
				        }
				    }
				    echo '<li class="next"><a href="' . get_pagenum_link($next) . '" alt="next" title="next"></a></li>';
				?>
                    </div>
                </div><!---//page-link-->
			<?php } ?>

			<div class="progress-bar blue stripes" id='the-pro'><span style="width:100%;"><a href="javascript:void(0)" class='the-next'>Click To Load More...</a></span></div>
			<div class="clear"></div>
		
		</div><div class="clear"></div>
	
	</div>
</div>