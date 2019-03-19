
      <div class="row_grid ">
        <div class="h-column">

          <?php if ( ! comments_open() ): ?>

            <h2><?php _e( 'Comments closed', 'tattoostudio' ); ?></h2>
            <h4><?php _e( 'You are not allowed to write your comments now!', 'tattoostudio' ); ?></h4>

          <?php else : ?>

            <h2><?php _e( 'Comments', 'tattoostudio' ); ?></h2>
            <h4><?php _e( 'Write your comments now!', 'tattoostudio' ); ?></h4>

          <div class="clearfix"></div>

            <?php wp_list_comments( 'avatar_size=145&style=div&type=comment&callback=TSComments::showComments' ); ?>

          <div class="clearfix"></div>

          <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <!-- pagination -->
            <div class="h-column blog-navigation">
              <?php TSComments::paginate_comments_links(); ?>
            </div>
            <!-- end of pagination -->

          <?php endif; ?>

          <div class="add-comment">
            <div class="artist-2">
              <div class="artists-l">
                <div class="featimage-2" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/new_comment.png);"></div>
              </div>

              <div class="artists-r">

              <?php if ( is_user_logged_in() ) {

                $comments_args = array(
                  'id_form'              => 'tattoostudio-prefix-' . 'contact-form',
                  'id_submit'            => 'submit',
                  'label_submit'         => __('Submit', "tattoostudio" ),
                  'title_reply'          => '',
                  'title_reply_to'       => '',
                  'cancel_reply_link'    => __( 'Cancel reply', "tattoostudio"  ),
                  'comment_field'        => '<textarea class="field_form_area field_form-comment" rows="4" cols="50" name="comment" id="contact_text" placeholder="'. __( 'Write comment here', 'tattoostudio' ).'"></textarea>',
                  'comment_notes_before' => '',
                  'comment_notes_after'  => '',
                );

                echo '<div class="cat_name"><h2>'. __( 'Me', 'tattoostudio' ) .'</h2></div>';

             } else {

                echo '<div class="cat_name"><h2>'. __( 'Guest', 'tattoostudio' ) .'</h2></div>';

                $commenter = wp_get_current_commenter();
                $req = get_option( 'require_name_email' );
                $aria_req = ( $req ? " aria-required='true'" : '' );

                 $comments_args = array(
                      'id_form'              => 'tattoostudio-prefix-' . 'contact-form',
                      'id_submit'            => 'submit-hide',
                      'label_submit'         => __('Submit', "tattoostudio" ),
                      'title_reply'          => '',
                      'title_reply_to'       => '',
                      'cancel_reply_link'    => __( 'Cancel reply', "tattoostudio"  ),
                      'comment_field'        => '<textarea class="field_form_area field_form-comment" rows="4" cols="50" name="comment" id="contact_text" placeholder="'. __( 'Write comment here', 'tattoostudio' ).'"></textarea>',
                      'comment_notes_before' => '',
                      'comment_notes_after'  => '',
                      'fields'               => apply_filters(
                          'comment_form_default_fields',
                          array(
                            'author' => '<p><input class="field_form-comment" type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="'.__( 'Name', 'tattoostudio' ).'" ' . $aria_req . '></p>',
                            'email'  => '<p><input class="field_form-comment" type="text" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="'. __( 'E-mail', 'tattoostudio' ).'"' . $aria_req . '></p>',
                            'url' => '<p><input class="field_form-comment" type="text" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) .'" placeholder="'. __( 'Website', 'tattoostudio' ).'"' . $aria_req . '></p>',
                          )
                    ),
                );
              }
              ?>

              <div class="artist_right-2">
                <div class="artist_content-2">
                  <div class="inner_content">

                    <?php comment_form( $comments_args ); ?>

                  </div>
                </div>
              </div>
            </div>
           </div>
          </div>

        <?php endif; ?>

      </div>
    </div>
