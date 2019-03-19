<?php $images = get_post_meta(get_the_ID(), 'tattoo_post_type_gallery_gallery', true); ?>
<?php if ($images): ?>

  <?php if (get_post_meta(get_the_ID(), 'tattoo_post_type_gallery_type', true) == 'vertical') : ?>
    <div class="container img_gal" style="background-color:#000000;">
  <?php else: ?>
    <div class="container gal-grid" style="background-color:#000000;">
      <div class="container_inner">
  <?php endif; ?>

      <ul>
        <?php foreach ($images as $image): ?>
          <li style="background-image: url(<?php echo esc_url($image['image']); ?>); background-size:cover"><a href="<?php echo esc_url($image['image']); ?>" rel=""><span class="plus_cover"></span></a>
          </li>
        <?php endforeach ?>
      </ul>
      <div class="clearfix"></div>

  <?php if (get_post_meta(get_the_ID(), 'tattoo_post_type_gallery_type', true) == 'vertical') : ?>
    </div>
  <?php else: ?>
      </div>
    </div>
  <?php endif; ?>

<?php endif ?>