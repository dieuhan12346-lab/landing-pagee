<?php
/**
 * Template Name: Our Story
 */
get_header(); ?>

<section class="inner-hero">
    <div class="inner-hero-content">
        <div class="breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
            <span>/</span><span>Our Story</span>
        </div>
        <p class="section-eyebrow">The Delia Story</p>
        <h1>Vietnamese Chocolate<br><em>For the World</em></h1>
        <p>The journey of Delia — from lush cacao farms, through modern production lines, and finally to your hands.</p>
    </div>
</section>

<section class="story-intro">
    <div class="story-intro-inner">
        <div class="story-intro-visual"><span>DELIA</span></div>
        <div class="story-intro-text">
            <p class="section-eyebrow">Origins</p>
            <h2>Born From<br><em>Vietnam's Cacao Land</em></h2>
            <p>Vietnam is one of the world's highest-quality cacao-growing regions — yet for years, these raw materials were mainly exported unprocessed. Delia was founded with a simple question: why can't Vietnamese people enjoy great chocolate made from their own cacao?</p>
            <p>From there, we built a modern production facility, partnering directly with farmers in Ben Tre, Tien Giang, and Dak Lak — creating premium chocolate products at prices everyone can afford.</p>
            <p>Delia isn't just chocolate — it's the pride of Vietnamese cacao, made for the world to discover.</p>
        </div>
    </div>
</section>

<section class="process-section">
    <div class="section-header">
        <p class="section-eyebrow">Production Process</p>
        <h2>From Cacao Bean<br><em>To Product</em></h2>
        <p class="section-sub">We control the entire process — from selecting cacao beans to delivering the final product — ensuring consistent quality in every batch.</p>
    </div>
    <div class="process-steps">
        <div class="process-step"><div class="step-num">1</div><span class="step-icon">🌿</span><h3>Bean Selection</h3><p>Direct partnerships with farms in Ben Tre, Tien Giang, and Dak Lak — selecting only the highest quality cacao lots.</p></div>
        <div class="process-step"><div class="step-num">2</div><span class="step-icon">☀️</span><h3>Fermentation &amp; Drying</h3><p>Cacao beans are naturally fermented and properly dried — a crucial step that creates Delia's distinctive flavor profile.</p></div>
        <div class="process-step"><div class="step-num">3</div><span class="step-icon">⚙️</span><h3>Roasting &amp; Processing</h3><p>Precisely temperature-controlled roasting with modern equipment, followed by grinding and refining — producing pure cacao mass with no additives.</p></div>
        <div class="process-step"><div class="step-num">4</div><span class="step-icon">🍫</span><h3>Production &amp; Molding</h3><p>ISO 22000 and HACCP certified production line — ensuring consistent quality and food safety in every product.</p></div>
        <div class="process-step"><div class="step-num">5</div><span class="step-icon">📦</span><h3>Packaging &amp; Delivery</h3><p>Temperature-controlled packaging with professionally designed wrapping — ready for domestic and international markets.</p></div>
    </div>
</section>

<section class="ingredients-section">
    <div class="section-header">
        <p class="section-eyebrow">Ingredients</p>
        <h2>Only the <em>Finest</em><br>Go Into Delia</h2>
    </div>
    <div class="ingredients-grid">
        <div class="ingredient-card"><span class="icon">🫘</span><h3>Vietnamese Cacao</h3><p>From renowned growing regions in the Mekong Delta and Central Highlands — distinctive flavor, consistent quality.</p></div>
        <div class="ingredient-card"><span class="icon">🍯</span><h3>Natural Sugar</h3><p>Premium cane sugar, retaining a refined sweetness — perfectly balanced with the bitterness of cacao.</p></div>
        <div class="ingredient-card"><span class="icon">🥛</span><h3>Pure Cocoa Butter</h3><p>No vegetable butter or palm oil — only pure cocoa butter for a naturally smooth melt on the tongue.</p></div>
        <div class="ingredient-card"><span class="icon">🌿</span><h3>No Preservatives</h3><p>Absolutely no preservatives or artificial flavors — real taste comes from real ingredients.</p></div>
    </div>
</section>

<section style="background:var(--terra);padding:5rem 4rem;text-align:center;">
    <div style="max-width:800px;margin:0 auto;">
        <p style="font-family:var(--font-serif);font-size:clamp(1.2rem,2.5vw,1.7rem);font-style:italic;color:rgba(255,255,255,0.9);line-height:1.7;margin-bottom:2rem;">"Vietnamese cacao is among the finest in the world. Delia's mission is to transform this resource into products that make Vietnamese people proud — at a price everyone can enjoy."</p>
        <span style="font-size:0.8rem;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.6);">— Delia Chocolate</span>
    </div>
</section>

<section style="background:var(--bg-secondary);padding:5rem 4rem;text-align:center;">
    <p class="section-eyebrow" style="margin-bottom:1rem;">Want to Experience It?</p>
    <h2 style="font-family:var(--font-serif);font-size:clamp(1.6rem,3.5vw,2.4rem);font-weight:700;color:var(--brown);margin-bottom:1.5rem;line-height:1.2;">Discover Products<br><em style="font-style:italic;font-weight:400;color:var(--terra);">Made from Vietnamese Cacao</em></h2>
    <a href="<?php echo esc_url(class_exists('WooCommerce') ? get_permalink(wc_get_page_id('shop')) : home_url('/san-pham/')); ?>" class="btn-primary">View Products</a>
</section>

<?php get_footer(); ?>
