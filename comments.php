<?php // Do not delete these lines
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() )
	{
	  return;
	}

  if ( have_comments() ) : ?>

	<h3 id="comments"><?php comments_number('No hay comentarios', 'Un comentario', '% Comentarios');?></h3>
	<ol class="commentlist">
	  <?php wp_list_comments(array('avatar_size' => 64));?>
	</ol>
  <?php else : // this is displayed if there are no comments so far ?>

    <?php if ('open' == $post->comment_status) : // Comments open, but no comments ?>

    <?php else : // comments are closed ?>

  		<p class="nocomments">Comentarios desactivados en esta entrada</p>

  	<?php endif; // if comments open? ?>
<?php endif; // if have_comments ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond" class="<?php echo ((have_comments()) ? "respond-amb-comments" : "respond-sense-comments") ?>">

<h3><?php comment_form_title( 'Deja un comentario', 'Deja un comentario en %s' ); ?></h3>

<div id="cancel-comment-reply"> 
	<small><?php cancel_comment_reply_link() ?></small>
</div> 

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf('Tienes que estar <a href="%s">identificado</a> para comentar.', get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink())); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php printf('Usuario: <a href="%1$s">%2$s</a>.', get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <small>(<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Desconectar">Desconectar</a>)</small></p>

<?php else : ?>

<p><label for="author"><small>Nombre <span class="req">*</span></small></label><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
</p>

<p><label for="email"><small>Mail (No se publicará) <span class="req">*</span></small></label><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
</p>

<p><label for="url"><small>Web</small></label><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
</p>

<?php endif; ?>

<p><label for="comment"><small>Comentario</small></label><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea></p>
<br>
<p><input name="submit" type="submit" id="submit" tabindex="5" value="Publicar Comentario" />
<?php comment_id_fields(); ?> 
</p>
<?php do_action('comment_form', $post->ID); ?>

<br>
<p><small><?php printf('<strong>XHTML:</strong> Puedes usar las siguientes etiquetas: <code>%s</code>', allowed_tags()); ?></small></p>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
