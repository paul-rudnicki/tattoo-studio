<?php get_header(); ?>

<?php if(have_posts()): the_post(); ?>

 <?php get_template_part('templates/post-types/grid'); ?>

<?php endif; ?>

<?php get_footer(); ?>