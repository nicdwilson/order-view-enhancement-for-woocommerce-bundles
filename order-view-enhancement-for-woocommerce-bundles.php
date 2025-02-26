<?php
/**
 * Plugin Name: Order View Enhancement for WooCommerce Bundles
 * Description: Adds a toggle button to show/hide bundled items in WooCommerce order edit screen
 * Version: 1.0.0
 * Author: WooCommerce Growth Team
 * Requires at least: 5.0
 * Requires PHP: 7.2
 * WC requires at least: 3.0
 * Requires Plugins: woocommerce-product-, woocommerce
 
 */

if (!defined('ABSPATH')) {
    exit;
}

class WC_Bundle_Items_Toggle {
    
    public function __construct() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));
        add_action('woocommerce_admin_order_data_after_shipping_address', array($this, 'add_toggle_button'));
    }

    public function enqueue_admin_assets($hook) {
       
        wp_enqueue_style(
            'wc-bundle-admin-toggle',
            plugin_dir_url(__FILE__) . 'assets/css/bundle-toggle.css',
            array(),
            '1.0.0'
        );

        wp_enqueue_script(
            'wc-bundle-admin-toggle',
            plugin_dir_url(__FILE__) . 'assets/js/bundle-toggle.js',
            array('jquery'),
            '1.0.0',
            true
        );
    }

    public function add_toggle_button() {
        echo '<th class="bundle-toggle-th">';
        echo '<a href="#" class="bundle-toggle-link">Show Bundled Items</a>';
        echo '</th>';
    }
}

// Initialize the plugin
add_action('plugins_loaded', function() {
    if (class_exists('WooCommerce')) {
        new WC_Bundle_Items_Toggle();
    }
});