<?php
/**
 * Template Name: Contact
 */
get_header(); ?>

<section class="inner-hero">
    <div class="inner-hero-content">
        <div class="breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
            <span>/</span><span>Contact</span>
        </div>
        <p class="section-eyebrow">Orders &amp; Support</p>
        <h1>We're Always<br><em>Here for You</em></h1>
        <p>Place orders, inquire about corporate gifts, or just say hello — we respond within 2 business hours.</p>
    </div>
</section>

<section class="contact-section">
    <div class="contact-inner">
        <div class="contact-info">
            <h2>Connect with Delia</h2>
            <p>Whether you need a personal gift box or a bulk corporate order of hundreds — we're here to help.</p>
            <div class="contact-details">
                <div class="contact-item">
                    <div class="contact-icon">📞</div>
                    <div class="contact-item-text"><strong>Phone / Zalo</strong><span>0901 234 567</span></div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">✉️</div>
                    <div class="contact-item-text"><strong>Email</strong><span>hello@deliachocolate.com</span></div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">📍</div>
                    <div class="contact-item-text"><strong>Factory</strong><span>123 Le Loi Street, Ben Nghe Ward,<br>District 1, Ho Chi Minh City</span></div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">🕐</div>
                    <div class="contact-item-text"><strong>Business Hours</strong><span>Mon – Sat: 8:00 AM – 6:00 PM<br>Sun: 9:00 AM – 3:00 PM</span></div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">🚚</div>
                    <div class="contact-item-text"><strong>Delivery</strong><span>Nationwide within 24–48 hours<br>Ho Chi Minh City within 4 hours</span></div>
                </div>
            </div>
            <div class="social-links">
                <a href="#" class="social-link">📘 Facebook</a>
                <a href="#" class="social-link">📷 Instagram</a>
                <a href="#" class="social-link">💬 Zalo</a>
            </div>
            <div style="margin-top:2.5rem;padding:1.5rem;background:var(--honey-pale);border-radius:var(--r-lg);border:1px solid rgba(212,149,106,0.2);">
                <p style="font-family:var(--font-serif);font-size:1rem;font-weight:700;color:var(--brown);margin-bottom:1rem;">Delia's Promise</p>
                <ul style="list-style:none;display:flex;flex-direction:column;gap:0.6rem;">
                    <li style="display:flex;align-items:center;gap:0.75rem;font-size:0.88rem;color:var(--brown-mid);"><span style="color:var(--terra);">✓</span> Response within 2 business hours</li>
                    <li style="display:flex;align-items:center;gap:0.75rem;font-size:0.88rem;color:var(--brown-mid);"><span style="color:var(--terra);">✓</span> Free custom gift box design</li>
                    <li style="display:flex;align-items:center;gap:0.75rem;font-size:0.88rem;color:var(--brown-mid);"><span style="color:var(--terra);">✓</span> Returns if product doesn't meet quality standards</li>
                    <li style="display:flex;align-items:center;gap:0.75rem;font-size:0.88rem;color:var(--brown-mid);"><span style="color:var(--terra);">✓</span> 20% off wholesale orders of 50+ boxes</li>
                </ul>
            </div>
        </div>

        <div class="contact-form-wrap">
            <h3>Send an Order Request</h3>
            <form id="deliContactForm">
                <?php wp_nonce_field('delia_nonce', 'delia_wp_nonce'); ?>
                <div class="form-group">
                    <label for="dc_name">Full Name *</label>
                    <input type="text" id="dc_name" name="name" placeholder="John Doe" required>
                </div>
                <div class="form-group">
                    <label for="dc_phone">Phone Number *</label>
                    <input type="tel" id="dc_phone" name="phone" placeholder="+84 901 234 567" required>
                </div>
                <div class="form-group">
                    <label for="dc_email">Email</label>
                    <input type="email" id="dc_email" name="email" placeholder="email@example.com">
                </div>
                <div class="form-group">
                    <label for="dc_product">Product of Interest</label>
                    <select id="dc_product" name="product">
                        <option value="">-- Select a product --</option>
                        <?php if (class_exists('WooCommerce')):
                            $products = wc_get_products(['status' => 'publish', 'limit' => 20]);
                            foreach ($products as $p): ?>
                            <option><?php echo esc_html($p->get_name()); ?></option>
                        <?php endforeach; endif; ?>
                        <option>Dark Truffle Collection</option>
                        <option>Premium Gift Box</option>
                        <option>Seasonal Praline</option>
                        <option>Milk &amp; Caramel</option>
                        <option>Custom Order</option>
                    </select>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                    <div class="form-group">
                        <label for="dc_qty">Quantity (boxes)</label>
                        <input type="number" id="dc_qty" name="qty" placeholder="1" min="1">
                    </div>
                    <div class="form-group">
                        <label for="dc_date">Delivery Date</label>
                        <input type="date" id="dc_date" name="date">
                    </div>
                </div>
                <div class="form-group">
                    <label for="dc_message">Special Requests</label>
                    <textarea id="dc_message" name="message" rows="4" placeholder="Handwritten card, logo printing, delivery address..."></textarea>
                </div>
                <button type="submit" class="btn-submit">Send Order Request 🍫</button>
                <div class="form-note" id="dc_feedback"></div>
            </form>
        </div>
    </div>
</section>

<script>
(function(){
    var form = document.getElementById('deliContactForm');
    if (!form) return;
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        var btn = form.querySelector('.btn-submit');
        var feedback = document.getElementById('dc_feedback');
        btn.disabled = true;
        btn.textContent = 'Sending...';
        var data = new FormData(form);
        data.append('action', 'delia_contact');
        data.append('nonce', (typeof DeliaSite !== 'undefined') ? DeliaSite.nonce : '');
        fetch((typeof DeliaSite !== 'undefined') ? DeliaSite.ajaxUrl : '/wp-admin/admin-ajax.php', {
            method: 'POST', body: data
        }).then(function(r){ return r.json(); }).then(function(res){
            if (res.success) {
                btn.textContent = '✓ Sent Successfully!';
                btn.style.background = '#4a7c59';
                feedback.textContent = 'We will contact you within 2 business hours.';
                feedback.style.color = '#4a7c59';
                form.reset();
            } else {
                btn.disabled = false;
                btn.textContent = 'Send Order Request 🍫';
                feedback.textContent = 'An error occurred, please try again.';
                feedback.style.color = 'var(--terra)';
            }
        }).catch(function(){
            btn.disabled = false;
            btn.textContent = 'Send Order Request 🍫';
        });
    });
})();
</script>

<?php get_footer(); ?>
