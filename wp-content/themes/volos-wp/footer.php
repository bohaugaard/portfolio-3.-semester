<footer class="footer">
    <div class="footer-content center-relative">
        <?php get_sidebar(); ?>
        <?php
        if (get_theme_mod('cocobasic_select_footer') != '') :
            cocobasic_show_elementor_library_content(get_theme_mod('cocobasic_select_footer'));
        endif;
        ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>