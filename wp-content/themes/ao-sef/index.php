<?php get_header(); ?>
    <main class="page">
        <div class="page__content">
            <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress ?>
                <h1><?= get_the_title(); ?></h1>
                <?= get_the_content(); ?>

                <section class="recipes">
                    <h2 class="recipes__title">Mes dernières recettes</h2>

                    <div class="recipes__container">
                        <?php
                        // Créer une nouvelle requête Wordpress pour récupérer mes 3 dernières recettes en date.
                        $recipes = new WP_Query([
                            'post_type' => 'recipe',
                            'post_status' => 'publish',
                            'posts_per_page' => 3,
                            'orderby' => 'date', 
                            'order' => 'DESC', 
                        ]); 

                        // Boucler via "The Loop" sur le résultat de cette requete
                        if($recipes->have_posts()): while($recipes->have_posts()): $recipes->the_post();
                        ?>

                        <article class="recipe">
                            <a href="<?= get_permalink(); ?>" class="recipe__link">
                                <span class="sro">Lire la recette complète pour "<?= get_the_title(); ?>"</span>
                            </a>
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

                        <?php endwhile; endif; // Fin de "The Loop" des recettes ?>
                    </div>
                </section>

                <section class="trips">
                    <h2 class="trips__title">Mes voyages</h2>

                    <div class="trips__container">
                        <?php

                        // Faire une requête pour récupérer les 5 derniers articles de voyage.
                        $trips = new WP_Query([
                            'post_type' => 'trips',
                            'post_status' => 'publish',
                            'posts_per_page' => 12,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ]);

                        // Ouvrir la boucle autour du code HTML qui affiche un seul voyage
                        if($trips->have_posts()): while($trips->have_posts()): $trips->the_post(); ?>
                        
                        <article class="trip">
                            <a href="<?= get_permalink(); ?>" class="trip__link">
                                <span class="sro">Lire le récit de voyage "<?= get_the_title(); ?>"</span>
                            </a>
                            <div class="trip__box">
                                <h2 class="trip__title"><?= get_the_title(); ?></h2>
                                <dl class="trip__info">
                                    <dt class="trip__term">Lieu:</dt>
                                    <dd class="trip__data"><?= get_field('location'); ?></dd>
                                    <dt class="trip__term">Date:</dt>
                                    <dd class="trip__data"><?= get_field('date'); ?></dd>
                                </dl>
                                <p class="trip__description"><?= get_field('description'); ?></p>
                            </div>
                        </article>

                        <?php endwhile; endif; // Fin de la boucle des voyages ?>
                    </div>
                </section>
            <?php endwhile; endif; // Fermeture de "The Loop" de Wordpress ?>
        </div>
    </main>
<?php get_footer(); ?>