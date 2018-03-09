<?php
if ( ! empty( $instance['items'] ) ) :
	$items = $instance['items'];
	printf('<ul class="bxslider">');
	foreach ( $items as $index => $item ) :
		$image =  wp_get_attachment_image_src( $item['image'] , 'full' );
		printf(
			'<li class="item" style="background-image: url(%1$s)">
					<div class="caption">
						<h4>%2$s</h4>
						%3$s
					</div>
				</li>',
				 $image[0],
				 $item['title'],
				 wpautop($item['caption_text'])
			 );
	endforeach;
	printf('</ul>');
endif; ?>
