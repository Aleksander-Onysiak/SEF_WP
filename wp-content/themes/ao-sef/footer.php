    <div class="footer">
        <?php 
        // Afficher le menu de pied de page "façon Wordpress"
        wp_nav_menu(['theme_location' => 'footer']); 
        ?>


        <?php 
        // Afficher le menu de pied de page "façon MVC"
        foreach(dw_get_navigation_links('footer') as $link): ?>
        <a href="<?= $link->url ?>" class="nav__link"><?= $link->label ?></a>
        <?php endforeach; ?>
    </div>
    <?php wp_footer(); ?>
</body>
</html>