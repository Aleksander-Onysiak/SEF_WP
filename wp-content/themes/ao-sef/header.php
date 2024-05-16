<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?= dw_asset('css/site.css'); ?>">
    <script src="<?= dw_asset('js/site.js') ?>"></script>
</head>
<body>
    <h1><?= get_bloginfo('name'); ?></h1>
    <div class="menu">
        <?php 
        // Afficher le menu de pied de page "façon Wordpress"
        wp_nav_menu(['theme_location' => 'main', 'container' => 'nav']); 
        ?>

        <?php 
        // Afficher le menu de pied de page "façon MVC"
        ?>
        <nav class="nav">
            <h2 class="nav_title">Navigation principale</h2>
            <div class="nav__container">
                <?php foreach(dw_get_navigation_links('main') as $link): ?>
                <a href="<?= $link->url ?>" class="nav__link"><?= $link->label ?></a>
                <?php endforeach; ?>
            </div>
            <div class="nav__languages">
                <?php foreach(dw_get_languages() as $lang): ?>
                <a href="<?= $lang->url; ?>" class="nav__lang<?php if($lang->current):?> nav__lang--current<?php endif;?>" hreflang="<?= $lang->locale; ?>" title="<?= $lang->label; ?>"><?= $lang->code; ?></a>
                <?php endforeach; ?>
            </div>
        </nav>

        <div class="search">
            <?php get_search_form(); ?>

            <?php // OU... ?>

            <form action="<?= home_url(); ?>" method="get" class="search__form">
                <div class="search__field">
                    <label for="search">Votre recherche</label>
                    <input type="search" name="s" id="search" placeholder="par exemple tarte..." value="<?= get_search_query(); ?>" />
                    <button type="submit" class="search__btn">Rechercher !</button>
                </div>
            </form>
        </div>

        <?php // Version "BEM" avec JS pour faire un "quick search" ?>

        <div class="quicksearch">
            <form action="<?= home_url(); ?>" method="get" class="quicksearch__form">
                <div class="quicksearch__field">
                    <label for="search" class="quicksearch__label sro">Votre recherche</label>
                    <input type="search" name="s" id="search" placeholder="Recherchez par exemple tarte..." value="<?= get_search_query(); ?>" class="quicksearch__input" />
                    <button type="submit" class="quicksearch__btn">
                        <span class="sro">Rechercher</span>
                    </button>
                </div>
            </form>
        </div>
    </div>