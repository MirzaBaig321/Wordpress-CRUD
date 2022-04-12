<?php
function Property_Range() {
	include 'property_range.php';
}

function custom_menu() { 
	add_menu_page( 
		'Add Price Range', 'Add Price Range', 'edit_posts', 'property_range', 'Property_Range', 'dashicons-media-spreadsheet' 
	);
}

add_action('admin_menu', 'custom_menu');
?>
