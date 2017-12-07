<div class="hero">        
    <div class="parallax-window">
        <div class="parallax-slider">
            
            <?php if(get_field('hero_option') === 'slider'): ?>
            <div class="hero-slider">
                <?php if($hero_slider = get_field('hero_slider')): ?>
                <div id="jsHeroSlider">
                    <?php foreach( $hero_slider as $image ): ?>
                        <?php $hero_slide = wp_get_attachment_image_src($image['ID'], array('1920', '1200')); ?>
                        <div class="hero-slider__image" style="background-image: url(<?php echo $hero_slide[0]; ?>);"></div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php else: ?>            
            <div class="hero-video">
                <?php if(get_field('hero_video')): ?>
                    <div class="video-embed"><?php the_field('hero_video'); ?></div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

        </div>

    </div>

    <div class="hero-overlay"></div>

    <div class="hero-content d-flex align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div id="jsBrandIconContainer" class="col-lg-4 d-none d-lg-block">
                    <img id="jsBrandIcon" class="logo-icon img-fluid d-none" src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon.png" alt="<?php bloginfo('name'); ?>">
                </div>
                <div class="col-lg-7 d-flex flex-column flex-lg-row align-items-center">
                    <img class="logo-icon img-fluid d-block d-lg-none mb-5" src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon.png" alt="<?php bloginfo('name'); ?>">
                    <?php if(get_field('hero_tagline')): ?>
                    <div class="hero-tagline sr-fadeindown"><?php the_field('hero_tagline'); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <a class="hero-scroll" href="#aboutUs"><span class="sr-only">Next Section</span></a>
</div>