<?php get_header(); ?> 
<div id="content" class="site-content">
    <div <?php post_class('content-holder center-relative content-1170'); ?> > 
        <p class="center-text error-text-help-first"><strong><?php echo esc_html__('Ooops!', 'volos-wp'); ?></strong></p>            
        <p class="center-text error-text-help-second"><?php echo esc_html__('The page you were looking for could not be found.', 'volos-wp'); ?></p>
        <p class="center-text error-text-404 global-color"><?php echo esc_html__('404', 'volos-wp'); ?></p>        
        <p class="center-text error-text-home"><?php echo esc_html__('Try to start from', 'volos-wp'); ?> <a href="<?php echo esc_url(site_url('/')); ?>"><?php echo esc_html__('Home', 'volos-wp'); ?></a> <?php echo esc_html__('page.', 'volos-wp'); ?></p>            
    </div>
</div>
<?php get_footer(); ?>