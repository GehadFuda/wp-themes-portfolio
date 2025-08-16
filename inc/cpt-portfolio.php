<?php
function wptf_register_portfolio_cpt() {
    $labels = array(
        'name' => 'Portfolio',
        'singular_name' => 'Project',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title','editor','thumbnail','excerpt','custom-fields'),
        'rewrite' => array('slug' => 'projects'),
        'show_in_rest' => true,
    );
    register_post_type('wptf_portfolio', $args);
}
add_action('init', 'wptf_register_portfolio_cpt');
