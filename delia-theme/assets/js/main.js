(function() {
    // Nav scroll
    var nav = document.querySelector('.delia-nav');
    if (nav) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 60) nav.classList.add('scrolled');
            else nav.classList.remove('scrolled');
        });
    }

    // Mobile nav toggle
    var toggle = document.querySelector('.nav-toggle');
    var navLinks = document.querySelector('.nav-links');
    if (toggle && navLinks) {
        toggle.addEventListener('click', function() {
            navLinks.classList.toggle('open');
        });
        navLinks.querySelectorAll('a').forEach(function(a) {
            a.addEventListener('click', function() {
                navLinks.classList.remove('open');
            });
        });
    }

    // Active nav link styling
    var activeLinks = document.querySelectorAll('.nav-active');
    activeLinks.forEach(function(link) {
        link.style.color = 'var(--terra)';
    });

    // Fade-up animation
    var fadeSelectors = '.product-card, .testimonial-card, .story-content, .story-visual, .order-form, .order-content, .value-card, .process-step, .ingredient-card, .contact-form-wrap, .contact-info, .founder-photo, .founder-text, .home-story-visual, .home-story-text, .story-intro-visual, .story-intro-text';
    var fadeEls = document.querySelectorAll(fadeSelectors);
    fadeEls.forEach(function(el) { el.classList.add('fade-up'); });

    if ('IntersectionObserver' in window) {
        var obs = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); }
            });
        }, { threshold: 0.1 });
        fadeEls.forEach(function(el) { obs.observe(el); });
    } else {
        fadeEls.forEach(function(el) { el.classList.add('visible'); });
    }
})();
