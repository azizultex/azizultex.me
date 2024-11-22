<article <?php post_class('blog-post'); ?>>
    <?php
        echo '<div class="media">';

            if ( has_post_thumbnail() ) 
            {
                the_post_thumbnail( 'post_thumb' );
            }
            else
            {
                printf( 
                    '<img src="%s" alt="%s">', 
                    esc_url( get_theme_file_uri( 'assets/images/post-thumb.jpg' ) ), 
                    get_the_title() 
                );
            }

        echo '</div>';

        echo '<div class="text">';

            printf( 
                '<a href="%s" class="date">%s</a>', 
                get_day_link( 
                    get_the_time( 'Y' ), 
                    get_the_time( 'm' ), 
                    get_the_time( 'd' ) 
                ), 
                get_the_date('F j, Y') 
            );

            the_title( '<h4 class="title">', '</h4>' );

            if ( has_excerpt() ) 
            {
                echo '<div class="description">';

                    the_excerpt();

                echo '</div>';
            }
        echo '</div>';

        echo '<a href="'.esc_url( get_the_permalink() ).'" class="link"></a>';
    ?>
</article>