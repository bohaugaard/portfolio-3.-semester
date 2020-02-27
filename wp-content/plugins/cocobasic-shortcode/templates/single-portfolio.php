<?php get_header(); ?>
<div id="content" class="site-content">      
    <div <?php post_class('content-holder center-relative content-1300'); ?> >      
        <?php
        global $post;

        if (isset($_POST["action"]) && ($_POST["action"] === 'portfolio_ajax_content_load')):
            if ($portfolio_query->have_posts()) :
                while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                    echo '<div class="portfolio-content">';
                    the_content();
                    echo '</div>';
                endwhile;
            endif;
        else:
            if (have_posts()) :
                while (have_posts()) : the_post();
                    echo '<div class="portfolio-content">';
                    the_content();
                    echo '</div>';
                endwhile;
            endif;

        endif;
        ?>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>