<?php get_header();?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php if (have_posts()) : ?>
				<ul class="list-unstyled articles-grid articles-theme">
					<?php while (have_posts()) : the_post(); ?>
					<li class="orbit-article">
						<?php get_template_part( "partials/content", "orbit" );?>
					</li>
					<?php endwhile;?>
				</ul>
				<div class="post-nav">
					<span class="pull-left"><?php previous_posts_link( "&laquo; Previous" ); ?></span>
					<span class="pull-right"><?php next_posts_link( "Next &raquo;" ); ?></span>
				</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
<?php get_footer();?>
