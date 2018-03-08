<div id="bgndVideo" 
	style="width: 100%;"
	class="player" 
     data-property="{
     videoURL:'<?php echo $instance['url'] ?>',
     containment:'#hero',
     autoPlay:true, 
     mute:true, 
     startAt:0, 
     opacity:1,
     quality:'highres',
     showYTLogo: false,
     gaTrack: false,
     loop: true,
     showControls: false
 }">
</div>

<?php if ($instance['text']) echo $instance['text']; ?>