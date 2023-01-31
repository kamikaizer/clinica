<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_medical_care_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_medical_care_slider_hide_show', false) == 1 || get_theme_mod( 'vw_medical_care_resp_slider_hide_show', false) == 1) { ?>

  <section id="slider">
    <?php if(get_theme_mod('vw_medical_care_slider_type', 'Default slider') == 'Default slider' ){ ?>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_medical_care_slider_speed',4000)) ?>">
      <?php $vw_medical_care_slider_pages = array();
        for ( $count = 1; $count <= 3; $count++ ) {
          $mod = intval( get_theme_mod( 'vw_medical_care_slider_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $vw_medical_care_slider_pages[] = $mod;
          }
        }
        if( !empty($vw_medical_care_slider_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $vw_medical_care_slider_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
      ?>     
      <div class="carousel-inner" role="listbox">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php if(has_post_thumbnail()){
              the_post_thumbnail();
            } else{?>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
            <?php } ?>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <?php if( get_theme_mod('vw_medical_care_slider_title_hide_show',true) == 1){ ?>
                  <h1 class="wow swing delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                <?php } ?>
                <?php if( get_theme_mod('vw_medical_care_slider_content_hide_show',true) == 1){ ?>
                  <p class="wow swing delay-1000" data-wow-duration="2s"><?php $vw_medical_care_excerpt = get_the_excerpt(); echo esc_html( vw_medical_care_string_limit_words( $vw_medical_care_excerpt, esc_attr(get_theme_mod('vw_medical_care_slider_excerpt_number','30')))); ?></p>
                <?php } ?>
                <?php if( get_theme_mod('vw_medical_care_slider_button_text','Read More') != ''){ ?>
                  <div class="more-btn wow swing delay-1000" data-wow-duration="2s">
                    <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_medical_care_slider_button_text',__('Read More','vw-medical-care')));?><i class="<?php echo esc_attr(get_theme_mod('vw_medical_care_slider_button_icon','fa fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_medical_care_slider_button_text',__('Read More','vw-medical-care')));?></span></a>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php $i++; endwhile; 
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
          <div class="no-postfound"></div>
      <?php endif;
      endif;?>
      <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
        <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-medical-care' );?></span>
      </a>
      <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
        <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-medical-care' );?></span>
      </a>
    </div>
    <div class="clearfix"></div>
        <?php } else if(get_theme_mod('vw_medical_care_slider_type', 'Advance slider') == 'Advance slider'){?>
          <?php echo do_shortcode(get_theme_mod('vw_medical_care_advance_slider_shortcode')); ?>
        <?php } ?>
  </section>

  <?php } ?>

  <?php do_action( 'vw_medical_care_after_slider' ); ?>

  <?php if( get_theme_mod( 'vw_medical_care_call_text') != '' || get_theme_mod( 'vw_medical_care_call') != '' || get_theme_mod( 'vw_medical_care_address_text') != '' || get_theme_mod( 'vw_medical_care_address') != '' || get_theme_mod( 'vw_medical_care_email_text') != '' || get_theme_mod( 'vw_medical_care_email_text') != '') { ?>
     <section id="contact-sec" class="wow zoomInDown delay-1000" data-wow-duration="2s"> 
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 p-0">
            <div class="info">
              <?php if( get_theme_mod( 'vw_medical_care_call_text') != '' || get_theme_mod( 'vw_medical_care_call') != '') { ?>
                <i class="<?php echo esc_attr(get_theme_mod('vw_medical_care_phone_icon','fas fa-phone')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_medical_care_call_text',''));?></span>
                <hr>
                <p><a href="tel:<?php echo esc_attr( get_theme_mod('vw_medical_care_call','') ); ?>"><?php echo esc_html(get_theme_mod('vw_medical_care_call',''));?></a></p>
              <?php }?>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 p-0 loc-box">
            <div class="location">
              <?php if( get_theme_mod( 'vw_medical_care_address_text') != '' || get_theme_mod( 'vw_medical_care_address') != '') { ?>
                <i class="<?php echo esc_attr(get_theme_mod('vw_medical_care_location_icon','fas fa-map-marker-alt')); ?>"></i><br>
                <span><?php echo esc_html(get_theme_mod('vw_medical_care_address_text',''));?></span>
                <hr>
                <p><?php echo esc_html(get_theme_mod('vw_medical_care_address',''));?></p>
              <?php }?>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 p-0">
            <div class="info">
              <?php if( get_theme_mod( 'vw_medical_care_email_text') != '' || get_theme_mod( 'vw_medical_care_email') != '') { ?>
                <i class="<?php echo esc_attr(get_theme_mod('vw_medical_care_email_address_icon','fas fa-envelope-open')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_medical_care_email_text',''));?></span>
                <hr>
                <p><a href="mailto:<?php echo esc_attr(get_theme_mod('vw_medical_care_email',''));?>"><?php echo esc_html(get_theme_mod('vw_medical_care_email',''));?></a></p>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php do_action( 'vw_medical_care_after_contact' ); ?>

   <section id="serv-section" class="wow rollIn delay-1000" data-wow-duration="2s"> 
    <div class="container">
      <div class="row m-0">
        <?php
          $vw_medical_care_catData =  get_theme_mod('vw_medical_care_facilities','');
          if($vw_medical_care_catData){
          $page_query = new WP_Query(array( 'category_name' => esc_html($vw_medical_care_catData,'vw-medical-care'))); ?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
          <div class="col-lg-4 col-md-6">
            <div class="serv-box">
              <?php the_post_thumbnail(); ?>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
              <p><?php $vw_medical_care_excerpt = get_the_excerpt(); echo esc_html( vw_medical_care_string_limit_words( $vw_medical_care_excerpt, esc_attr(get_theme_mod('vw_medical_care_facilities_excerpt_number','30')))); ?></p>
            </div>
          </div>
          <?php endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>

  <?php do_action( 'vw_medical_care_after_services' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
