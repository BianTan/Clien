<?php get_header(); ?>
		<div class="wid">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="article">
				<div class="a-h">
					<a href="<?php the_permalink() ?>"><div class="a-t" style="background-image: url(<?php echo catch_that_image(); ?>);"></div></a>
					<div class="a-title"><a href="<?php the_permalink() ?>"><?php the_title_attribute(); ?></a></div>
				</div>
				<div class="a-b">
					<span><i class="fa fa-calendar-o" aria-hidden="true"></i><?php the_time('Y-m-d') ?></span>
					<span><i class="fa fa-user-o" aria-hidden="true"></i><?php the_author_nickname(); ?></span>
					<span><i class="fa fa-folder-o" aria-hidden="true"></i><?php the_category(', ') ?></span>
					<span><i class="fa fa-comment-o" aria-hidden="true"></i><?php comments_number('评论：0', '评论：1', '评论：%' );?></span>
				</div>
				<div class="a-c">
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 260,"…");?>
					<a href="<?php the_permalink() ?>">阅读全文</a>
					<div class="clear"></div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php else : ?>
			<?php endif; ?>
			<div class="page_navi"><?php par_pagenavi(9); ?></div>
		</div>
	</div>
<?php get_footer(); ?>