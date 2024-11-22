<?php get_header(); ?>
	
	<div class="site">
	    <div class="site__content">
	        <div class="blog-content">
            	<?php
            		global $wp_query;

            		$total_pages = $wp_query->max_num_pages;
            		$posts_page_id = get_option('page_for_posts');
            		$current_page = max( 1, get_query_var( 'paged' ) );

            		echo '<div class="entry-title">';

            			printf( 
            				'<h1 class="title">%s</h1>',  
            				get_the_title( $posts_page_id )
            			);


            			if ( $posts_page_id ) 
            			{
	            			printf(
	            			    '<div class="description">%s</div>',
	            			    apply_filters('the_content', get_post_field('post_content', $posts_page_id))
	            			);
	            		}

            		echo '</div>';

            		echo '<div class="blog-posts">';

	            		if ( have_posts() ) 
	            		{
	            			while ( have_posts() ) 
	            			{
	            				the_post();

	            				get_template_part( 
	            					'template-parts/content', 
	            					'post' 
	            				);
	            			}

	            			if ( $wp_query->max_num_pages > 1 ) 
	            			{
	            				the_posts_pagination( array(
	            				    'class' => '',
	            				    'mid_size' => 2,
	            				    'prev_text' => __( '<span><ion-icon name="arrow-back-outline"></ion-icon></span>', 'azizultex' ),
	            				    'next_text' => __( '<span><ion-icon name="arrow-forward-outline"></ion-icon></span>', 'azizultex' ),
	            				) );
	            			}
	            		}
	            		else
	            		{
	            			printf( 
	            				'<div class="noposts mt-3">
	            					<p>%s</p>
	            				</div>', 
	            				esc_html__('No posts found!', 'azizultex') 
	            			);
	            		}
	            		wp_reset_query();

            		echo '</div>';
            	?>
	        </div>
	    </div>
	</div>

<?php get_footer(); ?>