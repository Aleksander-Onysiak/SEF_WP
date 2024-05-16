<?php get_header(); ?>
    <main class="page">
        <div class="page__content">
            <h1>Tous mes récits de voyage</h1>

            <aside class="page__terms">
                <h2 class="sro">Filtrer les résultats</h2>

                <?php $countries = get_terms([
                    'taxonomy' => 'countries',
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'hide_empty' => true,
                ]);

                foreach($countries as $country): ?>
                    <a href="<?= get_term_link($country); ?>" class="page__term"><?= $country->name; ?></a>
                <?php endforeach; ?>
            </aside>

            <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress ?>
                <article class="recipe">
                    <h3 class="recipe__title"><?= get_the_title(); ?></h3>
                    <dl class="recipe__info">
                        <dt class="recipe__term">Durée:</dt>
                        <dd class="recipe__data"><?= get_field('duration'); ?> minutes</dd>
                        <dt class="recipe__term">Personnes:</dt>
                        <dd class="recipe__data"><?= get_field('capacity'); ?></dd>
                        <dt class="recipe__term">Prix:</dt>
                        <dd class="recipe__data"><?= get_field('cost'); ?></dd>
                    </dl>
                    <a href="<?= get_permalink(); ?>" class="recipe__link">Lire la recette complète pour "<?= get_the_title(); ?>"</a>
                </article>
            <?php endwhile; endif; // Fermeture de "The Loop" de Wordpress ?>
        </div>
    </main>
<?php get_footer(); ?>