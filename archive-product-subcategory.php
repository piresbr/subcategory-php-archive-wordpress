<?php

    $term = get_queried_object();

	$terms = get_terms( $term->taxonomy, array(
	'taxonomy' => 'product_cat',
	'parent'    => $term->term_id,
	'hide_empty' => false,
	) );


	foreach ($terms as $key => $value) {

			$metaterms = get_term_meta($value->term_id);
			$thumbnail_id = get_woocommerce_term_meta($value->term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );
			if(!empty($image)){
				echo '<div class="list-item">';
				echo '<a href="' . esc_url(get_term_link($value, $value->taxonomy)) . '"><img class="img-cat" src="'.$image.'"/></a>';
				echo '<li class="cat-item"><a href="' . esc_url(get_term_link($value, $value->taxonomy)) . '"><span class="name-cat">' . $value->name . '</span></a></li><br>';
				echo '</div>';
			}
			else{
				echo '<div class="list-item">';
				echo '<a class="cat-item" href="' . esc_url(get_term_link($value, $value->taxonomy)) . '"><img class="img-cat" src="/wp-content/uploads/woocommerce-placeholder.png"/></a>';
				echo '<li class="cat-item"><a href="' . esc_url(get_term_link($value, $value->taxonomy)) . '"><span class="name-cat">' . $value->name . '</span></a></li><br>';
				echo '</div>';
			}
	}


?>


