<?php 

if ($instance['new_window']) {
   $additional_attribute = ' target="_blank"';
 } ?>

<?php if($instance['block_link']) echo '<a href=' . sow_esc_url($instance['url'] ) . $additional_attribute . '>'?>
  <?php if($instance['image']) {?>
    <div class="card-image">
      <?php echo wp_get_attachment_image( $instance['image'] , $instance['image_size'] ); ?>
    </div>
  <?php } ?>
  <div class="card-content">
    <?php if($instance['title']){?>
      <div class="title">
      <?php echo '<h3>' . $instance['title'] . '</h3>';  ?>
      </div>
      <?php } ?>
    <div class="content">
      <?php $content = wpautop($instance['text'] ); ?>
    	<?php echo $content; ?>
      <?php if( !($instance['block_link'])) echo '<a class="link-button" href=' . sow_esc_url($instance['url'])  . $additional_attribute . '>' . $instance['link_button_text'] . '</a>'?>
    </div>
  </div>
  <?php if($instance['block_link']) echo '</a>'?>