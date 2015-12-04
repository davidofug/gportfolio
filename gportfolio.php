<?php
/*
*Plugin Name: G PortFolio
*Description: G PortFolio is made for you to show case work pieces on your personal, professional, business, or any otherwebsite. Your theme must have twitter boostrap integrated because the plugin depends on it to be able, to display the items propery in rows and columns and responsive.
The items be arranged in 2 or 3 or 4 or 6 columns. Set the default number of items to display per service otherwise 12 items are displayed by defualt.
Choose to display titles on top of the portfolio items which will enable filtering based on the service, if you have many services you can choose to display some instead of all.
To display the portfolio in any sidebar(widget area) of your website. Dashboard=>Appearance=>Widgets=>G PortFolio
Choose a category for single category portfolio
Titles won't display on single category portfolio,
 * Author: David Wampamba
 * Author URI: http://gagawalagraphics.com
 * Version: 1.1
 * License: MIT
 * License URI: http://opensource.org/licenses/MIT
*/
include_once('libs/gp-type.php'); //Import custom post type craetor
include_once('libs/gp-taxonomy.php'); //Import custom taxonomy creator
include_once('cmb-wp.php'); //Import custom post type fields creator

class gportfolio extends WP_Widget {
function __construct(){
parent::__construct(
// Base ID of your widget
'g-portfolio',
// Widget name will appear in UI
__('G PortFolio', 'gagawala_graphics'), 
// Widget description
array('description'=>__( 'Showcase your work in sidebar', 'gagawala_graphics'),));
}
// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title 		= apply_filters( 'widget_title', $instance['title'] );
$describe 	= $instance['describe'];
$columns	= !empty($instance['columns'])? $instance['columns']:4;
$items		= !empty($instance['items'])?$instance['items']:12;
$titleson	= !empty($instance['titleson'])?$instance['titleson']:0;
$post_type 	= 'gportfolio';
$gptaxonomy	= 'gpservices';
// before and after widget arguments are defined by themes
// $args['before_widget'];
?>
<div class="text-center our_work"><!-- The portfolio items wrapper -->
<div class="container">
<?php if(!empty( $title )){?><div class="portfolio-heading"><h2><?php echo $title; ?> <hr class="lining"/></h2></div>
<?php } if(!empty($describe)){ ?> <p class="text-mutted"><?php echo $describe; ?></p>
<?php }

if($titleson==1){?>
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#all">ALL</a></li>
<?php $titleterms = get_terms($gptaxonomy); foreach($titleterms as $titleterm):?>
<li><a data-toggle="tab" href="#<?php echo $titleterm->slug; ?>" > <?php echo $titleterm->name;?> </a></li>
<?php endforeach; ?>
</ul>
<?php } ?>
</div>
<?php
include_once('libs/gp-frontend.php'); //Import front end of the widget
?>
</div><!-- Close the portfolio wrapper -->
<?php
}
//End Widget frontend 		
//Start Widget Backend 
public function form( $instance ) {
$title = isset( $instance[ 'title' ] ) ?$instance[ 'title' ]: __( 'New title', 'gagawala_graphics' );
$describe = isset( $instance[ 'describe' ] )?$instance[ 'describe' ]:$describe = __( 'See our recent work', 'gagawala_graphics' );
$items = isset($instance['items'] )?$instance['items']:12;
// Widget admin form starts here
include_once('libs/gp-backend.php');//Include the backend form of the widget
}	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = !empty( $new_instance['title'])?strip_tags($new_instance['title']) :$old_instance['title'];
$instance['describe'] =!empty( $new_instance['describe'])?strip_tags($new_instance['describe']) : $old_instance['describe'];
$instance['items'] = !empty($new_instance['items'])?strip_tags($new_instance['items']):$old_instance['items'];
$instance['titleson'] = !empty($new_instance['titleson'])?strip_tags($new_instance['titleson']):$old_instance['titleson'];
$instance['columns'] = !empty($new_instance['columns'])?strip_tags($new_instance['columns']):$old_instance['columns'];
return $instance;
}
} // Class responsive_portfolio_rp ends here
// Register and load the widget
function load_gp() {
	register_widget( 'gportfolio' );
}
add_action( 'widgets_init', 'load_gp' );