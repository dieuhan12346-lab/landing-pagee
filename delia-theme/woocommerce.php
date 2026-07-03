<?php get_header(); ?>

<div class="woo-page">

<?php if (is_shop()): ?>
    <div class="woo-hero">
        <p class="section-eyebrow">Cửa Hàng</p>
        <h1>Bộ Sưu Tập <em>Delia</em></h1>
        <p class="woo-hero-sub">Socola Việt Nam chất lượng cao — đa dạng hương vị, giao hàng toàn quốc.</p>
    </div>

    <div class="woo-content">
        <?php
        $paged = get_query_var('paged') ?: 1;
        $args = [
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => 12,
            'paged'          => $paged,
            'tax_query'      => [[
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => ['exclude-from-catalog'],
                'operator' => 'NOT IN',
            ]],
        ];
        $loop = new WP_Query($args);

        if ($loop->have_posts()):
        ?>
        <ul class="products columns-3">
        <?php while ($loop->have_posts()): $loop->the_post();
            $product = wc_get_product(get_the_ID());
        ?>
            <li class="product">
                <a href="<?php the_permalink(); ?>" class="product-loop-thumb">
                    <div class="product-loop-img">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('woocommerce_thumbnail'); ?>
                        <?php else: ?>
                            <div class="product-loop-placeholder"></div>
                        <?php endif; ?>
                    </div>
                </a>
                <div class="product-loop-info">
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="woocommerce-loop-product__title" style="color:#4A1500"><?php the_title(); ?></h2>
                    </a>
                    <span class="price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                    <div class="product-loop-actions">
                        <?php woocommerce_template_loop_add_to_cart(); ?>
                    </div>
                </div>
            </li>
        <?php endwhile; ?>
        </ul>

        <?php
        // Pagination
        $big = 999999;
        echo paginate_links([
            'base'    => str_replace($big, '%#%', get_pagenum_link($big)),
            'format'  => '?paged=%#%',
            'current' => $paged,
            'total'   => $loop->max_num_pages,
        ]);
        else:
        ?>
        <p class="woocommerce-info">Chưa có sản phẩm nào.</p>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>

<?php elseif (is_product_category()): ?>
    <div class="woo-hero">
        <p class="section-eyebrow">Danh Mục</p>
        <h1><?php single_cat_title(); ?></h1>
    </div>
    <div class="woo-content"><?php woocommerce_content(); ?></div>

<?php elseif (is_product()): ?>
    <div class="woo-breadcrumb">
        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">Cửa Hàng</a>
        <span>›</span>
        <span><?php the_title(); ?></span>
    </div>
    <div class="woo-content"><?php woocommerce_content(); ?></div>

<?php else: ?>
    <div class="woo-content"><?php woocommerce_content(); ?></div>
<?php endif; ?>

</div>

<?php get_footer(); ?>
