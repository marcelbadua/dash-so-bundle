<?php if( !empty( $instance['title'] ) ) echo $args['before_title'] . esc_html($instance['title']) . $args['after_title'] ?>
<?php if ( ! empty( $instance['a_repeater'] ) ) :
	$items = $instance['a_repeater']; ?>
	<ul class="tabs">
		<?php foreach ( $items as $index => $item ) :  ?>
			<li rel="<?php echo str_replace(' ', '-', strtolower($item['repeat_title']) ); ?>"><?php echo $item['repeat_title']; ?></li>
		<?php endforeach; ?>
	</ul>
	<div class="tab_container">
		<?php foreach ( $items as $index => $item ) :  ?>
			<div class="d_active tab_drawer_heading" rel="<?php echo str_replace(' ', '-', strtolower($item['repeat_title']) ); ?>"><?php echo $item['repeat_title']; ?></div>
			<div id="<?php echo str_replace(' ', '-', strtolower($item['repeat_title']) ); ?>" class="tab_content">
		    <?php echo wpautop($item['repeat_text']); ?>
		  </div>
			<?php endforeach; ?>
		</div>
<?php endif; ?>
