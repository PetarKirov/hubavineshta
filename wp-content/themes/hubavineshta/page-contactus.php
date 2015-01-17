<?php
	/* Template name: Contact us */
?>

<?php get_header(); ?>
			<div id="site-main">
				<?php get_sidebar(); ?>
				<div id="content-wrapper">

					
				<div class="content">
					<?php if (have_posts()) : while (have_posts()) : the_post();?>
					<div class="post">
					<h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2>
					<div class="entrytext">
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
					</div>
					</div>
					<?php endwhile; endif; ?>
					<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
				</div>
					
				</div>
			</div>
<?php get_footer(); ?>
			