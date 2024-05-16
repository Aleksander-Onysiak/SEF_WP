<?php get_header(); ?>
    <main class="page">
        <div class="page__content">
            <h1>Résultats de votre recherche <em>"<?= get_search_query(); ?>"</em></h1>

            <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress ?>
                <article class="result">
                    <a href="<?= get_permalink(); ?>" class="result__link">
                        <span class="sro">Lire le résultat "<?= get_the_title(); ?>"</span>
                    </a>
                    <div class="result__box">
                        <h3 class="result__title"><?= get_the_title(); ?></h3>
                    </div>
                </article>
            <?php endwhile; endif; // Fermeture de "The Loop" de Wordpress ?>

        </div>
    </main>
<?php get_footer(); ?>