<?php
   global $post;
?>

<div class="col-lg-6 col-md-6 col-sm-6">
  <div id="post-<?php the_ID(); ?>" <?php post_class('post-box mb-4 p-3'); ?>>
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the gallery.
        if ( get_post_gallery() ) {
          echo '<div class="entry-gallery">';
            echo ( get_post_gallery() );
          echo '</div>';
        };
      };
    ?>
    <?php if ( get_theme_mod('ecommerce_mega_store_blog_admin_enable',true) || get_theme_mod('ecommerce_mega_store_blog_comment_enable',true) ) : ?>
      <div class="post-meta my-3">
        <?php if ( get_theme_mod('ecommerce_mega_store_blog_admin_enable',true) ) : ?>
          <i class="far fa-user mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a>
        <?php endif; ?>
        <?php if ( get_theme_mod('ecommerce_mega_store_blog_comment_enable',true) ) : ?>
          <span class="ml-3"><i class="far fa-comments mr-2"></i> <?php comments_number( esc_attr('0', 'ecommerce-mega-store'), esc_attr('0', 'ecommerce-mega-store'), esc_attr('%', 'ecommerce-mega-store') ); ?> <?php esc_html_e('comments','ecommerce-mega-store'); ?></span>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <h3 class="post-title mb-3 mt-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <div class="post-content">
      <?php echo wp_trim_words( get_the_content(), get_theme_mod('ecommerce_mega_store_post_excerpt_number',15) ); ?>
    </div>
  </div>
</div>