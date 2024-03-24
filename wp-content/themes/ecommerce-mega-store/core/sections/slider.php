<?php if ( get_theme_mod('ecommerce_mega_store_blog_box_enable',false) ) : ?>

<?php $ecommerce_mega_store_args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('ecommerce_mega_store_blog_slide_category'),
  'posts_per_page' => get_theme_mod('ecommerce_mega_store_blog_slide_number'),
); ?>

<div class="slider">
  <div class="owl-carousel">
    <?php $ecommerce_mega_store_arr_posts = new WP_Query( $ecommerce_mega_store_args );
    if ( $ecommerce_mega_store_arr_posts->have_posts() ) :
      while ( $ecommerce_mega_store_arr_posts->have_posts() ) :
        $ecommerce_mega_store_arr_posts->the_post();
        ?>
        <div class="blog_inner_box">
         <?php
            if ( has_post_thumbnail() ) :
              the_post_thumbnail();
            else:
              ?>
              <div class="slider-alternate">
                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/banner.png'; ?>">
              </div>
              <?php
            endif;
          ?>
          <div class="blog_box pt-3 pt-md-0">
            <?php if ( get_theme_mod('ecommerce_mega_store_title_unable_disable',true) ) : ?>
              <h3 class="my-3"><?php the_title(); ?></a></h3>
            <?php endif; ?>
            <?php if ( get_theme_mod('ecommerce_mega_store_text_unable_disable',true) ) : ?>
              <p class="slider-text"><?php echo wp_trim_words( get_the_content(), get_theme_mod('ecommerce_mega_store_post_excerpt_number',22) ); ?><p>
            <?php endif; ?>
            <?php if ( get_theme_mod('ecommerce_mega_store_button_unable_disable',true) ) : ?>
              <p class="slider-button mt-4">
                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php esc_html_e('SHOP NOW','ecommerce-mega-store'); ?></a>
              </p>
            <?php endif; ?>
          </div>
        </div>
      <?php
    endwhile;
    wp_reset_postdata();
    endif; ?>
  </div>
</div>

<?php endif; ?>
