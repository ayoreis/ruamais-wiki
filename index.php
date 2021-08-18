<!DOCTYPE html>

<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>RUA+ Wiki</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
            wp_head();

            wp_footer();
        ?>
    </head>
    <body>
        <header>
            <h1>The RUA+ Wiki.</h1>

            <p>desc.</p>
            <div>
                <label for="search">Search:</label>
                <input id="search" type="search" class="search" placeholder="Terms, categories, etc.">
            </div>
        </header>

        <main>

            <section class="categories">
                <ul>
                    <li class="category" data-category="all">All</li>
                    <?php
                        $categories = get_categories(array('hide_empty' => FALSE));
                        foreach ($categories as $category):
                    ?>
                    <li class="category" data-category="<?= $category -> slug; ?>"><?= $category -> name; ?></li>
                    <?php
                        endforeach;
                    ?>
                </ul>
            </section>

            <hr>

            <section class="posts">
                <ul>
                    <?php
                    $the_query = new WP_Query(
                        array(
                            'orderby' => 'title',
                            'order' => 'ASC',
                            // 'post_type' => 'terms'
                        )
                    );

                        if($the_query -> have_posts()):
                            while($the_query -> have_posts()):
                                $the_query -> the_post();
                    ?>

                    <li class="post" data-category="<?php
                            $categories = get_the_category();
                            $last = end($categories);
                            foreach($categories as $category) {
                                if ($category !== $last) {
                                    echo $category -> slug . " ";
                                } else {
                                    echo $category -> slug;
                                }
                            };?>"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></li>

                    <?php
                            endwhile;
                        endif;

                        wp_reset_postdata();
                    ?>
                </ul>
            </section>

        </main>

        <hr>

        <?php get_footer(); ?>

    </body>
</html>
