<?php
/**
 * Loop add-to-cart button — Luxora styled.
 * Overrides: woocommerce/templates/loop/add-to-cart.php
 */
defined('ABSPATH') || exit;

global $product;

$args = wp_parse_args($args, [
    'quantity'   => 1,
    'class'      => implode(' ', array_filter([
        'btn btn-teal btn-sm',
        'add_to_cart_button',
        $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
    ])),
    'attributes' => [
        'data-product_id'  => $product->get_id(),
        'data-product_sku' => $product->get_sku(),
        'aria-label'       => $product->add_to_cart_description(),
        'rel'              => 'nofollow',
    ],
]);

echo apply_filters('woocommerce_loop_add_to_cart_link',
    sprintf(
        '<a href="%s" class="%s" %s>%s</a>',
        esc_url($product->add_to_cart_url()),
        esc_attr($args['class']),
        wc_implode_html_attributes($args['attributes']),
        esc_html($product->add_to_cart_text())
    ),
    $product, $args
);
