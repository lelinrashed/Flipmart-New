<?php 

		
	// for support title
	add_theme_support( 'title-tag' );


	function flipmart_enqueue_scripts(){
		wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css',array(),'3.2.0','all');
		wp_enqueue_style('main', get_template_directory_uri().'/assets/css/main.css',array(),'1.0','all');
		wp_enqueue_style('blue', get_template_directory_uri().'/assets/css/blue.css',array(),'1.0','all');
		wp_enqueue_style('owl.carousel', get_template_directory_uri().'/assets/css/owl.carousel.css',array(),'1.3.3','all');
		wp_enqueue_style('owl.transitions', get_template_directory_uri().'/assets/css/owl.transitions.css',array(),'1.3.2','all');
		wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/animate.min.css',array(),'1.0','all');
		wp_enqueue_style('rateit', get_template_directory_uri().'/assets/css/rateit.css',array(),'1.0','all');
		wp_enqueue_style('bootstrap-select', get_template_directory_uri().'/bootstrap-select.min.css',array(),'1.6.2','all');
		wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/css/font-awesome.css',array(),'4.6.2','all');
		wp_enqueue_style( 'flipmart', get_stylesheet_uri() );


		wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), '3.2.0', true);
		wp_enqueue_script('bootstrap-hover-dropdown', get_template_directory_uri().'/assets/js/bootstrap-hover-dropdown.min.js', array('jquery'), '2.0.11', true);
		wp_enqueue_script('owl.carousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script('echo', get_template_directory_uri().'/assets/js/echo.min.js', array('jquery'), '1.6.0', true);
		wp_enqueue_script('easing', get_template_directory_uri().'/assets/js/jquery.easing-1.3.min.js', array('jquery'), '1.3', true);
		wp_enqueue_script('bootstrap-slider', get_template_directory_uri().'/assets/js/bootstrap-slider.min.js', array('jquery'), '4.0.5', true);
		wp_enqueue_script('rateit', get_template_directory_uri().'/assets/js/jquery.rateit.min.js', array('jquery'), '1.0.21', true);
		wp_enqueue_script('lightbox', get_template_directory_uri().'/assets/js/lightbox.min.js', array('jquery'), '2.7.1', true);
		wp_enqueue_script('bootstrap-select', get_template_directory_uri().'/assets/js/bootstrap-select.min.js', array('jquery'), '1.6.2', true);
		wp_enqueue_script('wow', get_template_directory_uri().'/assets/js/wow.min.js', array('jquery'), '0.1.12', true);
		wp_enqueue_script('scripts', get_template_directory_uri().'/assets/js/scripts.js', array('jquery'), '0.1.12', true);

	}
	add_action('wp_enqueue_scripts', 'flipmart_enqueue_scripts');

	
	// For support woocommerce theme
	add_action( 'after_setup_theme', 'woocommerce_support' );
	function woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}

	// Change number or products per row to 3
	add_filter('loop_shop_columns', 'loop_columns');
	if (!function_exists('loop_columns')) {
		function loop_columns() {
			return 3; // 3 products per row
		}
	}


	// change add  to cart button text	
	add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text' );

	function custom_woocommerce_product_add_to_cart_text() {
		global $product;
		
		$product_type = $product->get_type();
		
		switch ( $product_type ) {
			case 'external':
				return __( 'Buy product', 'woocommerce' );
			break;
			case 'grouped':
				return __( 'View products', 'woocommerce' );
			break;
			case 'simple':
				return __( 'Add cart', 'woocommerce' );
			break;
			case 'variable':
				return __( 'My Select options', 'woocommerce' );
			break;
			default:
				return __( 'Read more', 'woocommerce' );
		}
		
	}
	
	
	// change breadcrumb function
	add_filter( 'woocommerce_breadcrumb_defaults', 'flipmart_woocommerce_breadcrumbs' );
	function flipmart_woocommerce_breadcrumbs() {
		return array(
				'delimiter'   => ' &#47; ',
				'wrap_before' => '<div class="breadcrumb-inner"><ul class="list-inline list-unstyled">',
				'wrap_after'  => '</ul></div>',
				'before'      => '',
				'after'       => '',
				'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
			);
	}
	
	
	// remove woocommerce default breadcrumb
	add_action( 'init', 'flipmart_remove_wc_breadcrumbs' );
	function flipmart_remove_wc_breadcrumbs() {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
	
	// remove woocommerce result count
	add_action( 'init', 'flipmart_woocommerce_result_count' );
	function flipmart_woocommerce_result_count() {
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
	}
	
	// remove woocommerce catalog ordering
	add_action( 'init', 'flipmart_woocommerce_catalog_ordering' );
	function flipmart_woocommerce_catalog_ordering() {
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0 );
	}
	// remove woocommerce default bottom pagination
	add_action( 'init', 'flipmart_woocommerce_pagination' );
	function flipmart_woocommerce_pagination() {
		remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10, 0 );
	}



	function flipmart_pagination() {

	global $wp_query;

	$big = 999999999; // need an unlikely integer

	$pages = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'type'  => 'array',
			'prev_next'          => true,
			'prev_text'          => __('<i class="fa fa-angle-left" aria-hidden="true"></i>'),
			'next_text'          => __('<i class="fa fa-angle-right" aria-hidden="true"></i>'),
		) );
		if( is_array( $pages ) ) {
			$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
			echo '<div class="pagination-container"><ul class="list-inline list-unstyled">';
			foreach ( $pages as $page ) {
					echo "<li>$page</li>";
			}
		    echo '</ul></div>';
			}
	}


	// woocommerce shop page show per page drop down
	function flipmart_woocommerce_catalog_page_ordering() {
	?>

	<?php echo '<span class="itemsorder">Show' ?>
	<form class="show_product" action="" method="POST" name="results">
	<select name="woocommerce-sort-by-columns" id="woocommerce-sort-by-columns" class="sortby" onchange="this.form.submit()">
	<?php

			//  This is where you can change the amounts per page that the user will use  feel free to change the numbers and text as you want, in my case we had 4 products per row so I chose to have multiples of four for the user to select.

	$shopCatalog_orderby = apply_filters('woocommerce_sortby_page', array(
					''       => __('20', 'woocommerce'),
					'10'    => __('10', 'woocommerce'),
					'20'    => __('20', 'woocommerce'),
					'30'    => __('30', 'woocommerce'),
					'40'    => __('40', 'woocommerce'),
					'50'    => __('50', 'woocommerce'),
					'-1'    => __('All', 'woocommerce'),
				));

				foreach ( $shopCatalog_orderby as $sort_id => $sort_name )
					echo '<option value="' . $sort_id . '" ' . selected( $_SESSION['sortby'], $sort_id, false ) . ' >' . $sort_name . '</option>';
			?>
	</select>

	</form>
	<?php
		echo '</span>';
	} 

	// now we set our cookie if we need to
	function dl_sort_by_page($count) {
	  if (isset($_COOKIE['shop_pageResults'])) { // if normal page load with cookie
		 $count = $_COOKIE['shop_pageResults'];
	  }
	  if (isset($_POST['woocommerce-sort-by-columns'])) { //if form submitted
		setcookie('shop_pageResults', $_POST['woocommerce-sort-by-columns'], time()+1209600, '/', 'beadsnwire.lukeseall.co.uk/', false); //this will fail if any part of page has been output- hope this works!
		$count = $_POST['woocommerce-sort-by-columns'];
	  }
	  // else normal page load and no cookie
	  return $count;
	}

	add_filter('loop_shop_per_page','dl_sort_by_page');


	//for custom sorting option in shop page
	add_filter( 'woocommerce_catalog_orderby', 'flipmart_woocommerce_catalog_orderby' );

	function flipmart_woocommerce_catalog_orderby( $sortby ) {
		$sortby['menu_order'] = 'Position';
		$sortby['price'] = 'Price:Lowest first';
		$sortby['price-deac'] = 'Price:Heighest first';
		unset($sortby['popularity']);
		unset($sortby['date']);
		unset($sortby['rating']);
		return $sortby;
	}
	
	

 ?>