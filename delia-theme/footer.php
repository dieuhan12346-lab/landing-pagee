<footer class="delia-footer">
    <div class="footer-inner">
        <div class="footer-brand">
            <span class="footer-logo">DELIA</span>
            <p>Premium Vietnamese chocolate<br>for everyone.</p>
        </div>
        <div class="footer-links">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('ve-delia'))   ?: home_url('/ve-delia/')); ?>">About</a>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('cau-chuyen')) ?: home_url('/cau-chuyen/')); ?>">Our Story</a>
            <a href="<?php echo esc_url(class_exists('WooCommerce') ? get_permalink(wc_get_page_id('shop')) : home_url('/san-pham/')); ?>">Products</a>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('lien-he'))    ?: home_url('/lien-he/')); ?>">Contact</a>
        </div>
        <div class="footer-social">
            <a href="#" aria-label="Facebook">FB</a>
            <a href="#" aria-label="Instagram">IG</a>
        </div>
    </div>
    <div class="footer-copy">
        <p>&copy; <?php echo date('Y'); ?> Delia Chocolate. All rights reserved.</p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
