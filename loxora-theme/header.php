<?php
/**
 * Header — Luxora marketing site (FP&A + Operating Automation)
 * @package loxora
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..700;1,9..144,400..600&family=Archivo:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
  <div class="wrap nav">
    <a href="#home" class="logo" data-link aria-label="Luxora home">
      <svg width="26" height="26" viewBox="0 0 26 26" fill="none" aria-hidden="true">
        <rect x="1" y="1" width="24" height="24" rx="6" stroke="#C6F24A" stroke-width="1.5"/>
        <path d="M7 18V8M7 18h7M12 14l3-4 3 5 2-7" stroke="#C6F24A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      Luxora<span class="dot">.</span>
    </a>
    <nav class="nav-links" id="navLinks" aria-label="Primary">
      <a href="#home" data-link>Home</a>
      <a href="#about" data-link>About</a>
      <a href="#services" data-link>Services</a>
      <a href="#listings" data-link>Listings</a>
      <a href="#contact" data-link>Contact</a>
    </nav>
    <div class="nav-right">
      <a href="https://fp-a-app.vercel.app/" class="btn btn-primary" target="_blank" rel="noopener">Open the app <span class="arr">→</span></a>
      <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>
