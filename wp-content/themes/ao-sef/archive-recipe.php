<?php get_header(); ?>
    <main class="page">
        <div class="page__content">
            <h1>Toutes mes recettes</h1>

            <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress ?>
                <article class="recipe">
                    <a href="<?= get_permalink(); ?>" class="recipe__link">Lire la recette complète pour "<?= get_the_title(); ?>"</a>
                    <div class="recipe__box">
                        <h3 class="recipe__title"><?= get_the_title(); ?></h3>
                        <dl class="recipe__info">
                            <dt class="recipe__term">Durée:</dt>
                            <dd class="recipe__data"><?= get_field('duration'); ?> minutes</dd>
                            <dt class="recipe__term">Personnes:</dt>
                            <dd class="recipe__data"><?= get_field('capacity'); ?></dd>
                            <dt class="recipe__term">Prix:</dt>
                            <dd class="recipe__data"><?= get_field('cost'); ?></dd>
                        </dl>
                    </div>
                </article>
            <?php endwhile; endif; // Fermeture de "The Loop" de Wordpress ?>
        </div>
    </main>
<?php get_footer(); ?>