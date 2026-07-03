<?php get_header(); ?>

<!-- HERO SPLIT -->
<section class="hero" id="home">
    <div class="hero-bg"></div>
    <div class="hero-content">
        <p class="hero-eyebrow">Vietnamese Chocolate · Delia</p>
        <h1 class="hero-title">Sweetness<br><em>From the Land</em><br>of Vietnam</h1>
        <p class="hero-sub">Delia chocolate is crafted from premium Vietnamese cacao — real flavor, affordable price, made for everyone.</p>
        <div class="hero-cta">
            <a href="<?php echo esc_url(class_exists('WooCommerce') ? get_permalink(wc_get_page_id('shop')) : home_url('/san-pham/')); ?>" class="btn-primary">Explore Products</a>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('cau-chuyen')) ?: home_url('/cau-chuyen/')); ?>" class="btn-ghost">Our Story</a>
        </div>
    </div>
    <div class="hero-scroll"><span>Discover</span><div class="scroll-line"></div></div>
</section>

<!-- STATS BAR -->
<div class="stats-bar">
    <div class="stats-bar-inner">
        <div class="stats-bar-item"><strong>10+</strong><span>Product Lines</span></div>
        <div class="stats-bar-item"><strong>100%</strong><span>Vietnamese Cacao</span></div>
        <div class="stats-bar-item"><strong>0</strong><span>Preservatives</span></div>
        <div class="stats-bar-item"><strong>5+</strong><span>Export Countries</span></div>
    </div>
</div>

<!-- FEATURED PRODUCTS -->
<section class="featured">
    <div class="section-header">
        <p class="section-eyebrow">Featured Products</p>
        <h2>Find Your<br><em>Perfect Chocolate</em></h2>
        <p class="section-sub">From rich dark chocolate to smooth milk chocolate — Delia has the perfect product for every taste and occasion.</p>
    </div>

    <?php if (class_exists('WooCommerce')):
        $featured = wc_get_products(['status' => 'publish', 'limit' => 3, 'featured' => true]);
        if (empty($featured)) $featured = wc_get_products(['status' => 'publish', 'limit' => 3]);
    ?>
    <div class="product-grid" style="max-width:1100px;margin:0 auto;">
        <?php foreach ($featured as $product): ?>
        <div class="product-card">
            <div class="product-img" style="background:linear-gradient(135deg,#E8C08A 0%,#C4704F 50%,#9E4E2A 100%);position:relative;">
                <?php if ($product->get_image_id()): ?>
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($product->get_image_id(), 'medium')); ?>"
                         alt="<?php echo esc_attr($product->get_name()); ?>"
                         style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">
                <?php endif; ?>
                <div class="product-overlay">
                    <a href="<?php echo esc_url(get_permalink($product->get_id())); ?>" class="product-cta">View Details</a>
                </div>
            </div>
            <div class="product-info">
                <span class="product-tag">
                    <?php $tags = wc_get_product_terms($product->get_id(), 'product_tag', ['fields' => 'names']);
                    echo esc_html($tags[0] ?? 'Delia'); ?>
                </span>
                <h3><?php echo esc_html($product->get_name()); ?></h3>
                <p><?php echo wp_trim_words($product->get_short_description() ?: $product->get_description(), 15, '…'); ?></p>
                <span class="product-price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="product-grid" style="max-width:1100px;margin:0 auto;">
        <div class="product-card">
            <div class="product-img product-img-1"><div class="product-overlay"><a href="<?php echo esc_url(home_url('/lien-he/')); ?>" class="product-cta">Order Now</a></div></div>
            <div class="product-info"><span class="product-tag">Signature</span><h3>Dark Chocolate</h3><p>Rich dark chocolate made from pure Vietnamese cacao</p><span class="product-price">from 35,000₫</span></div>
        </div>
        <div class="product-card product-card--featured">
            <div class="product-img product-img-2"><div class="product-overlay"><a href="<?php echo esc_url(home_url('/lien-he/')); ?>" class="product-cta">Order Now</a></div></div>
            <div class="product-info"><span class="product-tag product-tag--gold">Gift</span><h3>Delia Gift Box</h3><p>Multi-flavor collection in an elegant gift box</p><span class="product-price">from 68,000₫</span></div>
        </div>
        <div class="product-card">
            <div class="product-img product-img-3"><div class="product-overlay"><a href="<?php echo esc_url(home_url('/lien-he/')); ?>" class="product-cta">Order Now</a></div></div>
            <div class="product-info"><span class="product-tag">Favorite</span><h3>Milk Chocolate</h3><p>Smooth and sweet milk chocolate for all ages</p><span class="product-price">from 42,000₫</span></div>
        </div>
    </div>
    <?php endif; ?>
    <div class="featured-footer">
        <a href="<?php echo esc_url(class_exists('WooCommerce') ? get_permalink(wc_get_page_id('shop')) : home_url('/san-pham/')); ?>" class="btn-ghost">View All Products →</a>
    </div>
</section>

<!-- WHY DELIA -->
<section class="features-section">
    <div class="section-header">
        <p class="section-eyebrow">What Makes Delia Special</p>
        <h2>Great Chocolate<br><em>Doesn't Have to Be Expensive</em></h2>
    </div>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/><path d="M8 12l2.5 2.5L16 9"/></svg>
            </div>
            <h3>Real Ingredients</h3>
            <p>Fresh cacao from Vietnam's finest growing regions — no artificial flavors, no preservatives. The purest natural taste.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </div>
            <h3>Made for Everyone</h3>
            <p>From children to adults, from special gifts to everyday joy — Delia has the perfect product for every moment.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            </div>
            <h3>Always Affordable</h3>
            <p>We believe great chocolate doesn't have to be expensive. Delia delivers amazing flavor at a price everyone can enjoy.</p>
        </div>
    </div>
</section>

<!-- STORY SPLIT -->
<section class="home-story">
    <div class="home-story-inner">
        <div class="home-story-visual"><img src="http://deliachocolate.com/wp-content/uploads/2026/06/lich-su-nguon-goc-dac-diem-sinh-thai-cay-cacao-02.jpg" alt="Vietnamese Cacao" style="width:100%;height:100%;object-fit:cover;border-radius:inherit;"></div>
        <div class="home-story-text">
            <p class="section-eyebrow">The Delia Story</p>
            <h2>Born From<br>Vietnam's <em>Sweet Land</em></h2>
            <p>Vietnam is one of the world's finest cacao-growing regions — and Delia was created to honor that. We source cacao from Tien Giang, Ben Tre, and Dak Lak, crafting delicious chocolate products with modern technology.</p>
            <p>No fuss, no pretense — just genuinely great chocolate, made from Vietnamese ingredients, for everyone.</p>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('cau-chuyen')) ?: home_url('/cau-chuyen/')); ?>" class="btn-primary">Read Our Story →</a>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials">
    <div class="section-header">
        <p class="section-eyebrow">What Our Customers Say</p>
        <h2>People Love<br><em>Delia Chocolate</em></h2>
    </div>
    <div class="testimonial-grid" style="max-width:1100px;margin:0 auto;">
        <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <p>"I bought it on a whim because of the price, but was blown away by the taste. Delia's Dark Chocolate is rich without being bitter — my whole family loves it."</p>
            <div class="reviewer"><div class="reviewer-avatar">LM</div><div><strong>Lan Mai</strong><span>Customer, Hanoi</span></div></div>
        </div>
        <div class="testimonial-card testimonial-card--highlight">
            <div class="stars">★★★★★</div>
            <p>"I got the Delia gift box for my boss — everyone was impressed. Great value and looks so elegant. Will definitely buy again for holidays."</p>
            <div class="reviewer"><div class="reviewer-avatar">TH</div><div><strong>Thanh Ha</strong><span>Customer, Ho Chi Minh City</span></div></div>
        </div>
        <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <p>"My 8-year-old loves Delia's Milk Chocolate. Knowing it's made from Vietnamese cacao with no chemicals, I feel safe letting her enjoy it daily."</p>
            <div class="reviewer"><div class="reviewer-avatar">PV</div><div><strong>Phuong Van</strong><span>Parent, Da Nang</span></div></div>
        </div>
    </div>
</section>

<!-- CTA -->
<section style="background:var(--terra);padding:5rem 4rem;text-align:center;">
    <p style="font-size:0.78rem;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.7);margin-bottom:1rem;">Free Shipping on Orders Over 500,000₫</p>
    <h2 style="font-family:var(--font-serif);font-size:clamp(1.8rem,4vw,2.8rem);font-weight:700;color:#fff;margin-bottom:1.5rem;line-height:1.2;">Enjoy Today<br><em style="font-weight:400;">Worldwide Delivery</em></h2>
    <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
        <a href="<?php echo esc_url(class_exists('WooCommerce') ? get_permalink(wc_get_page_id('shop')) : home_url('/san-pham/')); ?>" style="display:inline-block;padding:0.9rem 2.2rem;background:#fff;color:var(--terra);font-family:var(--font-sans);font-size:0.92rem;font-weight:700;border-radius:var(--r-md);text-decoration:none;">Shop Now</a>
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('lien-he')) ?: home_url('/lien-he/')); ?>" style="display:inline-block;padding:0.9rem 2.2rem;border:2px solid rgba(255,255,255,0.6);color:#fff;font-family:var(--font-sans);font-size:0.92rem;font-weight:700;border-radius:var(--r-md);text-decoration:none;">Contact Us</a>
    </div>
</section>

<?php get_footer(); ?>
