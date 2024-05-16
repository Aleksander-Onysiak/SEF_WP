<?php get_header(); ?>
    <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress ?>
        
        <main class="trip">
            <header class="trip__header">
                <h1 class="trip__title"><?= get_the_title(); ?></h1>
            </header>
            <aside class="trip__details">
                <h2 class="sro">Informations sur ce voyage</h2>
                <dl class="trip__info">
                    <dt class="trip__term">Lieu:</dt>
                    <dd class="trip__data"><?= get_field('location'); ?></dd>
                    <dt class="trip__term">Date:</dt>
                    <dd class="trip__data"><?= get_field('date'); ?></dd>
                </dl>
            </aside>
            <section class="trip__steps">
                <h2 class="sro">Mon histoire</h2>
                <?= get_the_content(); ?>
            </section>
        </main>

    <?php endwhile; endif; // Fermeture de "The Loop" de Wordpress ?>
<?php get_footer(); ?>