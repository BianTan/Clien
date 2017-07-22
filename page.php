<?php get_header(); ?>
	<div class="main">
		<div class="wid">
			<div class="wrap">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="article">
					<div class="a-h">
						<div class="a-title" style="font-size: 24px;text-align: center;"><?php the_title_attribute(); ?></div>
					</div>
					<div class="a-b" style="text-align: center;margin-bottom: 16px;">
						<span><i class="fa fa-calendar-o" aria-hidden="true"></i><?php the_time('Y-m-d') ?></span>
					<span><i class="fa fa-user-o" aria-hidden="true"></i><?php the_author_nickname(); ?></span>
					<span><i class="fa fa-folder-o" aria-hidden="true"></i><?php the_category(', ') ?></span>
					<span><i class="fa fa-comment-o" aria-hidden="true"></i><?php comments_number('评论：0', '评论：1', '评论：%' );?></span>
					</div>
					<div class="a-c">
						<?php the_content("Read More..."); ?>
						<div class="clear"></div>
					</div>
				</div>
				
				<?php endwhile; ?>
				<div class="acticle">
					<div class="c-r">
						<?php comments_template(); ?>
					</div>
				</div>
				<?php else : ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>