<?php 
/*
Template Name: Home
*/
get_header(); ?>

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

    					if ( '' !== get_post()->post_content )
    			        {
    						echo '<div class="other-content">';
        			        	echo '<div class="content__editor">';

        			        		the_content();

        			        	echo '</div>';
    						echo '</div>';
    			        }


			        	$args = array(
						    'post_type' => 'post',
						    'posts_per_page' => 3,
						    'post_status' => 'publish'
						);

			        	$posts_query = new WP_Query( $args );

			        	if ( $posts_query->have_posts() ) 
			        	{
			        		echo '<div class="blog-content">';
			        			echo '<div class="entry-title d-flex">';
		        				    printf( 
		        				    	'<h2 id="blog">%s</h2>',
		        				    	esc_html__( 'What is New', 'azizultex' )  
		        				    );

		        				    printf( 
		        				    	'<a href="%s" class="btn">%s</a>',
		        				    	esc_url( get_the_permalink( get_option('page_for_posts') ) ),  
		        				    	esc_html__('View All Posts', 'azizultex')
		        				    );
			        				
			        			echo '</div>';

			        			echo '<div class="blog-posts">';

			        				while ( $posts_query->have_posts() ) 
			        				{
			        				    $posts_query->the_post();

			        				    get_template_part( 'template-parts/content', 'post' );
			        				}

			        			echo '</div>';
			        		echo '</div>';
			        	}
    				echo '</div>';
    			}
    		}
    		wp_reset_query();
    	?>
	</div>

<?php get_footer(); 