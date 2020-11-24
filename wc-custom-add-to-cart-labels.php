<?php
/*
 Plugin Name: WC Custom Add to Cart labels
 Plugin URI: https://profiles.wordpress.org/rynald0s
 Description: This plugin lets you change the "add to cart" labels on single product pages (per product type) and archive / shop page (per product type). 
 Author: Rynaldo Stoltz
 Author URI: https://github.com/rynaldos
 Version: 1.4.0
 License: GPLv3 or later License
 URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}

/**
 * Add settings
 */
function catcl_section( $sections ) {
    $sections['catcl_section'] = __( 'Add to cart button labels', 'wc-add-to-cart-labels' );
    return $sections;
}
add_filter( 'woocommerce_get_sections_products', 'catcl_section' );

function catcl_settings( $settings, $current_section ) {
    
    /**
     * Check the current section is what we want
     **/
    if ( 'catcl_section' === $current_section ) {

        $settings[] = array( 'title' => __( 'Change the "add to cart" button label on single product pages (per product type)', 'wc-add-to-cart-labels' ), 'type' => 'title', 'id' => 'wc_atc_change' );

        $settings[] = array(
                'title'    => __( 'Simple products', 'wc-add-to-cart-labels' ),
                'desc' => __( 'This will change the "add to cart" label shown on single product page of simple product type', 'wc-add-to-cart-labels' ),
                'id'       => 'simple_button_text_single',
                'type'     => 'text',
                'placeholder' => 'Add to cart',
                'css'      => 'min-width:350px;',
            );

        $settings[] = array(
                'title'    => __( 'Grouped products', 'wc-add-to-cart-labels' ),
                'desc' => __( 'This will change the "add to cart" label shown on single product page of grouped product type', 'wc-add-to-cart-labels' ),
                'id'       => 'grouped_button_text_single',
                'type'     => 'text',
                'placeholder' => 'Add to cart',
                'css'      => 'min-width:350px;',
            );

        $settings[] = array(
                'title'    => __( 'External products', 'wc-add-to-cart-labels' ),
                'desc' => __( 'This will change the "add to cart" label shown on single product page of external product type', 'wc-add-to-cart-labels' ),
                'id'       => 'external_button_text_single',
                'type'     => 'text',
                'placeholder' => 'Add to cart',
                'css'      => 'min-width:350px;',
            );

        $settings[] = array(
                'title'    => __( 'Variable products', 'wc-add-to-cart-labels' ),
                'desc' => __( 'This will change the "add to cart" label shown on single product page of variable product type', 'wc-add-to-cart-labels' ),
                'id'       => 'variable_button_text_single',
                'type'     => 'text',
                'placeholder' => 'Add to cart',
                'css'      => 'min-width:350px;',
            );

        $settings[] = array(
                'title'    => __( 'Bookable products', 'wc-add-to-cart-labels' ),
                'desc' => __( 'This will change the "add to cart" label shown on single product page of bookable product type', 'wc-add-to-cart-labels' ),
                'id'       => 'booking_button_text_single',
                'type'     => 'text',
                'placeholder' => 'Add to cart',
                'css'      => 'min-width:350px;',
            );

        $settings[] = array(
                'title'    => __( 'Subscription products', 'woocommerce-subscriptions' ),
                'desc' => __( 'This will change the "add to cart" label shown on single product page of subscription product type', 'wc-add-to-cart-labels' ),
                'id'       => 'subs_button_text_single',
                'type'     => 'text',
                'placeholder' => 'Sign up now',
                'css'      => 'min-width:350px;',
            );

        $settings[] = array(
                'title'    => __( 'Variable subscription products', 'woocommerce-subscriptions' ),
                'desc' => __( 'This will change the "add to cart" label shown on the single product page of variable subscription product type', 'wc-add-to-cart-labels' ),
                'id'       => 'subs_var_button_text_single',
                'type'     => 'text',
                'placeholder' => 'Sign up now',
                'css'      => 'min-width:350px;',
            );

        $settings[] = array( 'type' => 'sectionend', 'id' => 'wc_atc_change' );

        $settings[] = array( 'title' => __( 'Change the "add to cart" button label on archive / shop page (per product type)', 'wc-add-to-cart-labels' ), 'type' => 'title', 'id' => 'wc_atc_change' );

        $settings[] = array(
                'title'    => __( 'Simple products (archive)', 'wc-add-to-cart-labels' ),
                'desc' => __( 'This will change the "add to cart" label on simple products that are shown on the archive page', 'wc-add-to-cart-labels' ),
                'id'       => 'simple_button_text',
                'type'     => 'text',
                'placeholder' => 'Add to cart',
                'css'      => 'min-width:350px;',
            );

        $settings[] = array(
                'title'    => __( 'Grouped products (archive)', 'wc-add-to-cart-labels' ),
                'desc' => __( 'This will change the "add to cart" label on grouped products that are shown on the archive page', 'wc-add-to-cart-labels' ),
                'id'       => 'grouped_button_text',
                'type'     => 'text',
                'placeholder' => 'Add to cart',
                'css'      => 'min-width:350px;',
            );

        $settings[] = array(
                'title'    => __( 'External products (archive)', 'wc-add-to-cart-labels' ),
                'desc' => __( 'This will change the "add to cart" label on external products that are shown on the archive page', 'wc-add-to-cart-labels' ),
                'id'       => 'external_button_text',
                'type'     => 'text',
                'placeholder' => 'Add to cart',
                'css'      => 'min-width:350px;',
            );

        $settings[] = array(
                'title'    => __( 'Variable products (archive)', 'wc-add-to-cart-labels' ),
                'desc' => __( 'This will change the "add to cart" label on variable products that are shown on the archive page', 'wc-add-to-cart-labels' ),
                'id'       => 'variable_button_text',
                'type'     => 'text',
                'placeholder' => 'Add to cart',
                'css'      => 'min-width:350px;',
            );

        $settings[] = array(
                'title'    => __( 'Bookable products (archive)', 'wc-add-to-cart-labels' ),
                'desc' => __( 'This will change the "add to cart" label on bookable products that are shown on the archive page', 'wc-add-to-cart-labels' ),
                'id'       => 'booking_button_text',
                'type'     => 'text',
                'placeholder' => 'Add to cart',
                'css'      => 'min-width:350px;',
            );

        $settings[] = array(
                'title'    => __( 'Subscription products (archive)', 'wc-add-to-cart-labels' ),
                'desc' => __( 'This will change the "add to cart" label on subscription products that are shown on the archive page', 'wc-add-to-cart-labels' ),
                'id'       => 'subs_button_text',
                'type'     => 'text',
                'placeholder' => 'Sign up now',
                'css'      => 'min-width:350px;',
            );

        $settings[] = array(
                'title'    => __( 'Variable subscription products (archive)', 'wc-add-to-cart-labels' ),
                'desc' => __( 'This will change the "add to cart" label on variable subscription products that are shown on the archive page', 'wc-add-to-cart-labels' ),
                'id'       => 'subs_var_button_text',
                'type'     => 'text',
                'placeholder' => 'Sign up now',
                'css'      => 'min-width:350px;',
            );

        $settings[] = array( 'type' => 'sectionend', 'id' => 'wc_atc_change' );
    }

    return $settings;
}
add_filter( 'woocommerce_get_settings_products','catcl_settings', 10, 2 );

function custom_woocommerce_product_single_add_to_cart_text($text, $product) {

    $custom_text = '';

    switch ( $product->get_type() ) {
        case 'simple':
            $custom_text = catcl_get_settings( 'simple_button_text_single');
        break;
        case 'grouped':
            $custom_text = catcl_get_settings( 'grouped_button_text_single');
        break;
        case 'external':
            $custom_text = catcl_get_settings( 'external_button_text_single');
        break;
        case 'variable':
            $custom_text = catcl_get_settings( 'variable_button_text_single');
        break;
        case 'booking':
            $custom_text = catcl_get_settings( 'booking_button_text_single');
        break;
        case 'subscription':
            $custom_text = catcl_get_settings( 'subs_button_text_single');
        break;
        case 'variable-subscription':
            $custom_text = catcl_get_settings( 'subs_var_button_text_single');
        break;

    }

    return '' !== $custom_text ? $custom_text : $text;
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'custom_woocommerce_product_single_add_to_cart_text', 10, 2 );
add_filter( 'woocommerce_booking_single_add_to_cart_text', 'custom_woocommerce_product_single_add_to_cart_text', 10, 2 );

function custom_woocommerce_product_add_to_cart_text($text, $product) {

    $custom_text = '';

    switch ( $product->get_type() ) {
        case 'simple':
            $custom_text = catcl_get_settings( 'simple_button_text');
        break;
        case 'grouped':
            $custom_text = catcl_get_settings( 'grouped_button_text');
        break;
        case 'external':
            $custom_text = catcl_get_settings( 'external_button_text');
        break;
        case 'variable':
            $custom_text = catcl_get_settings( 'variable_button_text');
        break;
        case 'booking':
            $custom_text = catcl_get_settings( 'booking_button_text');
        break;
        case 'subscription':
            $custom_text = catcl_get_settings( 'subs_button_text');
        break;
        case 'variable-subscription':
            $custom_text = catcl_get_settings( 'subs_var_button_text');
        break;

    }

    return '' !== $custom_text ? $custom_text : $text;
}
add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text', 10, 2 );

function catcl_get_settings( $key ) {
    return get_option( $key, '' );
}
