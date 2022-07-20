<?php get_header(); ?>

    <main class="page-404">
        <div class="page-404__container">
            <div class="page-404__left-content" style="background-image: url('<?php bloginfo('template_directory'); ?>/dist/img/page-404-bg-img.svg');"></div>

            <div class="page-404__right-content">
                <div class="page-404__right-content__container">
                    <h2>Oops!</h2>
                    <h1>We couldn’t find that page.</h1>

                    <div class="page-404__right-content__quick-links">
                        <p>Maybe you can find what you need here.</p>

                        <div class="page-404__right-content__quick-links__links">
                            <?php menu404(); ?>

                            <img src="<?php bloginfo('template_directory'); ?>/dist/img/curve-arrow.svg">
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </main>

<?php get_footer(); ?>