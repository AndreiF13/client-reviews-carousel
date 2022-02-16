<?php
/**
* Define MetaBoxes for testimonial custom post type
*
*/

function client_reviews_carousel_metabox() {
    new client_reviews_carousel_MetaBox();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'client_reviews_carousel_metabox' );
    add_action( 'load-post-new.php', 'client_reviews_carousel_metabox' );
}

class client_reviews_carousel_MetaBox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box() {
		add_meta_box(
			'st_page_metabox'
			,__( 'Company / Position in Company', 'client-reviews-carousel' )
			,array( $this, 'render_meta_box_content' )
			,'testimonial'
			,'side'
			,'low'
		);
	}
	public function save( $post_id ) {

		if ( ! isset( $_POST['client_reviews_carousel_company_nonce'] ) )
			return $post_id;

		$nonce = $_POST['client_reviews_carousel_company_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'client_reviews_carousel_company' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$company = isset( $_POST['client_reviews_carousel_company'] ) ? sanitize_textarea_field( wp_kses_post( $_POST['client_reviews_carousel_company'] ) ) : false;
		update_post_meta( $post_id, 'client_reviews_carousel_company', $company );

	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'client_reviews_carousel_company', 'client_reviews_carousel_company_nonce' );
		$company = get_post_meta( $post->ID, 'client_reviews_carousel_company', true );
	?>
		<p>
			<textarea class="widefat" id="client_reviews_carousel_company" name="client_reviews_carousel_company" placeholder="<?php esc_attr_e( 'Company / Position in Company', 'client-reviews-carousel' ); ?>"><?php echo esc_html($company); ?></textarea>
		</p>

	<?php
	}
}
