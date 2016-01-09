<?php
	if(!function_exists('demosite_init')){
		function demosite_init(){
			//Title
			add_theme_support('title-tag');
			
			//Feature Image
			add_theme_support('post-thumbnails');
			
			//Main Menu
			register_nav_menu('primary-menu',__('Primary Menu','demosite'));
			
			//Small Top Menu
			register_nav_menu('small-top-menu',__('Small Top Menu','demosite'));
			
			//Sidebar
			$sidebar = array(
				'name' => __('Main Sidebar','demosite'),
				'id' => 'main-sidebar',
				'class' => 'main-sidebar',
				'description' => __('Main sidebar for Demosite theme','demosite'),
				'before-title' => '<h3 class="widget-title">',
				'after-title' => '</h3>'
			);
			register_sidebar($sidebar);
			
			$sidebar = array(
				'name' => __('Top Social Sidebar','demosite'),
				'id' => 'top-social-sidebar',
				'class' => 'top-social-sidebar',
				'description' => __('Top sidebar for social icon','demosite'),
				'before-title' => '<h3 class="widget-title">',
				'after-title' => '</h3>'
			);
			register_sidebar($sidebar);
			
			$sidebar = array(
				'name' => __('Newsletter Form','demosite'),
				'id' => 'newsletter-form',
				'class' => 'newsletter-form',
				'desciption' => 'Newsletter Form'
			);
			
			register_sidebar($sidebar);
		}
		
		add_action('init','demosite_init');
	}
	
	if(!function_exists('demosite_style')){
		function demosite_style(){
			
			wp_register_style('bootstrap',get_template_directory_uri() . '/css/bootstrap.css','all');
			wp_enqueue_style('bootstrap');
			wp_register_style('font-anwsome',get_template_directory_uri() . '/css/fonts/font-awesome/css/font-awesome.css','all');
			wp_enqueue_style('font-anwsome');		
			wp_register_style('flexslider',get_template_directory_uri() . '/vendor/flexslider/flexslider.css','screen');
			wp_enqueue_style('flexslider');
			wp_register_style('magnific-popup',get_template_directory_uri() . '/vendor/magnific-popup/magnific-popup.css','screen');
			wp_enqueue_style('magnific-popup');
			wp_register_style('theme',get_template_directory_uri() . '/css/theme.css','all');
			wp_enqueue_style('theme');
			wp_register_style('theme-elements',get_template_directory_uri() . '/css/theme-elements.css','all');
			wp_enqueue_style('theme-elements');
			wp_register_style('theme-animate',get_template_directory_uri() . '/css/theme-animate.css','all');
			wp_enqueue_style('theme-animate');
			
			wp_register_style('revolution-settings',get_template_directory_uri() . '/vendor/revolution-slider/css/settings.css','screen');
			wp_enqueue_style('revolution-settings');
			wp_register_style('revolution-captions',get_template_directory_uri() . '/vendor/revolution-slider/css/captions.css','screen');
			wp_enqueue_style('revolution-captions');
			
			wp_register_style('circle-flip',get_template_directory_uri() . '/vendor/circle-flip-slideshow/css/component.css','screen');
			wp_enqueue_style('circle-flip');
			
			wp_register_style('custom',get_template_directory_uri() . '/css/custom.css');
			wp_enqueue_style('custom');
			
			wp_register_style('blue',get_template_directory_uri() . '/css/skins/blue.css');
			wp_enqueue_style('blue');
			wp_register_style('bootstrap-responsive',get_template_directory_uri() . '/css/bootstrap-responsive.css');
			wp_enqueue_style('bootstrap-responsive');
			wp_register_style('theme-responsive',get_template_directory_uri() . '/css/theme-responsive.css');
			wp_enqueue_style('theme-responsive');
			
			
			wp_register_style('style',get_template_directory_uri() . '/style.css');
			wp_enqueue_style('style');
		}
	}
	add_action('init','demosite_style');
	
	if(!function_exists('demosite_logo')){
		function demosite_logo(){
			printf('<h1 class="logo"><a href="%1$s" title="%2$s"><img src="%3$s" alt="%4$s"></a></h1>',esc_url( home_url('/') ),get_bloginfo('description'),get_template_directory_uri() . '/img/logo.png',get_bloginfo('site-name'));
		}
	}
	
	// Custom Menu, nguyên tắc của class này là Walk qua toàn bộ các element trong menu, từ đó ta có thể custom tất cả những gì có trong menu này
	class Demosite_Walker extends Walker_Nav_Menu{
		
		// Custom <ul>
		function start_lvl(&$output, $depth){
			$indent = str_repeat("\t",$depth);
			$output .= "\n$indent<ul class=\"dropdown-menu level-" . $depth . "\">\n" ;
		}
		
		// Custom <li>
		// add main/sub classes to li's and links
		function start_el( &$output, $item, $depth, $args ) {
			// passed classes
			$args->items_wrap = '<ul id="%1$s" class="%2$s nav nav-pills nav-main">%3$s</ul>';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
			// Nếu li ở lv1 thì thêm class dropdown
			if($depth == 0){
				$class_names = str_replace('menu-item-has-children', 'dropdown', $class_names);
			}else{ // Nếu li từ lv2 trở lên thì thêm class dropdown-submenu
				$class_names = str_replace('menu-item-has-children', 'dropdown-submenu', $class_names);
			}
			
			$class_names = str_replace('current-menu-item', 'active', $class_names);

			// build html
			$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
		 
			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			
			// Nếu thẻ li cha có class dropdown và là li lv1 thì thêm menu-link main-menu-link dropdown-toggle cho thẻ a
			if(strpos($class_names, 'dropdown') && $depth == 0){
				$attributes .= ' class="menu-link main-menu-link dropdown-toggle"';
			}else{
				$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
			}
			// inserts awesome font based on menu description
			$description  = ! empty( $item->description ) ? esc_attr( $item->description ) : '';

			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%7$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				' <i class="icon-' . $description . '"></i>', // Lấy class của font từ description trong WP-Admin -> Appearance -> Menus
				$args->link_after,
				$args->after
			);
		  
			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	
	function demosite_menu($slug){
		wp_nav_menu(array(
			'theme_location' => $slug,
			'container' => 'nav',
			'menu_id' => 'mainMenu',
			'walker' => new Demosite_Walker(),
		));
	}
	
	class small_top_menu_walker extends Walker_Nav_Menu{
		function start_el( &$output, $item, $depth, $args ) {
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
			// build html
			$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
		 
			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$attributes .= ' class=""';
			// inserts awesome font based on menu description
			$description  = ! empty( $item->description ) ? esc_attr( $item->description ) : '';

			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%7$s',
				$args->before,
				$attributes,
				$args->link_before,
				'<i class="icon-' . $description . '"></i>',
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);
		  
			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	
	function demosite_small_top_menu(){
		wp_nav_menu(array(
			'theme_location' => 'small-top-menu',
			'container' => 'nav',
			'menu_class' => 'nav nav-pills nav-top',
			'walker' => new small_top_menu_walker()
		));
	}
	
	function add_first_and_last($items) {
		$items[1]->classes[] = 'first';
		$items[count($items)]->classes[] = 'last';
		return $items;
	}
	
	add_filter('wp_nav_menu_objects', 'add_first_and_last');
	
	/*
	add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
	function add_menu_parent_class( $items ) { // Dùng để custom menu ở dạng không phức tạp, loop qua các thẻ <li> trong menu
		print_r($items);
		$parents = array();
		foreach ( $items as $item ) {
			if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
				$parents[] = $item->menu_item_parent;
			}
		}
		
		foreach ( $items as $item ) {
			if ( in_array( $item->ID, $parents ) ) {
				$item->classes[] = 'dropdown'; 
				$item->title .= ' <i class="icon-angle-down"></i>';
			}
		}
		
		return $items;
	}*/
	
	
?>