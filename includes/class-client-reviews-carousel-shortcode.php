<?php
/**
 * Portfolio Shortcode
 */

if ( ! class_exists( 'Client_Reviews_Carousel_Shortcode' ) ) {

	class Client_Reviews_Carousel_Shortcode {

		/**
		 * Start things up
		 */
		public function __construct() {
			add_shortcode( 'client_reviews_carousel', array( $this, 'client_reviews_carousel_shortcode' ) );
		}

		/**
		 * Build the front end
		 */
        public function carousel_display( $cat_id = null) {
            $testimonials = new WP_Query(array(
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'posts_per_page'	  => -1,
                'post_type' 		  => 'testimonial',
                'orderby'			  => 'menu_order',
                'order' 			  => 'ASC'
           ));  
            if ($testimonials->have_posts()) :
            ?>
            <script>

            // swiper.slideNext();
            </script>
            <div class="swiper-container">

                <div class="swiper-wrapper">

                    <?php 
                        while ( $testimonials->have_posts() ) : $testimonials->the_post(); 
                        $company = get_post_meta( get_the_ID(), 'client_reviews_carousel_company', true );
                    ?> 
                    <div class="testimonial swiper-slide"> 

                        <div class="card"> 
                                <div class="as-head">
                                    <?php the_content(); ?>
                                    <img class="quote1" src="<?php echo plugins_url( '/images/quote-layer-1.png', __FILE__ ) ?>" alt="quote inactive">
                                    <img class="quote2" src="<?php echo plugins_url( '/images/quote-layer-2.png', __FILE__ ) ?>" alt="quote active">
                                </div>
                                    <?php if ( has_post_thumbnail() ) : ?> 
                                        <div class="as-profile as-bg"> 
                                            <?php the_post_thumbnail(''); ?> 
                                        </div>
                                    <?php endif; ?>
                            <h6> <?php the_title(); ?> </h6>
                        </div> 

                    </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                        endif;
                    ?>

                </div>

                <!-- If we need pagination -->
                <!-- <div class="swiper-pagination"></div> -->

                <!-- If we need navigation buttons -->
                <!-- <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div> -->

                <!-- If we need scrollbar -->
                <!-- <div class="swiper-scrollbar"></div> -->

            </div>

            <?php 
        }

        /**
		 * Registers the function as a shortcode
		 */
		public function client_reviews_carousel_shortcode( $atts ) {

			// Attributes
			$atts = shortcode_atts( array(
				'cat_id' => '',
			), $atts, 'client_reviews_carousel' );

			ob_start();
			
			if ( $atts[ 'cat_id' ] ) {
				$this->carousel_display( $atts[ 'cat_id' ] );
			} else {
                $this->carousel_display();
            }
			
			return ob_get_clean();
        }
    }
}

new Client_Reviews_Carousel_Shortcode();
