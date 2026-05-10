<?php
/**
 * Main template file.
 * We are using front-page.php for the home page, this is just a fallback.
 */

get_header(); ?>

<main id="primary" class="site-main" style="padding: 100px 0; text-align: center; min-height: 50vh;">
    <div class="container">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
        else :
            echo '<p>لا يوجد محتوى هنا.</p>';
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
