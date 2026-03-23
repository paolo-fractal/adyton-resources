<?php
/**
 * Title: Adyton Hero Section
 * Slug: adyton/hero
 * Categories: banner, featured
 * Description: A full-width hero section with a background image and two buttons.
 */
?>
<div class="wp-block-group alignfull relative min-h-[520px] md:min-h-[620px] flex items-center overflow-hidden bg-background">
    
    <div class="absolute inset-[-5%] bg-cover bg-center lg:bg-[length:110%_auto] xl:bg-[length:100%_auto] bg-[center_40%] animate-hero-drift opacity-90" style="background-image: url('<?php echo esc_url( get_theme_file_uri( '/public/assets/hero-bg.jpg' ) ); ?>')"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#0F172A]/90 via-[#0F172A]/60 to-[#0F172A]/10"></div>
    <div class="wp-block-group container relative z-10 py-20 md:py-28 mx-auto px-4 max-w-2xl">
        
        <p class="text-xs uppercase tracking-[0.3em] text-[#D4AF37] font-semibold mb-4 font-body">PNG · GOLD + COPPER</p>
        <h1 class="wp-block-heading text-4xl md:text-5xl lg:text-6xl font-display font-bold text-white leading-[1.1] mb-6">High-Quality Gold-Copper Assets<br>in Papua New Guinea</h1>
        <p class="text-lg md:text-xl text-white/80 leading-relaxed mb-3 max-w-xl font-body">Positioned for near-term cash flow. <strong class="font-mono font-semibold text-[#D4AF37]">2,401,000 oz Au</strong> across two island-based projects on the Pacific Ring of Fire.</p>
        <div class="wp-block-buttons flex flex-wrap gap-3 mt-8">
            <div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button inline-flex items-center justify-center gap-2 rounded-md text-sm font-medium transition-colors bg-[#D4AF37] text-[#0F172A] hover:bg-[#D4AF37]/90 h-11 px-8 py-2" href="/public/docs/adyton-deck.pdf">Download Investor Deck</a></div>
            <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors border border-[#D4AF37] text-[#D4AF37] hover:bg-[#D4AF37] hover:text-[#0F172A] h-11 px-8 py-2" href="/projects/feni">Explore Our Projects</a></div>
            </div>
        </div>
    </div>