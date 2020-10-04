<?php
# The footer of my theme.
?>
<footer class="layout__footer">
    <div class="row align-items-center">
        <div class="col-12 col-lg-5 text-center text-lg-right order-lg-3">
            <div class="powered-by">Superpowered by
                <a href="" class="link link_text">Wordpress</a>
            </div>
        </div>
        <div class="col-12 col-lg-2 text-center order-lg-2">
            <a href="/" class="link copyright">&copy;</a>
        </div>
        <div class="col-12 col-lg-5 text-center text-lg-left order-lg-1">
            <div class="social-links">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'bottom',
                    'container'      => '',
                    'items_wrap' => '%3$s',
                    'walker' => new Eg_Bottom_Menu_Walker,
                ));
                ?>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>