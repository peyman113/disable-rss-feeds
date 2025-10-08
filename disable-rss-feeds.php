<?php
/*
Plugin Name: Disable RSS Feeds
Plugin URI: https://peymanfarahani.com/
Description: This plugin disables all WordPress RSS/Atom feeds and returns a 410 Gone status to prevent content scraping and improve SEO.
Version: 1.0
Author: Peyman Farahani
Author URI: https://peymanfarahani.com/
License: GPL2
*/

// This function disables all WordPress RSS/Atom feeds and returns a 410 Gone status.
function disable_all_feeds() {
    status_header(410); 
    header('Content-Type: text/html; charset=UTF-8'); 
    echo '<!DOCTYPE html>';
    echo '<html><head><title>410 Gone</title></head><body>';
    echo '<h1>410 Gone</h1>';
    echo '<p>Feeds are disabled on this site.</p>';
    echo '</body></html>';
    exit;
}

// Hook into all feed types in WordPress (RSS, Atom, comments, etc.) to disable them
add_action('do_feed', 'disable_all_feeds', 1);
add_action('do_feed_rdf', 'disable_all_feeds', 1);
add_action('do_feed_rss', 'disable_all_feeds', 1);
add_action('do_feed_rss2', 'disable_all_feeds', 1);
add_action('do_feed_atom', 'disable_all_feeds', 1);
add_action('do_feed_rss2_comments', 'disable_all_feeds', 1);
add_action('do_feed_atom_comments', 'disable_all_feeds', 1);
