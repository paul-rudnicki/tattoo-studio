<?php get_header(); ?>

<?php if (have_posts()): the_post(); ?>

	<div class="container">
    <div class="container_inner">

		  <?php the_content(); ?>

	  </div>
	  <div class="clearfix"></div>
  </div>
  
<?php endif ?>

<?php get_footer(); ?>