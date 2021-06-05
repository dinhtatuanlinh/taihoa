<?php
/**
 * Loop Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}
$average = $product->get_average_rating();
?>
<div class="star-rate">
<?php
	for($i = 0; $i < floor($average); $i++){
		?>
		<i class="fa fa-star" aria-hidden="true"></i>
		<?php
		
	}
	if($average - floor($average) !== 0){
		?>
		<i class="fa fa-star-half-o" aria-hidden="true"></i>
		<?php
	}
	if(5 - ceil($average) !== 0){
		for($i = 0; $i < (5 - ceil($average)); $i++){ 
			?>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			<?php
		}
	}
?>
</div>
<?php

//echo wc_get_rating_html( $product->get_average_rating() ); // WordPress.XSS.EscapeOutput.OutputNotEscaped.
?>