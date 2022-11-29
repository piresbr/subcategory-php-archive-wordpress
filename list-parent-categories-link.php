<?php

    $term = get_queried_object();

	$terms = get_terms( array(
	'taxonomy' => 'product_cat',
	'parent'    => "0",
	'hide_empty' => false,
	) );


	foreach ($terms as $key => $value) {

			$metaterms = get_term_meta($value->term_id);

				echo '<div class="list-item">';
				echo '<li class="cat-item"><a href="' . esc_url(get_term_link($value, $value->taxonomy)) . '"><span class="name-cat">' . $value->name . '</span></a></li><br>';
				echo '</div>';

	}


?>


