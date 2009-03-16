<?php
/*
Template Name: Archives
*/

  get_header();
  query_posts("");
  ?>
    <div class="page archivos">
  <?php
  $data = "";
  while(have_posts()): the_post();
    if (get_the_time("m/Y") != $data):
?>
    <h2><?= the_time("F \d\e Y"); ?></h2>
    <?php endif; ?>
    <h4><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a>&nbsp;&nbsp;&nbsp;&nbsp; <small><?= the_time("j \d\e F \d\e Y"); ?></small></h4>
<?php
  	$data = get_the_time("m/Y");
	endwhile;
	?>
	 </div>
	<?php
  get_footer(); ?>
