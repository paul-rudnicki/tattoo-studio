<?php

class TSPopularPosts extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct(
			'popular-posts-widget-id', 
			__('Popular Posts - Tattoo', 'tattoostudio'),
			array(
				'classname' => 'popular-posts-widget-class',
				'description' => __( 'The most popular posts.', 'tattoostudio' )
			)
		);
	}

	function widget( $args, $instance ) {

		extract( $args );
    extract ( $instance );

    if (!empty($title)): ?>

      <h4><?php echo esc_html( $title ); ?></h4>

		<?php endif;

    $number = (int)$number == 0 ? 1 : $number;

    $args = array(
      'post_type'   => 'post',
      'post_status' => 'publish',
      'orderby'     => 'comment_count',
      'posts_per_page' => $number,
    );

    $query = new WP_Query( $args );
    
    while($query->have_posts()) : $query->the_post();
    ?>
      <div class="column-inner post-wrapper">
        <?php if( get_post_meta( get_the_ID(), 'tatto_post_video_url', true ) != '' ) : ?>

          <div class="feature-image">
            <iframe src="<?php echo get_post_meta( get_the_ID(), 'tatto_post_video_url', true ); ?>" width="100%" height="370" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
          </div>

        <?php else : ?>

          <?php ts_post_thumbnail('ts-testimonials'); ?>

        <?php endif; ?>

        <div class="post-inner">
          <h2><?php _e( 'Post', 'tattoostudio' ); ?></h2>
          <h4><?php the_title(); ?></h4>
          <p class="post_date"><?php the_date(get_option('date_format')); ?> <?php ts_get_categories(); ?></p>
          <div class="content-post">
            <?php the_excerpt(); ?>
            <a class="more_gallery" href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'tattoostudio' ); ?></a>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

    <?php
    endwhile;

    wp_reset_postdata();

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = strip_tags($new_instance['number']);

        return $instance;
	}

	function form( $instance ) {
		$defaults = array(
            'title' => '',
            'number' => 1,
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        ob_start();
        ?>

        <div class="widget-content">
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( "title" ));  ?>"><?php _e( 'Title', "tattoostudio" ); ?>:</label>
                <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( "title" ));  ?>" name="<?php echo esc_attr($this->get_field_name( "title" ));  ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( "number" ));  ?>"><?php _e( 'Number', "tattoostudio" ); ?>:</label>
                <input style="width: 50px;" type="number" id="<?php echo esc_attr($this->get_field_id( "number" ));  ?>" name="<?php echo esc_attr($this->get_field_name( "number" ));  ?>" value="<?php echo esc_attr($instance['number']); ?>"/>
            </p>
        </div>

        <?php
        $output = ob_get_contents();
        ob_end_clean();

        echo $output;
	}
}