<?php get_header(); ?>

	<div class="site">    
    	<?php
    		if ( have_posts() ) 
    		{
    			while( have_posts() ) 
    			{
    				the_post();

    				$disable_left_image = get_post_meta(get_the_ID(), '_azizultex_disable_left_image', true);

    				if ( !$disable_left_image ) 
    				{
    					printf( 
    						'<div class="site__banner">
						        <figure id="imageLoad" class="media">
						        	<img src="%s" alt="%s">
						        </figure>
						    </div>', 
						    esc_url( get_theme_file_uri('assets/images/image-'.rand(1, 11).'.jpg') ),
						    esc_html__( 'Azizul Haque at Capadocia', 'azizultex' )
    					);
    				}

    				echo '<div class="site__content">';
        				echo '<div class="other-content">';

		        			the_title( '<h1 class="title">', '</h1>' );

        					if( '' !== get_post()->post_content )
        			        {
        			        	echo '<div class="content__editor">';

        			        		the_content();

        			        	echo '</div>';
        			        }

        				echo '</div>';
    				echo '</div>';
    			}
    		}
    		wp_reset_query();
    	?>
	</div>

<?php get_footer(); 