<figure>
	<a class="video-widget" href="<?php echo $instance['url']; ?>?rel=0&amp;showinfo=0&amp;autoplay=1" title="">
		<img src="http://img.youtube.com/vi/<?php echo youtube_id_from_url($instance['url']);?>/hqdefault.jpg" alt="">
	</a>
	<?php
	if ($instance['caption']) {
		echo 	'<figcaption>' . wpautop($instance['caption']) . '</figcaption>';
	}
	?>
</figure>
