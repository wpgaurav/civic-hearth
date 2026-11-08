<?php
/**
 * Title: Civic homepage
 * Slug: civic-hearth/civic-homepage
 * Categories: civic-hearth
 * Description: A complete civic homepage. Use with the Civic homepage page template and replace service search links with published page links.
 * Keywords: homepage, civic, community
 * Viewport Width: 1200
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
?>
<?php get_template_part( 'patterns/service-hero' ); ?>
<?php get_template_part( 'patterns/service-directory' ); ?>
<?php get_template_part( 'patterns/community-actions' ); ?>
<?php get_template_part( 'patterns/latest-news' ); ?>
<?php get_template_part( 'patterns/common-questions' ); ?>
<?php
get_template_part( 'patterns/contact-panel' );
