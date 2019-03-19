<div id="mySidenav" class="sidenav">

  <div class="container_inner">

    <div class="logo">
      <?php get_template_part('templates/nav/logo'); ?>
    </div>

    <div class="row_grid menu_burger rel-grid">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span class="burger_click_close" onclick="openNav()"></span></a>

      <?php if ( has_nav_menu( 'top_menu_hamburger' ) ) {
        wp_nav_menu( array(
          'theme_location' => 'top_menu_hamburger',
          'container' => '',
          'menu_class' => 'menu main',
          'walker' => new MenuTop(),
        ) ); 
      }
      ?>
    </div>
  </div>
</div>

<div class="top_menu" id="main">
  <div class="menu_left"></div>
  
  <div class="logo">
    <?php get_template_part('templates/nav/logo'); ?>
  </div>

  <div class="menu_right"><span class="burger_click" onclick="openNav()"></span></div>
</div>