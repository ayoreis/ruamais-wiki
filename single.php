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
    <body>
        <?php
            if(have_posts()):
                while(have_posts()):
                    the_post();
        ?>

        <h1><?php the_title(); ?></h1>

        <?php
                endwhile;
            endif;

            wp_reset_postdata();
        ?>
    </body>
</html>
