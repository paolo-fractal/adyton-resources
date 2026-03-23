<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#D4AF37', // Gold
                        background: '#0F172A', // Dark Navy
                        foreground: '#FFFFFF'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>

    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-background text-foreground antialiased min-h-screen flex flex-col'); ?>>
    
    <header class="border-b border-white/10 bg-background/80 backdrop-blur-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-bold text-primary">
                Adyton Resources
            </a>
            
            <nav class="hidden md:flex gap-6 text-sm font-medium">
                <a href="/about" class="hover:text-primary transition-colors">About</a>
                <a href="/projects" class="hover:text-primary transition-colors">Projects</a>
                <a href="/news" class="hover:text-primary transition-colors">News</a>
                <a href="/investors" class="hover:text-primary transition-colors">Investors</a>
            </nav>
        </div>
    </header>
    
    <main class="flex-grow">