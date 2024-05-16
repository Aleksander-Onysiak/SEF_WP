<?php get_header(); ?>
    <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress ?>
        
        <main class="post">
            <header class="post__header">
                <h1 class="post__title"><?= get_the_title(); ?></h1>
            </header>
            <section class="post__intro">
                <h2 class="sro">Introduction</h2>
                <?= get_the_content(); ?>
            </section>
        </main>

    <?php endwhile; endif; // Fermeture de "The Loop" de Wordpress ?>
<?php get_footer(); ?>