<?php
/**
 * Hero Section Block Template.
 */

// 1. Fetch data from ACF, with fallback defaults so it doesn't look broken when first added.
$subheading = get_field('subheading') ?: 'PNG · GOLD + COPPER';
$heading    = get_field('heading') ?: 'High-Quality Gold-Copper Assets<br />in Papua New Guinea';
$content    = get_field('content') ?: 'Positioned for near-term cash flow. <span class="font-mono font-semibold text-primary">2,401,000 oz Au</span> across two island-based projects on the Pacific Ring of Fire.';

// Handle the background image field (assuming it returns an Image Array)
$bg_image   = get_field('background_image');
$bg_url     = $bg_image ? esc_url($bg_image['url']) : get_theme_file_uri('/public/assets/hero-bg.jpg');

// Buttons
$btn_1_text = get_field('button_1_text') ?: 'Download Investor Deck';
$btn_1_link = get_field('button_1_link') ?: '/public/docs/adyton-deck.pdf';
$btn_2_text = get_field('button_2_text') ?: 'Explore Our Projects';
$btn_2_link = get_field('button_2_link') ?: '/projects/feni';
?>

<section class="relative min-h-[520px] md:min-h-[620px] flex items-center overflow-hidden">
    <div
      class="absolute inset-[-5%] bg-cover bg-center lg:bg-[length:110%_auto] xl:bg-[length:100%_auto] bg-[center_40%] animate-hero-drift opacity-90"
      style="background-image: url('<?php echo $bg_url; ?>')"
    ></div>
    
    <div class="absolute inset-0 bg-gradient-to-r from-background/90 via-background/60 to-background/10"></div>
    
    <div class="container relative z-10 py-20 md:py-28 mx-auto px-4">
      <div class="max-w-2xl">
        
        <p class="text-xs uppercase tracking-[0.3em] text-primary font-semibold mb-4 font-body">
          <?php echo esc_html($subheading); ?>
        </p>
        
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-bold text-foreground leading-[1.1] mb-6">
          <?php echo wp_kses_post($heading); ?>
        </h1>
        
        <p class="text-lg md:text-xl text-foreground/80 leading-relaxed mb-3 max-w-xl font-body">
          <?php echo wp_kses_post($content); ?>
        </p>
        
        <div class="flex flex-wrap gap-3 mt-8">
          
          <a href="<?php echo esc_url($btn_1_link); ?>" class="inline-flex items-center justify-center gap-2 rounded-md text-sm font-medium transition-colors bg-primary text-[#0F172A] hover:bg-primary/90 h-11 px-8 py-2">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
            <?php echo esc_html($btn_1_text); ?>
          </a>
          
          <a href="<?php echo esc_url($btn_2_link); ?>" class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors border border-primary text-primary hover:bg-primary hover:text-[#0F172A] h-11 px-8 py-2">
            <?php echo esc_html($btn_2_text); ?>
          </a>
          
        </div>
      </div>
    </div>
</section>