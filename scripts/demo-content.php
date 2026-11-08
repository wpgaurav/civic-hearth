<?php
/** Seed only the authorized Civic Hearth demonstration subsite. */
defined( 'ABSPATH' ) || exit;
if ( home_url( '/' ) !== 'https://demo.gatilab.com/civic-hearth/' || get_option( 'civic_hearth_demo_owner' ) !== 'civic-hearth-release-2026-11-08' || get_stylesheet() !== 'civic-hearth' ) {
	throw new RuntimeException( 'Unexpected demo identity.' );
}
global $map, $expected, $author;
$map = get_option( 'civic_hearth_demo_content', array() );
$expected = array();
$author = get_user_by( 'login', 'wpgaurav' );
function ch_demo_paragraph( $text ) { return '<!-- wp:paragraph --><p>' . $text . '</p><!-- /wp:paragraph -->'; }
function ch_demo_heading( $text ) { return '<!-- wp:heading --><h2 class="wp-block-heading">' . esc_html( $text ) . '</h2><!-- /wp:heading -->'; }
function ch_demo_save( $key, $title, $content, $type = 'page', $template = '' ) {
	global $map, $expected, $author;
	$existing = get_page_by_path( $key, OBJECT, $type );
	if ( $existing && empty( $map[ $key ] ) ) { throw new RuntimeException( 'Unowned content collision: ' . $key ); }
	$args = array( 'post_title' => $title, 'post_name' => $key, 'post_type' => $type, 'post_status' => 'draft', 'post_author' => $author->ID, 'post_content' => $content, 'comment_status' => 'closed', 'ping_status' => 'closed' );
	if ( ! empty( $map[ $key ] ) ) { $args['ID'] = $map[ $key ]; }
	$id = wp_insert_post( wp_slash( $args ), true );
	if ( is_wp_error( $id ) ) { throw new RuntimeException( $id->get_error_message() ); }
	if ( $template ) { update_post_meta( $id, '_wp_page_template', $template ); }
	$map[ $key ] = $id;
	$expected[ $id ] = hash( 'sha256', $content );
	update_option( 'civic_hearth_demo_content', $map, false );
	return $id;
}
$services = array(
	'bins-and-recycling' => array( 'Bins and recycling', 'Make everyday recycling information easier to find.', 'Check your local authority\'s collection calendar, learn what belongs in each bin, and find the right route for reporting a missed collection.' ),
	'housing-and-support' => array( 'Housing and support', 'Start with a clear route to housing advice.', 'Find local housing information, understand the documents a service may ask for, and locate support for your circumstances.' ),
	'parking-and-travel' => array( 'Parking and travel', 'Find the information you need before you travel.', 'Look for parking guidance, accessible travel information, and the transport services available in your area.' ),
	'families-and-education' => array( 'Families and education', 'Help for families, schools, and young people.', 'Bring school information, family support, and learning opportunities together in one readable service page.' ),
	'health-and-wellbeing' => array( 'Health and wellbeing', 'Find local ways to look after your wellbeing.', 'Explore community activities, social support, and information about finding the right local care service.' ),
	'planning-and-places' => array( 'Planning and places', 'Understand the changes taking place around you.', 'A service page can explain planning consultations, link to official application records, and show how residents can share their views.' ),
	'libraries-and-learning' => array( 'Libraries and learning', 'A place to read, learn, and connect.', 'Help people find library information, digital resources, reading groups, and opportunities to learn something new.' ),
	'parks-and-community-spaces' => array( 'Parks and community spaces', 'Make more of the places you share.', 'Introduce local green spaces, community venues, access information, and the organizations that look after them.' ),
	'your-community' => array( 'Your community', 'Find your people and take part.', 'Bring community groups, volunteering opportunities, consultations, and local news into a directory people can navigate easily.' ),
);
foreach ( $services as $slug => $data ) {
	$content = ch_demo_paragraph( esc_html( $data[1] ) ) . ch_demo_heading( 'About this service' ) . ch_demo_paragraph( esc_html( $data[2] ) ) . ch_demo_heading( 'Before you begin' ) . ch_demo_paragraph( 'On a real community website, this section would explain eligibility, required information, and the next step. This demonstration does not process applications or service requests.' ) . ch_demo_heading( 'Find the right information' ) . ch_demo_paragraph( 'Use the <a href="' . esc_url( home_url( '/services/' ) ) . '">services directory</a> or <a href="' . esc_url( home_url( '/contact/' ) ) . '">contact information example</a> to continue exploring.' );
	ch_demo_save( $slug, $data[0], $content );
}
$registry = WP_Block_Patterns_Registry::get_instance();
$pattern = function ( $slug ) use ( $registry ) { $p = $registry->get_registered( 'civic-hearth/' . $slug ); if ( ! $p ) { throw new RuntimeException( 'Missing theme pattern' ); } return $p['content']; };
$replace_links = function ( $content ) use ( $services ) {
	$targets = array();
	foreach ( $services as $slug => $data ) { $targets[ $data[0] ] = $slug; }
	$targets += array( 'Check collection days' => 'bins-and-recycling', 'Report a missed collection' => 'bins-and-recycling', 'Get housing advice' => 'housing-and-support', 'Find local support' => 'housing-and-support', 'Find parking information' => 'parking-and-travel', 'Plan a local journey' => 'parking-and-travel', 'Find school information' => 'families-and-education', 'Explore family support' => 'families-and-education', 'Find wellbeing support' => 'health-and-wellbeing', 'Explore care services' => 'health-and-wellbeing', 'View planning information' => 'planning-and-places', 'Have your say' => 'planning-and-places', 'Find your library' => 'libraries-and-learning', 'Explore learning opportunities' => 'libraries-and-learning', 'Explore local parks' => 'parks-and-community-spaces', 'Find a community space' => 'parks-and-community-spaces', 'Find community groups' => 'your-community', 'Explore volunteering' => 'your-community', 'View consultations' => 'planning-and-places', 'Find a volunteering opportunity' => 'your-community', 'Explore community groups' => 'your-community', 'Find contact information' => 'contact', 'Find accessibility information' => 'accessibility' );
	foreach ( $targets as $search => $slug ) { $content = str_replace( esc_url( add_query_arg( 's', $search, home_url( '/' ) ) ), esc_url( home_url( '/' . $slug . '/' ) ), $content ); }
	return $content;
};
$home = ch_demo_save( 'home', 'Home', $replace_links( $pattern( 'civic-homepage' ) ), 'page', 'page-templates/civic-homepage.php' );
ch_demo_save( 'services', 'Services and support', ch_demo_paragraph( 'Browse the service layouts in this fictional community website.' ) . $replace_links( $pattern( 'service-directory' ) ), 'page', 'page-templates/full-width.php' );
$news = ch_demo_save( 'news', 'Community news', '' );
ch_demo_save( 'about', 'A place to belong', ch_demo_paragraph( 'Civic Hearth is a fictional community created to demonstrate a free WordPress theme for public life.' ) . ch_demo_heading( 'Clear information helps everyone' ) . ch_demo_paragraph( 'The design puts readable type, visible links, useful search, and straightforward navigation first. A local organization can adapt these pages using the block editor and Customizer.' ) . ch_demo_heading( 'Made for the places we share' ) . ch_demo_paragraph( 'The same foundation can support a council, library, charity, neighborhood group, or community center.' ) );
ch_demo_save( 'contact', 'Contact and support', ch_demo_paragraph( 'This is an example contact page for the Civic Hearth demonstration. No service requests or personal details are collected here.' ) . ch_demo_heading( 'On your own website' ) . ch_demo_paragraph( 'Add your organization\'s contact details, opening hours, address, and access information using ordinary blocks. A suitable form plugin can handle submissions if you need one.' ) . $replace_links( $pattern( 'information-notice' ) ) );
ch_demo_save( 'accessibility', 'Accessibility in this demonstration', ch_demo_paragraph( 'Civic Hearth includes a skip link, visible keyboard focus, underlined links, readable type, responsive layouts, and keyboard-operated menus.' ) . ch_demo_heading( 'Try the keyboard' ) . ch_demo_paragraph( 'Press Tab to reach the skip link. Continue through navigation links and use the submenu buttons to open more choices. Escape closes the open menu and returns focus.' ) . ch_demo_heading( 'Your content matters' ) . ch_demo_paragraph( 'Image descriptions, heading order, link wording, and any plugins you add affect the accessibility of your finished website. This page describes theme features and is not a certification of a completed site.' ) );
$tour = ch_demo_heading( 'A complete civic homepage' ) . ch_demo_paragraph( '<a href="' . esc_url( home_url( '/' ) ) . '">Start at the homepage</a> to try the search, service cards, latest news, and common-question disclosures.' ) . ch_demo_heading( 'Service pages and news' ) . ch_demo_paragraph( 'Open <a href="' . esc_url( home_url( '/bins-and-recycling/' ) ) . '">a service information page</a>, the <a href="' . esc_url( home_url( '/services/' ) ) . '">full-width directory</a>, and the <a href="' . esc_url( home_url( '/news/' ) ) . '">news archive</a> to compare templates.' ) . ch_demo_heading( 'Everyday block styling' ) . ch_demo_paragraph( 'Native blocks handle the page content. The Customizer controls site-wide colors, type size, widths, menus, and the site notice.' ) . '<!-- wp:quote --><blockquote class="wp-block-quote">' . ch_demo_paragraph( 'Useful public information should be easy to find and comfortable to read.' ) . '</blockquote><!-- /wp:quote -->' . '<!-- wp:table --><figure class="wp-block-table"><table class="has-fixed-layout"><thead><tr><th>Website area</th><th>How to edit it</th></tr></thead><tbody><tr><td>Page content</td><td>WordPress block editor</td></tr><tr><td>Colors and layout</td><td>Appearance &gt; Customize</td></tr><tr><td>Navigation and footer</td><td>Menus and Widgets</td></tr></tbody></table></figure><!-- /wp:table -->' . ch_demo_heading( 'Get Civic Hearth' ) . ch_demo_paragraph( '<a href="https://gauravtiwari.org/product/civic-hearth/">Download the theme free</a> with a lifetime update key for unlimited websites. The code is GPL-2.0-or-later.' );
ch_demo_save( 'examples', 'Explore Civic Hearth', $tour );
foreach ( array(
	'library-community' => array( 'A new chapter for our community library', 'A readable news post gives a library room to introduce its spaces, resources, and upcoming activities.' ),
	'shared-spaces' => array( 'Help shape the future of our shared spaces', 'Clear consultation pages can explain a proposal, tell people how to respond, and show what happens next.' ),
	'greener-neighborhood' => array( 'Small actions, a greener neighborhood', 'A community update can bring recycling guidance, local green spaces, and opportunities to volunteer together.' ),
) as $slug => $post ) {
	$id = ch_demo_save( $slug, $post[0], ch_demo_paragraph( $post[1] ) . ch_demo_heading( 'Information with a clear next step' ) . ch_demo_paragraph( 'This original sample article demonstrates Civic Hearth\'s news template, reading width, post metadata, and related navigation. Replace it with your own local reporting.' ) . ch_demo_paragraph( '<a href="' . esc_url( home_url( '/news/' ) ) . '">Browse all community news</a>.' ), 'post' );
	wp_update_post( array( 'ID' => $id, 'post_excerpt' => $post[1] ) );
}
foreach ( $expected as $id => $hash ) { if ( hash( 'sha256', get_post_field( 'post_content', $id ) ) !== $hash ) { throw new RuntimeException( 'Stored content differs: ' . $id ); } }
foreach ( array( 'primary' => array( 'services', 'news', 'about', 'examples' ), 'footer' => array( 'about', 'accessibility', 'examples' ) ) as $location => $keys ) {
	$menu = wp_get_nav_menu_object( 'Civic Hearth ' . $location );
	$menu_id = $menu ? $menu->term_id : wp_create_nav_menu( 'Civic Hearth ' . $location );
	if ( ! $menu ) { foreach ( $keys as $key ) { wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-object-id' => $map[ $key ], 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) ); } }
	$locations[ $location ] = $menu_id;
}
set_theme_mod( 'nav_menu_locations', $locations );
$primary_items = wp_get_nav_menu_items( $locations['primary'] );
$services_parent = 0;
foreach ( $primary_items as $item ) { if ( (int) $item->object_id === (int) $map['services'] ) { $services_parent = $item->ID; } }
foreach ( array( 'bins-and-recycling', 'housing-and-support', 'libraries-and-learning' ) as $key ) {
	$found = false;
	foreach ( $primary_items as $item ) { if ( (int) $item->object_id === (int) $map[ $key ] ) { $found = true; } }
	if ( ! $found ) { wp_update_nav_menu_item( $locations['primary'], 0, array( 'menu-item-parent-id' => $services_parent, 'menu-item-object-id' => $map[ $key ], 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) ); }
}
update_option( 'blogdescription', 'A welcoming home for public life.' );
update_option( 'show_on_front', 'page' ); update_option( 'page_on_front', $home ); update_option( 'page_for_posts', $news ); update_option( 'posts_per_page', 6 ); update_option( 'default_comment_status', 'closed' ); update_option( 'blog_public', 0 );
set_theme_mod( 'civic_hearth_footer_text', 'Civic Hearth. Fictional community demonstration. No public service applications are processed.' );
$widgets = array( 2 => array( 'title' => 'Explore', 'text' => '<p><a href="' . home_url( '/services/' ) . '">Services and support</a></p><p><a href="' . home_url( '/news/' ) . '">Community news</a></p>', 'filter' => false ), 3 => array( 'title' => 'Help', 'text' => '<p><a href="' . home_url( '/contact/' ) . '">Contact example</a></p><p><a href="' . home_url( '/accessibility/' ) . '">Accessibility</a></p>', 'filter' => false ), 4 => array( 'title' => 'Civic Hearth', 'text' => '<p><a href="https://gauravtiwari.org/product/civic-hearth/">Get the theme free</a></p><p><a href="' . home_url( '/examples/' ) . '">Explore the theme</a></p>', 'filter' => false ), '_multiwidget' => 1 );
update_option( 'widget_text', $widgets ); update_option( 'sidebars_widgets', array( 'wp_inactive_widgets' => array(), 'footer-1' => array( 'text-2' ), 'footer-2' => array( 'text-3' ), 'footer-3' => array( 'text-4' ), 'array_version' => 3 ) );
foreach ( $map as $key => $id ) { $p = get_post( $id ); if ( 'draft' === $p->post_status ) { $result = wp_update_post( array( 'ID' => $id, 'post_status' => 'publish' ), true ); if ( is_wp_error( $result ) ) { throw new RuntimeException( $result->get_error_message() ); } } }
update_option( 'civic_hearth_demo_verified_hashes', $expected, false );
foreach ( array( array( 1, 'post', 'Hello world!' ), array( 2, 'page', 'Sample Page' ) ) as $boilerplate ) {
	$p = get_post( $boilerplate[0] );
	if ( $p && $p->post_type === $boilerplate[1] && $p->post_title === $boilerplate[2] ) { wp_update_post( array( 'ID' => $p->ID, 'post_status' => 'draft' ) ); }
}
echo wp_json_encode( array( 'site_id' => get_current_blog_id(), 'url' => home_url( '/' ), 'objects' => $map, 'published' => count( $map ), 'blog_public' => get_option( 'blog_public' ) ) );
