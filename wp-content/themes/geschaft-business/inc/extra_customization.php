<?php 

	$geschaft_business_sticky_header = get_theme_mod('geschaft_business_sticky_header');

	$geschaft_business_custom_style= "";

	if($geschaft_business_sticky_header != true){

		$geschaft_business_custom_style .='.wrap_figure.fixed{';

			$geschaft_business_custom_style .='position: static;';
			
		$geschaft_business_custom_style .='}';
	}


	/*---------------------------Scroll-top-position -------------------*/
	
	$geschaft_business_scroll_options = get_theme_mod( 'geschaft_business_scroll_options','right_align');

    if($geschaft_business_scroll_options == 'right_align'){

		$geschaft_business_custom_style .='.scroll-top button{';

			$geschaft_business_custom_style .='';

		$geschaft_business_custom_style .='}';

	}else if($geschaft_business_scroll_options == 'center_align'){

		$geschaft_business_custom_style .='.scroll-top button{';

			$geschaft_business_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

		$geschaft_business_custom_style .='}';

	}else if($geschaft_business_scroll_options == 'left_align'){

		$geschaft_business_custom_style .='.scroll-top button{';

			$geschaft_business_custom_style .='right: auto; left:5%; margin: 0 auto';

		$geschaft_business_custom_style .='}';
	}
