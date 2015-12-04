<?php
/*
* Loop through Categories and Display Posts within
*Get all the taxonomies for this post type
*$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );
*foreach( $taxonomies as $taxonomy ) :
*Gets every "category" (term) in this taxonomy to get the respective posts
*echo "Taxonomy: {$i}-{$taxonomy}<br/>";
*/
?>
    <div class="tab-content"> <!-- Open tab div -->
    <?php
	// Query to fetch work in all categories
    //This query args for the default tab
	$args = array(
    'post_type' => $post_type,
    'posts_per_page' => $items,  //Number of post to show
    );
    $posts = new WP_Query($args);
		if( $posts->have_posts() ):
    ?>
		<div id="all" class="tab-pane fadeIn pdt-images active" >
			<?php
			while( $posts->have_posts() ) :
			$posts->the_post();
				if($counter==0){
			?>
				<div class="clearfix portfolio">
						<?php } ?>
					<div class="col-xs-6 col-md-<?php echo 12/$columns; ?>">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php 
							if(has_post_thumbnail()){the_post_thumbnail('medium',array('class'=>'img-responsive')); }else{?>
							<img src="http://placehold.it/261x151" alt="Place-holder-photo" title="Place holder Image" /><?php }?>
						</a>
					</div>
				<?php
				$counter++;
				if($counter == $columns or $counter== $posts->found_posts){
					$counter=0;
				?>
				</div>
	<?php
	}
            endwhile; 
            //$counter=0;
            wp_reset_postdata(); 
	?>
	</div>
	<?php endif;
       	$terms = get_terms($gptaxonomy); //Now get all categories(terms) in a taxonomy
        foreach( $terms as $term ) :
	?><div id="<?php echo $term->slug; ?>" class="tab-pane fade pdt-images" >
	<?php
            $args = array(
            'post_type' => $post_type,
            'posts_per_page' => $items,  //Number of posts to show
			'tax_query' => array(array(
            'taxonomy' => $gptaxonomy,
            'field' => 'slug',
            'terms' => $term->slug)));
            $posts = new WP_Query($args);
            if($posts->have_posts()){
            ?>
            <?php
             while( $posts->have_posts()) : 
             	$posts->the_post();
             	if($counter==0){
			?>
				<div class="clearfix portfolio"><!-- Open the row -->
			<?php } ?>
			<div class="col-xs-6 col-md-<?php echo 12/$columns; ?>">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php 
					if(has_post_thumbnail()):the_post_thumbnail('medium',array('class'=>'img-responsive')); else:?>
					<img src="http://placehold.it/261x151" alt="Place-holder-photo" title="Place holder Image" /><?php endif;?>
				</a> 
			</div><!-- close the row -->
			<?php
			$counter++;
			if($counter == $columns or $counter== $posts->found_posts)
			{
				$counter=0;
			?>
				</div>
			<?php
			}
            endwhile; 
            //$counter=0;
            wp_reset_postdata();
           }
	?>
	</div>
	<?php
	endforeach;
	if($counter>0){//Confirm if counter stop below the number of our columns so that you may close the row
	?>
	</div>
	<?php
	}
	?>
</div> <!-- close tab div -->
</div> <!-- our_work div -->