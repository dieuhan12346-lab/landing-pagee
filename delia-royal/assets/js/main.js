// DELIA CHOCOLATE — Royal Heritage Theme JS

// Nav scroll effect
(function() {
    var nav = document.getElementById('nav');
    if (!nav) return;
    window.addEventListener('scroll', function() {
        nav.classList.toggle('scrolled', window.scrollY > 60);
    });
})();

// Mobile nav toggle
(function() {
    var toggle = document.getElementById('navToggle');
    var links = document.getElementById('navLinks');
    if (!toggle || !links) return;
    toggle.addEventListener('click', function() {
        links.classList.toggle('open');
    });
    links.addEventListener('click', function(e) {
        if (e.target.tagName === 'A') links.classList.remove('open');
    });
})();

// Scroll fade-in animations
(function() {
    var targets = document.querySelectorAll('.section-header, .intro-visual, .intro-text, .product-card, .ingredient-card, .review-card, .cta-content, .cta-form-wrap, .story-content, .timeline-item');
    targets.forEach(function(el) { el.classList.add('fade-up'); });

    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

    targets.forEach(function(el) { observer.observe(el); });
})();

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(function(a) {
    a.addEventListener('click', function(e) {
        var id = this.getAttribute('href');
        if (id.length < 2) return;
        var target = document.querySelector(id);
        if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});
