
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf('Enlace permamente a %s', the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
				<small><?php the_time('j \d\e F \d\e Y') ?></small> <?php comments_popup_link('0 comentarios', 'Un comentario','% comentarios', 'linkcomentarios', '' ); ?>

				<div class="entry">
					<?php the_content(); ?>
				</div>
			</div>
			
			<?php if (is_single()): ?>
			 <?php comments_template(); ?>
			<?php endif ?>

		<?php endwhile; ?>

	<?php else : ?>

		<h2 class="error">ERROR: No se ha encontrado ninguna entrada.</h2>

	<?php endif; ?>

<?php get_footer(); ?>
