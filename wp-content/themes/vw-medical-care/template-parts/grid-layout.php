<?php
/**
 * The template part for displaying grid post
 *
 * @package VW Medical Care
 * @subpackage vw-medical-care
 * @since VW Medical Care 1.0
 */
?>

<div class="col-lg-4 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box wow bounceInDown delay-1000" data-wow-duration="2s">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail() && get_theme_mod( 'vw_medical_care_featured_image_hide_show',true) == 1) { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
	        <?php if( get_theme_mod( 'vw_medical_care_grid_postdate',true) == 1 || get_theme_mod( 'vw_medical_care_grid_author',true) == 1 || get_theme_mod( 'vw_medical_care_grid_comments',true) == 1 ) { ?>
	            <div class="post-info">
	                <?php if(get_theme_mod('vw_medical_care_grid_postdate',true)==1){ ?>
	                    <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $vw_medical_care_archive_year, $vw_medical_care_archive_month, $vw_medical_care_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
	                <?php } ?>

	                <?php if(get_theme_mod('vw_medical_care_grid_author',true)==1){ ?>
	                    <span><?php echo esc_html(get_theme_mod('vw_medical_care_single_post_meta_field_separator', '|'));?></span> <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
	                <?php } ?>

	                <?php if(get_theme_mod('vw_medical_care_grid_comments',true)==1){ ?>
	                    <span><?php echo esc_html(get_theme_mod('vw_medical_care_single_post_meta_field_separator', '|'));?></span> <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-medical-care'), __('0 Comments', 'vw-medical-care'), __('% Comments', 'vw-medical-care') ); ?> </span>
	                <?php } ?>
	            </div>
	        <?php } ?>
	        <div class="new-text">
	        	<div class="entry-content">
	        		<p>
			          <?php $vw_medical_care_excerpt = get_the_excerpt(); echo esc_html( vw_medical_care_string_limit_words( $vw_medical_care_excerpt, esc_attr(get_theme_mod('vw_medical_care_related_posts_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('vw_medical_care_excerpt_suffix','') ); ?>
			        </p>
	        	</div>
	        </div>
	        <?php if( get_theme_mod('vw_medical_care_button_text','Read More') != ''){ ?>
		        <div class="content-bttn">
		          <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_medical_care_button_text',__('Read More','vw-medical-care')));?><i class="<?php echo esc_attr(get_theme_mod('vw_medical_care_blog_button_icon','fa fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_medical_care_button_text',__('Read More','vw-medical-care')));?></span></a>
		        </div>
		    <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>