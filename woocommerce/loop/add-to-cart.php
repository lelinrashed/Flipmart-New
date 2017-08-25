<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '
		<div class="cart clearfix animate-effect">
		  <div class="action">
			<ul class="list-unstyled">
			  <li class="add-cart-button btn-group">
				<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>
			  </li>	  
			</ul>
		  </div>
		</div>
	',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->get_id() ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'button' ),
		esc_html( $product->add_to_cart_text() )
	),
$product );
