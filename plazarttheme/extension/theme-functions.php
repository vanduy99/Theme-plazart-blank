<?php
  // enable and register custom sidebar
  if (function_exists('register_sidebar')) {
    // default sidebar array
    $plazarttheme_sidebar_attr = array(
      'name'          => '',
      'id'            => '',
      'description'   => '',
      'before_widget' => '<aside id="%1$s" class="%2$s widget">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3 class="module-title title-widget"><span>',
      'after_title'   => '</span></h3>'
    );

    $plazarttheme_id = 0;
    $plazarttheme_sidebars = array(
                        "Sidebar left"  => "Display sidebar on all page",
                        "Footer 1"      => "Display footer 1",
                        "Footer 2"      => "Display footer 2",
                        "Footer 3"      => "Display footer 3",
                        "Footer 4"      => "Display footer 4"
                     );
      foreach ($plazarttheme_sidebars as $plazarttheme_key=>$plazarttheme_value) {
          $plazarttheme_sidebar_attr['name'] = $plazarttheme_key;
          $plazarttheme_sidebar_attr['description']=$plazarttheme_value;
          $plazarttheme_sidebar_attr['id'] = 'plazarttheme-sidebar-' . $plazarttheme_id++;
          register_sidebar($plazarttheme_sidebar_attr);
      }


  }

    /**
     * plazarttheme setup.
     *
     * Set up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support post thumbnails.
     *
     */
    //Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Add RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menu('primary','Primary Menu');

    // add theme support title-tag
    add_theme_support( 'title-tag' );

    if ( ! function_exists( 'plazarttheme_comment' ) ) :
        function plazarttheme_comment( $comment, $args, $depth ) {
            $GLOBALS['comment'] = $comment;
            switch ( $comment->comment_type ) :
                case 'pingback' :
                case 'trackback' :
                    // Display trackbacks differently than normal comments.
                    ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
              <p><?php esc_html_e( 'Pingback:','plazarttheme' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'plazarttheme' ), '<span class="edit-link">', '</span>' ); ?></p>
                    <?php
                    break;
                default :
                    // Proceed with normal comments.
                    global $post;
                    ?>
                    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                        <article id="comment-<?php comment_ID(); ?>" class="comment-body">
                            <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.','plazarttheme' ); ?></p>
                            <?php endif; ?>
                            <div class="comment-author">
                                <?php echo get_avatar( $comment, 59 ); ?>
                            </div>
                            <div class="comment-content">
                                <?php
                                printf( '<cite class="fn">%1$s %2$s</cite>',
                                    get_comment_author_link(),
                                    // If current post author is also comment author, make it known visually.
                                    ( $comment->user_id === $post->post_author ) ? '<span> ' . esc_html__( '- Post Author ', 'plazarttheme' ) . '</span>' : ''
                                );
                                ?>
                                    <span class="comment-metadata">
                                        <?php
                                            printf( '<a class="comments-datetime" href="%1$s">&nbsp;&nbsp;&nbsp;<time datetime="%2$s">%3$s</time></a>',
                                                esc_url( get_comment_link( $comment->comment_ID ) ),
                                                get_comment_time( 'c' ),
                                                /* translators: 1: date, 2: time */
                                                sprintf( esc_html__( '%1$s', 'plazarttheme' ), get_comment_date('d M, Y') )
                                            );
                                        ?>
                                        <?php
                                        edit_comment_link( esc_html__( 'Edit ', 'plazarttheme' ) );
                                        comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'plazarttheme' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
                                        ?>
                                    </span>
                                <?php comment_text(); ?>
                            </div><!--comment-content -->

                        </article><!-- #comment-## -->
                    <?php
                    break;
            endswitch; // end comment_type check
        }
    endif;
?>