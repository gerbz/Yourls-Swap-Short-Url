<?php
/*
Plugin Name: Swap Short URL
Plugin URI: http://github.com/ggwarpig/Yourls-Swap-Short-Url/
Description: Swap out the shorturls created by yourls if you want to point them somewhere else.  This can be tricky!  See the <a href="http://github.com/ggwarpig/Yourls-Swap-Short-Url/blob/master/README.md">instructions</a>
Version: 1.0
Author: ggwarpig
Author URI: http://gerbz.com
*/

// List of plugin hooks http://yourls.org/hooklist.php

// Modifies shorturl displayed alongside the edit shortcode field on the admin panel
// functions-html.php 364
yourls_add_filter( 'table_edit_row', 'swap_shorturl_table_edit_row' );

function swap_shorturl_table_edit_row( $args ) {
	return str_replace( YOURLS_SITE, YOURLS_SHORT_URL, $args );
}

// Modifies shorturls in share boxes after creating a new link on the admin panel
// functions 261
yourls_add_filter( 'add_new_link', 'swap_shorturl_add_new_link' );

function swap_shorturl_add_new_link( $args ) {
	$args['shorturl'] = str_replace( YOURLS_SITE, YOURLS_SHORT_URL, $args['shorturl'] );
	$args['message'] = str_replace( YOURLS_SITE, YOURLS_SHORT_URL, $args['message'] );
	return $args;
}

// Modifies link to shorturls from the shortcode in the admin panel
// functions-html.php 448
yourls_add_filter( 'table_add_row', 'swap_shorturl_table_add_row' );

function swap_shorturl_table_add_row( $args ) {
	return str_replace( YOURLS_SITE, YOURLS_SHORT_URL, $args );
}

// Modifies shorturls of the response after editing a link
// functions.php 312
yourls_add_filter( 'edit_link', 'swap_shorturl_edit_link' );

function swap_shorturl_edit_link( $args ) {
	$args['url']['shorturl'] = str_replace( YOURLS_SITE, YOURLS_SHORT_URL, $args['url']['shorturl'] );
	return $args;
}

// Modifies shorturls in the shortlink box on the info page
// functions-html.php 276
yourls_add_filter( 'share_box_data', 'swap_shorturl_share_box_data' );

function swap_shorturl_share_box_data( $args ) {
	$args = str_replace( YOURLS_SITE, YOURLS_SHORT_URL, $args );	
	return $args;	
}

// Modifies shorturl in the header of the info page
// functions-html.php 1392
yourls_add_filter( 'yourls_link', 'swap_shorturl_yourls_link' );

function swap_shorturl_yourls_link( $args ) {
	$args = str_replace( YOURLS_SITE, YOURLS_SHORT_URL, $args );	
	return $args;	
}