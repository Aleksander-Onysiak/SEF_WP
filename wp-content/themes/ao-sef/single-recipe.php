<?php get_header(); ?>
    <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress ?>
        
        <main class="recipe">
            <header class="recipe__header">
                <h1 class="recipe__title"><?= get_the_title(); ?></h1>
            </header>
            <aside class="recipe__details">
                <h2 class="sro">Informations sur cette recette</h2>
                <dl class="recipe__info">
                    <dt class="recipe__term">Durée:</dt>
                    <dd class="recipe__data"><?= get_field('duration'); ?> minutes</dd>
                    <dt class="recipe__term">Personnes:</dt>
                    <dd class="recipe__data"><?= get_field('capacity'); ?></dd>
                    <dt class="recipe__term">Prix:</dt>
                    <dd class="recipe__data"><?= get_field('cost'); ?></dd>
                </dl>
            </aside>
            <section class="recipe__steps">
                <h2 class="sro">Instructions</h2>
                <?= get_the_content(); ?>
            </section>
        </main>

    <?php endwhile; endif; // Fermeture de "The Loop" de Wordpress ?>
<?php get_footer(); ?>