<?php get_header(); ?>
	
	<div class="site">
        <div class="site__content">
            <?php
            	if ( have_posts() ) 
            	{
            		while ( have_posts() ) 
            		{
            		    the_post();

	                    echo '<div class="blog-content">';

	                    	if ( has_post_thumbnail() ) 
	                    	{
	                    		echo '<div class="featured-image">';

	                    			the_post_thumbnail( 'post_large' );

	                    		echo '</div>';
	                    	}

	                    	echo '<div class="entry-header">';

	                    		the_title( '<h1 class="title">', '</h1>' );


	                    			echo '<ul class="categories list-unstyled">';

	                    				printf( 
	                    				    '<li class="date"><a href="%s">%s</a></li>', 
	                    				    get_day_link( 
	                    				        get_the_time( 'Y' ), 
	                    				        get_the_time( 'm' ), 
	                    				        get_the_time( 'd' ) 
	                    				    ), 
	                    				    get_the_date('F j, Y') 
	                    				);
	                    				
	                    				$categories = get_the_category( get_the_ID() );

	    		                		if ( $categories ) 
	    		                		{
	    		            				foreach ( $categories as $category ) 
	    		            				{
	    		            					printf( 
	    		            						'<li class="category">
	    		            							<a href="%s">%s</a>
	    		            						</li>', 
	    		            						esc_url( get_term_link( $category->term_id ) ), 
	    		            						$category->name 
	    		            					);
	    		            				}
	    		                		}

	                    			echo '</ul>';

	                    	echo '</div>';

	                    	echo '<main class="postcontent">';

		                    	$toc_manager = new GC_TOC_Manager();
		                    	$content_with_ids = $toc_manager->add_ids_to_headings(get_the_content());
		                    	$heading_array = $toc_manager->create_toc_array();

		                    	if ( $heading_array ) 
		                    	{
		                    		echo '<div class="table-content">';
			                    		echo '<ol class="anchor-links list-unstyled sscroll">';

						            		foreach ( $heading_array as $key => $heading ) 
						            		{
						            			printf( '<li class="level-%s%s"><a href="#%s" class="anchor-link">%s</a></li>', $heading['level'], ( $key == 0 ? ' active' : ''), $heading['id'], $heading['title'] );
						            		}

							            echo '</ol>';
						            echo '</div>';
		                    	}

		            			if ( '' !== get_post()->post_content )
		            	        {
		            	        	echo '<div class="content__editor">';

		            	        		the_content();

		            	        	echo '</div>';
		            	        }

	            	        echo '</main>';

	            	        echo '<div class="entry-footer">';
	            	        	echo '<a href="'.esc_url( get_the_permalink( get_option('page_for_posts') ) ).'" class="backlink"><span><ion-icon name="arrow-back-outline"></ion-icon></span>'.esc_html__( 'Back to Blog Posts', 'azizultex' ).'</a>';
	            	        	echo '<div class="sharethis-inline-share-buttons"></div>';
	            	        echo '</div>';
	            	    echo '</div>';
            		}
            	}
            ?>                
        </div>
    </div>

<?php get_footer(); ?>