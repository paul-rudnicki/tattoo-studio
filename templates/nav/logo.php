<?php global $tattoo_options; ?>
<?php if ($tattoo_options['logo']): ?>
<a href="<?php echo get_home_url(); ?>">
  <img alt="<?php echo get_bloginfo( 'name' ); ?>" src="<?php echo esc_url($tattoo_options['logo']['url']) ?>">
</a>
<?php endif ?>