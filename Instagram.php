<?php
    $instaResult      = file_get_contents( 'https://www.instagram.com/' . $username . '/?__a=1' ); //instagram url 
	$insta            = json_decode( $instaResult );
	$instagram_photos = $insta->graphql->user->edge_owner_to_timeline_media->edges;
	foreach ( $instagram_photos as $instagram_photo ) {
		$image         = $instagram_photo->node->display_url;
		$image_caption = $$instagram_photo->node->accessibility_caption;
		echo '<div class="single-item">';
		echo sprintf( '<div class="slide-image"><img src="%1$s"></div>%2$s', $image, $image_caption );
		echo '</div>';
	}