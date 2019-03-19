<?php

if ( ! isset( $content_width ) ) $content_width = 1170;

function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );


// Extend VC
if (class_exists('WPBakeryVisualComposerAbstract')) {
  function tm_dione_requireVcExtend()
  {
    require get_template_directory().'/app/vc/vc-maps/vc-maps.php';
  }
  add_action('init', 'tm_dione_requireVcExtend', 2);
}


// Post Categories

if (!function_exists('ts_get_categories')) {
  function ts_get_categories()
  {
    $categories = get_the_category();

    foreach ($categories as $category) {
      printf(
        '<span class="cat_post"><a href="%1$s">%2$s</a></span>',
        esc_url(get_category_link($category->term_id)),
        esc_html($category->name)
      );
    }
  }
}

// Count Post Comment
if (!function_exists('ts_get_commnents_number')) {
  function ts_get_commnents_number()
  {
    $num_comments = get_comments_number();

    if ( comments_open() ) {
      if ( $num_comments == 0 ) {
        $comments = sprintf('<strong>%1$s</strong> %2$s', __('No', 'tattoostudio'), __('Comments', 'tattoostudio'));
      } elseif ( $num_comments > 1 ) {
        $comments = sprintf('<strong>%1$s</strong> %2$s', $num_comments, __('Comments', 'tattoostudio'));
      } else {
        $comments = sprintf('<strong>%1$s</strong> %2$s', __('1', 'tattoostudio'), __('Comment', 'tattoostudio'));
      }
    } else {
      $comments = sprintf('<strong>%1$s</strong> %2$s', __('Comments are off', 'tattoostudio'), __('for this post.', 'tattoostudio'));
    }
    return $comments;
  }
}

// Post Thumbnail
if (!function_exists('ts_post_thumbnail')) {
  function ts_post_thumbnail($size = 'ts-post-thumbnail')
  {
    if (has_post_thumbnail()) :
      $post_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $size );
     ?>
      <div class="feature-image">
        <a></a>
        <img alt="<?php the_title_attribute( array( 'echo' => 0 ) ); ?>" src="<?php echo esc_url( $post_image[0] ); ?>">
      </div>
    <?php 
    endif;
  }
}

if (!function_exists('ts_top_header')) {
  function ts_top_header()
  {
    global $wp_query;

    $return = array();
    $return['title'] = '';
    $return['image'] = '';
      
    // Do not display on the homepage
    if ( !is_front_page() ) {
      
      if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
         
        if (is_date()) {

          $year = isset($wp_query->query['year']) ? $wp_query->query['year'] : '';
          $month = isset($wp_query->query['monthnum']) ? '/'. $wp_query->query['monthnum'] : '';
          $day = isset($wp_query->query['day']) ? '/'. $wp_query->query['day'] : '';
          $return['title'] = $year . $month . $day;

        } else {

          $return['title'] = post_type_archive_title('', false);

        }         

      } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
         
        $custom_tax_name = get_queried_object()->name;
        $return['title'] =  $custom_tax_name;
         
      } else if ( is_single() ) {
         

        if (is_singular('tattoostudio-artists', 'tattoostudio-gallery')) {

          $return['title'] = strip_tags(get_the_title());
          $return['image'] = get_post_meta( get_the_ID(), 'tatto_custom_post_header_image', true );
          
        } else {

          $return['title'] = esc_html(get_the_title());
          $return['image'] = get_post_meta( get_the_ID(), 'tatto_post_header_image', true );
        }
                 
      } else if ( is_category() ) {
          
        $return['title'] = single_cat_title('', false);
        $return['image'] = get_term_meta( get_queried_object()->term_id, 'tattoo_archive_header_image', true );
          
      } else if ( is_page() ) {
          
        $return['title'] = get_the_title();
        $return['image'] = get_post_meta( get_the_ID(), 'tattoo_page_small_headers_image', true );

          
      } else if ( is_tag() ) {
          
        // Get tag information
        $term_id        = get_query_var('tag_id');
        $taxonomy       = 'post_tag';
        $args           = 'include=' . $term_id;
        $terms          = get_terms( $taxonomy, $args );
        $get_term_id    = $terms[0]->term_id;
        $get_term_slug  = $terms[0]->slug;
        $get_term_name  = $terms[0]->name;
          
        // Display the tag name
        $return['image'] = get_term_meta( $term_id, 'tattoo_archive_header_image', true );
        $return['title'] = $get_term_name;

      } elseif ( is_day() ) {
          
        // Day archive
          
        // Year link
        $return['title'] = get_the_time('jS') . ' ' . get_the_time('M');
          
      } else if ( is_month() ) {
          
        // Month Archive
          
        // Year link
        $return['title'] = get_the_time('M') . ' ' . __('Archives', 'tattoostudio');
          
      } else if ( is_year() ) {
          
        // Display year archive
        $return['title'] = get_the_time('Y') . ' ' . __('Archives', 'tattoostudio');
          
      } else if ( is_author() ) {
          
        // Get the author information
        global $author;
        $userdata = get_userdata( $author );
          
        $return['title'] =  __('Author: ', 'tattoostudio') . $userdata->display_name;
        
      } else if ( get_query_var('paged') ) {
          
        // Paginated archives
        $return['title'] = __('Page', 'tattoostudio') . ' ' . get_query_var('paged');
          
      } else if ( is_search() ) {
        
        $return['title'] = __('Search results for: ', 'tattoostudio') . get_search_query();
        
      } elseif ( is_404() ) {
          
        $return['title'] = __('Error 404', 'tattoostudio');

      }
    }

    if ($return['image'] == '') {

      $return['image'] = get_template_directory_uri() . '/img/1920x475.png';

      global $tattoo_options;
      if (isset($tattoo_options)) {
        if ($tattoo_options['default_background']) {
          $return['image'] = $tattoo_options['default_background']['url'];    
        }
      }
    }
    return $return;
  }
}

if (!function_exists('ts_esc_html')) {
  function ts_esc_html($value)
  {
    $args = array(
      'br' => array(),
      'span' => array(),
      'a' => array(
        'href' => array(),
        'title' => array(),
      ),
      'p' => array(),
      'h1' => array(),
      'h2' => array(),
      'h3' => array(),
      'h4' => array(),
      'h5' => array(),
      'h6' => array(),
      'strong' => array(),
    );
    return wp_kses($value, $args);
  }
}

if (!function_exists('ts_instagram')) {
  function ts_instagram($url)
  {
    
    $ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => 2
    ));

   $feed_data = curl_exec($ch);
   curl_close($ch);
   
   return $feed_data;
  }
}

add_action('template_redirect', 'tattto_settings');

function tattto_settings()
{
  global $tattoo_options;
  global $settings;
  if (isset($tattoo_options['twitter-token'])
    || isset($tattoo_options['twitter-token-secret'])
    || isset($tattoo_options['twitter-api-key'])
    || isset($tattoo_options['twitter-api-secret'])) {
    
    $settings = array(
      'oauth_access_token' => $tattoo_options['twitter-token'],
      'oauth_access_token_secret' => $tattoo_options['twitter-token-secret'],
      'consumer_key' => $tattoo_options['twitter-api-key'],
      'consumer_secret' => $tattoo_options['twitter-api-secret']
    );
  }
}


if (!function_exists('ts_paginate_links')) {
 
  function ts_paginate_links()
  {
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    return paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'current' => max( 1, get_query_var('paged') ),
      'total' => $wp_query->max_num_pages,
      'type' => 'plain',
      'prev_text' => '<img class="prev" src="' . get_template_directory_uri() . '/img/arr_l_v2.png">',
      'next_text' => '<img class="next" src="' . get_template_directory_uri() .'/img/arr_r_v2.png">',
    ) );
  }
}

if (!function_exists('ts_the_excerpt')) {

  function ts_the_excerpt($charlength = 230) 
  {
    echo ts_cut_text(get_the_excerpt(), $charlength);
  }

}

if (!function_exists('ts_cut_text')) {

  function ts_cut_text($text, $maxLength){
      
      $maxLength++;

      $return = '';
      if (mb_strlen($text) > $maxLength) {
          $subex = mb_substr($text, 0, $maxLength - 5);
          $exwords = explode(' ', $subex);
          $excut = - ( mb_strlen($exwords[count($exwords) - 1]) );
          if ($excut < 0) {
              $return = mb_substr($subex, 0, $excut);
          } else {
              $return = $subex;
          }
          $return .= '...';
      } else {
          $return = $text;
      }
      
      return $return;
  }
}