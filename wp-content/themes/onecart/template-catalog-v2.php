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
			<!-- copy start -->
			<div class="header">Shop by Category</div>
			<ul class="root-product_category mCustomScrollbar _mCS_2">
				<div class="mCustomScrollBox" id="mCSB_2" style="position:relative; height:100%; overflow:hidden; max-width:100%;">
					<div class="mCSB_container" style="position: relative; top: -20.150022983551025px;">
						<li class="parent_list" style="display: none;"><a href="http://localhost/d/?product_category=4email" id="product_category-4email">4email</a></li>
						<li class="parent_list"><a href="http://localhost/d/?product_category=boots" id="product_category-boots">Boots</a></li>
						<li class="parent_list"><a href="http://localhost/d/?product_category=chemise" id="product_category-chemise">Chemise</a></li>
						<li class="parent_list"><a href="http://localhost/d/?product_category=dress" id="product_category-dress">Dress</a></li>
						<li class="parent_list"><a href="http://localhost/d/?product_category=dresses" id="product_category-dresses">Dresses</a></li>
						<li class="parent_list"><a href="http://localhost/d/?product_category=heels" id="product_category-heels">Heels</a></li>
						<li class="parent_list"><a href="http://localhost/d/?product_category=lingerie" id="product_category-lingerie">Lingerie</a></li>
						<li class="parent_list"><a href="http://localhost/d/?product_category=pump" id="product_category-pump">Pump</a></li>
						<li class="parent_list"><a href="http://localhost/d/?product_category=pumps" id="product_category-pumps">Pumps</a></li>
						<li class="parent_list"><a href="http://localhost/d/?product_category=shoes" id="product_category-shoes">Shoes</a></li>
						<li class="parent_list"><a href="http://localhost/d/?product_category=tee" id="product_category-tee">tee</a></li>
						<li class="parent_list"><a href="http://localhost/d/?product_category=thong" id="product_category-thong">Thong</a></li>
						<li class="parent_list"><a href="http://localhost/d/?product_category=wedges" id="product_category-wedges">Wedges</a></li>
					</div>
				</div>
			</ul>
			<?php //ocart_show_grid_filters() ?>
			<!-- copy end -->
			<div style="margin:20px 0"><iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FDress4Club%2F1409603325952688&amp;width=190&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:190px; height:290px;" allowTransparency="true"></iframe></div>
			<div id='the-fix'>
			<div style="margin:20px 0">
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
				<!-- pint -->
				<div class='the-pint'>
					 <a data-pin-do="embedUser" href="http://www.pinterest.com/dress4club/" data-pin-scale-width="60" data-pin-scale-height="290" data-pin-board-width="188">Visit Dress4Club's profile on Pinterest.</a>
				</div>
			</div>
			</div>
		</div>
		<!-- cat or dog -->
		<?php 
			if(isset($_GET['product'])){
				echo ('123');
			}else{
				get_template_part('template','cat');
			}

		 ?>		
		<!-- cat or dog -->
		<div class="clear"></div>
	
	</div>
</div>
<script type="text/javascript">
$(function(){
	$('.catalog_list_plus>li').hover(function(){
		$(this).find('.hover-box').fadeIn();
	},function(){
		// $(this).find('.hover-box').stop();
		$(this).find('.hover-box').fadeOut();
	});
});
</script>
