<?php if( !empty( $instance['title'] ) ) echo $args['before_title'] . esc_html($instance['title']) . $args['after_title'] ?>
<?php
if ( ! empty( $instance['a_repeater'] ) ) :
	$items = $instance['a_repeater'];
	$counter = 1;
	echo '<div class="accordion"><div class="accordion-section">';
	foreach ( $items as $index => $item ) :
		if ($item['repeat_title']):
			printf( '<div data-target="#accordion-%1$s" class="accordion-section-title"><span>%2$s</span></div>',
					$counter,
					$item['repeat_title']
			);
		endif;
		if ($item['repeat_text']):
			printf( '<div id="accordion-%1$s" class="accordion-section-content">%2$s</div>',
					$counter,
					wpautop($item['repeat_text'])
			);
		endif;
		$counter++;
	 endforeach;
	echo '</div></div>';
endif; ?>
