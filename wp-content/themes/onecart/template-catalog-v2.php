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
			
			<div style="margin-top:20px">
			<div class="newsletter newsletter-subscription">
			<form method="post" action="http://dress4club.com/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">

			<table cellspacing="5" cellpadding="0" border="0">

			<!-- email -->
			<tr><h3>NEWSLETTER SIGNUP</h3></tr>
			<tr>
				<td><input type="email" placeholder="Email" name="ne" size="20" required></td>
			</tr>

			<tr>
				<td class="newsletter-td-submit">
					<input class="newsletter-submit" type="submit" value="Subscribe"/>
				</td>
			</tr>

			</table>
			</form>
		</div>
		</div>
			<?php ocart_show_grid_filters() ?>
		</div>
	
		<div class="catalog">

			<?php $posts = get_posts( array( 'post_type' => 'product', 'numberposts' => -1 ) ); ?>
			<div class="catalog_title"><ins><?php _e('All Products','ocart'); ?></ins><span><?php if (count($posts) == 1) { printf(__('<span class="totalprod"><span id="products_count">%s</span> Product Found</span>','ocart'), count($posts)); } else { printf(__('<span class="totalprod"><span id="products_count">%s</span> Products Found</span>','ocart'), count($posts)); } ?></span></div>
			
			<ul class="catalog_list">
			<!-- data -->
			</ul><div class="clear"></div>
		
		</div><div class="clear"></div>
	
	</div>
</div>