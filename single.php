<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>

        <?php
            wp_head();

            wp_footer();
        ?>

    </head>

    <?php
        if(have_posts()):
            while(have_posts()):
                the_post();
    ?>

    <body>
        <main>
            <header>
                <h1><?php the_title(); ?></h1>
            </header>
            <div class="container">
                <p><?php the_excerpt(); ?></p>
            </div>
        </main>
    </body>

    <?php
            endwhile;
        endif;

        wp_reset_postdata();
    ?>
    
</html>
