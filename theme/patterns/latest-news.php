<?php
/**
 * Title: Latest community news
 * Slug: civic-hearth/latest-news
 * Categories: civic-hearth
 * Description: Three real posts from a native Query Loop. Empty sites show a useful message.
 * Keywords: news, posts, updates
 * Viewport Width: 1200
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","className":"ch-section "} -->
<div class="wp-block-group alignfull ch-section ">
<!-- wp:group {"className":"ch-section-inner"} -->
<div class="wp-block-group ch-section-inner">
<!-- wp:heading {"className":"ch-rule-heading"} -->
<h2 class="wp-block-heading ch-rule-heading"><?php esc_html_e( 'From your community', 'civic-hearth' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'The latest news, announcements, and local updates.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"className":"ch-news-grid"} -->
<div class="wp-block-query ch-news-grid">
<!-- wp:post-template -->
<!-- wp:post-date /-->
<!-- wp:post-title {"level":3,"isLink":true} /-->
<!-- wp:post-excerpt {"moreText":""} /-->

<!-- /wp:post-template -->
<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Community news will appear here when posts are published.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->

<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
