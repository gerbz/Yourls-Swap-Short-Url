<?php
/*
Plugin Name: Swap Short URL
Plugin URI: http://github.com/ggwarpig/Yourls-Swap-Short-Url
Description: Swap out the shorturls created by yourls if you want to point them somewhere else.  This can be tricky!  See the <a href="http://github.com/ggwarpig/Yourls-Swap-Short-Url/blob/master/README.md">instructions</a>
Version: 1.7
Author: ggwarpig
Author URI: http://gerbz.com
*/

// Modifies link to shorturls everywhere
// functions.php 1683
yourls_add_filter( 'yourls_link', 'swap_shorturl_yourls_link' );

function swap_shorturl_yourls_link( $args ) {
	return str_replace( YOURLS_SITE, YOURLS_SHORT_URL, $args );
}

// Modifies the stats action button url
// functions-html.php 524
yourls_add_filter( 'table_add_row_action_array', 'swap_shorturl_table_add_row_action_array' );

function swap_shorturl_table_add_row_action_array( $args ) {

	foreach( $args as &$arg ) {
		if( $arg['title'] == 'Stats') {
			$url = rtrim(ltrim(str_replace( YOURLS_SITE, '', $arg['href'] ),'/'), '+');
			$arg['href'] = YOURLS_SITE.'/yourls-infos.php?id='.$url;
			break;
		}
	}

	return $args;
}

// Modifies shorturls in share boxes after creating a new link on the admin panel
// functions 261
yourls_add_filter( 'add_new_link', 'swap_shorturl_add_new_link' );

function swap_shorturl_add_new_link( $args ) {
	$args['shorturl'] = str_replace( YOURLS_SITE, YOURLS_SHORT_URL, $args['shorturl'] );
	$args['message'] = str_replace( YOURLS_SITE, YOURLS_SHORT_URL, $args['message'] );
	return $args;
}

// Modifies shorturls of the response after editing a link
// functions.php 367
yourls_add_filter( 'edit_link', 'swap_shorturl_edit_link' );

function swap_shorturl_edit_link( $args ) {
	$args['url']['shorturl'] = str_replace( YOURLS_SITE, YOURLS_SHORT_URL, $args['url']['shorturl'] );
	return $args;
}