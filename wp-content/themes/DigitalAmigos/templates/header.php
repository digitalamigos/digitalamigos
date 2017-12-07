<header class="site-header headroom">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
                <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.png" alt="<?php bloginfo('name'); ?>">
            </a>

            <?php if (has_nav_menu('primary_navigation')) : ?>
            <button id="jsNavbarToggler" class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#jsPrimaryMenu" aria-controls="jsPrimaryMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php endif; ?>

            <div id="jsPrimaryMenu" class="collapse navbar-collapse">
                <?php if (has_nav_menu('primary_navigation')) : ?>
                    <?php wp_nav_menu(['theme_location' => 'primary_navigation', 'container_class' => 'ml-auto', 'menu_class' => 'navbar-nav']); ?>
                <?php endif; ?>
            </div>
            <a href="#contact" class="btn btn-primary btn-getintouch btn-sm">Get In Touch</a>
        </div>
    </nav>
</header>
