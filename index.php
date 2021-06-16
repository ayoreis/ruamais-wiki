<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Colab Wiki</title>

        <?php
            wp_head();

            wp_footer();
        ?>
    </head>
    <body>
        <header>
            <h1>The Colab Wiki.</h1>
        </header>
        <main>
            <h2>Featured posts</h2>
            <hr>
            <h2>Categroires</h2>
            <ul>
                <li>Tools</li>
                <li>Words</li>
            </ul>
        </main>

        <hr>

        <footer>
            <?php get_footer(); ?>
        </footer>
    </body>
</html>
