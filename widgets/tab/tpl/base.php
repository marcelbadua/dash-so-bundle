<?php if( !empty( $instance['title'] ) ) echo $args['before_title'] . esc_html($instance['title']) . $args['after_title'] ?>

<?php

if ( ! empty( $instance['tab'] ) ) :
	$items = $instance['tab'];

	echo '<ul class="tabs">';
		foreach ( $items as $index => $item ) :
			printf('<li rel="%1$s">%2$s</li>',
				str_replace(' ', '-', strtolower($item['title']) ),
				$item['title']
			);
		endforeach;
	echo '</ul>'

	echo '<div class="tab_container">';
		foreach ( $items as $index => $item ) :
			printf('<div class="d_active tab_drawer_heading" rel="%1$s">%2$s</div>',
				str_replace(' ', '-', strtolower($item['title']) ),
				$item['title']
			);
			printf('<div id="%1$s" class="tab_content">%2$s</div>',
				str_replace(' ', '-', strtolower($item['title']) ),
				wpautop($item['text'])
			);
		endforeach;
	echo '</div>'
	
endif;
