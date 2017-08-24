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


















 ?>