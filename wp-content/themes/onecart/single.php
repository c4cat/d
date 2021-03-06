<?php get_header(); ?>

<?php get_template_part('template','header'); ?>

<div id="blog">
	
	<div class="wrap">
		<div class="blog_title">
			<h1><?php _e('Blog','ocart'); ?></h1>
			<a href="<?php echo home_url(); ?>/" class="blog_store"><?php _e('Back to Store','ocart'); ?></a>
		</div>
		<ul class="blog_nav">
			<?php $category = get_the_category(); $category = array_reverse($category); ?>
			<li><a href="<?php echo get_permalink( get_page_by_path( 'blog' ) ); ?>"><?php _e('All','ocart'); ?></a></li>
			<?php
			$terms = get_terms( 'category', 'orderby=name&hide_empty='.$ocart['emptyterms']);
			if ($terms && ! is_wp_error( $terms )) {
				foreach($terms as $term) {
			?>
				<li<?php if ($category[0]->cat_ID == $term->term_id) echo ' class="current-cat"'; ?>><a href="<?php echo get_term_link($term->slug, 'category'); ?>"><?php echo $term->name; ?></a></li>
			<?php
				}
			}
			?>
		</ul><div class="clear"></div>
		
		<div id="blog_nav-320">
			<select onchange="window.location = jQuery(this).val();">
				<option value=""><?php _e('Blog','ocart'); ?></option>
			<?php
			$terms = get_terms( 'category', 'orderby=name&hide_empty='.$ocart['emptyterms']);
			if ($terms && ! is_wp_error( $terms )) {
				foreach($terms as $term) {
			?>
				<option value="<?php echo get_term_link($term->slug, 'category'); ?>"><?php echo $term->name; ?></option>
			<?php
				}
			}
			?>
			</select>
		</div>
		
		<div class="blog_wrap">
			<div class="blog_content">
			
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<div class="post-thumbnail"><?php ocart_thumb(654, 234); ?></div>
						
						<div class="post-pad">
						<h1><?php the_title(); ?></h1>
						
						<div class="post-meta">
							<?php $category = get_the_category(); $category = array_reverse($category); ?>
							<?php printf(__('By <span>%s</span> on %s in <a href="%s">%s</a> with','ocart'), get_the_author(), get_the_time('F j, Y'), get_category_link($category[0]->cat_ID), $category[0]->cat_name ); ?> <?php comments_popup_link( __('0 Comments','ocart'), __('1 Comment','ocart'), __('% Comments','ocart') ); ?>
						</div>
						
						<div class="post-content">
							<?php the_content(); ?>
						</div>
<br>
<div class="fb-share-button" data-href="http://dress4club.com" data-type="button"></div>
<a href="http://www.tumblr.com/share/photo?source=<?php echo urlencode(INSERT_SOURCE_HERE) ?>&caption=<?php echo urlencode(INSERT_CAPTION_HERE) ?>&clickthru=<?php echo urlencode(INSERT_CLICK_THRU_HERE) ?>" title="Share on Tumblr" style="display:inline-block; text-indent:-9999px; overflow:hidden; width:81px; height:20px; background:url('http://platform.tumblr.com/v1/share_1.png') top left no-repeat transparent;">Share on Tumblr</a>
<a href="http://www.pinterest.com/pin/create/button/?url=http://www.pinterest.com/dress4club/" data-pin-do="buttonPin">
<img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
</a>
<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</div>
						

						<?php the_tags('<div class="post-tags"><span>'.__('Tags','ocart').'</span>', '', '<div class="clear"></div></div><div class="clear"></div>'); ?>
						
					</div>
					
					<div class="fb-comments" data-href="http://dress4club.com" data-numposts="5" data-colorscheme="light" style="margin-top:20px"></div>
					
				<?php endwhile; ?>
				<?php endif; ?>

			</div>
			<?php get_sidebar(); ?>
		</div>
	
	</div>
	
</div>

<?php get_template_part('template','footer'); ?>

<?php get_footer(); ?>