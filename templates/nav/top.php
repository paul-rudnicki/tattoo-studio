
<div class="top_menu">

  <div class="menu_left">
    <?php if ( has_nav_menu( 'top_menu_Left' ) ) {
      wp_nav_menu( array(
        'theme_location' => 'top_menu_Left',
        'container' => '',
        'menu_class' => 'menu main',
        'walker' => new MenuTop(),
      ) ); 
    }
    ?>
  </div>

  <?php global $tattoo_options; ?>
  <?php if (isset($tattoo_options)): ?>
    <div class="logo">
      <?php get_template_part('templates/nav/logo'); ?>
    </div>
  <?php endif ?>

  <div class="menu_right">
    <?php if ( has_nav_menu( 'top_menu_right' ) ) {
      wp_nav_menu( array(
        'theme_location' => 'top_menu_right',
        'container' => '',
        'menu_class' => 'menu main',
        'walker' => new MenuTop(),
      ) ); 
      }
    ?>
  </div>
</div>