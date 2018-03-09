<?php if( !empty( $instance['title'] ) ) echo $args['before_title'] . esc_html($instance['title']) . $args['after_title'] ?>
<?php

$str = 'abcdef';
$shuffled = str_shuffle($str);

if ( ! empty( $instance['accordion'] ) ) :
	$items = $instance['accordion'];
	$counter = 1;
	echo '<div class="accordion">';
	foreach ( $items as $index => $item ) :
			printf( '<div data-target="#accordion-%1$s" class="accordion-section-title"><span>%2$s</span></div>',
					$shuffled . $counter,
					$item['title']
			);
			printf( '<div id="accordion-%1$s" class="accordion-section-content">%2$s</div>',
					$shuffled . $counter,
					wpautop($item['text'])
			);
		$counter++;
	 endforeach;
	echo '</div>';
endif; ?>
