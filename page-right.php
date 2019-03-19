<?php 
/*
Template Name: Sidebar Right
*/
?>

<?php get_header(); ?>

  <!-- Content -->

<div class="container" style="background-color:#e8e8e8; padding-bottom:0">
  <div class="container_inner">
    <div class="row_grid">
      <div class="h-column blog-column">
        <div class="blog-column-inner">

          <?php get_template_part('templates/page/item'); ?>
          
        </div>
      </div>

      <div class="h-column sidebar-left">

        <?php get_sidebar(); ?>

      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</div>

<?php get_footer(); ?>
