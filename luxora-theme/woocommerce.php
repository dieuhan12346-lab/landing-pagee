<?php
/**
 * WooCommerce compatibility file.
 *
 * NOTE: This file intentionally does NOT call woocommerce_content().
 *
 * When this file exists in the theme root, WordPress recognises the theme
 * as WooCommerce-compatible. WC's own WC_Template_Loader then routes each
 * WC page to the correct template override in the /woocommerce/ subfolder:
 *
 *   /woocommerce/archive-product.php  → shop / category archive
 *   /woocommerce/single-product.php   → single product page
 *   /woocommerce/content-product.php  → product card in loop
 *
 * Those templates call get_header() / get_footer() themselves (matching the
 * pattern of WC's own default templates), so this file must stay empty of
 * page-level output. Putting woocommerce_content() here would cause
 * archive-product.php and single-product.php to be bypassed entirely.
 */
