<?php global $tattoo_options; ?>
<?php if (isset($tattoo_options)): ?>
  <div class="logo_mobile">
    <?php get_template_part('templates/nav/logo'); ?>
  </div>
<?php endif ?>

<span class="burger_click_mobile" onclick="openNav2()"></span>

<div id="mySidenav2" class="sidenav_mobile">
  <div class="row_grid menu_burger_mobile rel-grid">

    <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()"><span class="burger_click_close" onclick="openNav2()"></span></a>

    <?php if ( has_nav_menu( 'mobile_menu' ) ) {
      wp_nav_menu( array(
        'theme_location' => 'mobile_menu',
        'container' => '',
        'menu_class' => 'menu main'
      ) ); 
    }
    ?>
    
  </div>
</div>