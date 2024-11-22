<?php 
/*
Template Name: Home
*/
get_header(); ?>

	<div class="site">
	    <div class="site__banner">
	        <figure id="imageLoad" class="media">
	        	<img src="<?php echo get_theme_file_uri('assets/images/image-'.rand(1, 11).'.jpg'); ?>" alt="Azizul Haque at Capadocia">
	        </figure>
	    </div>

	    <div class="site__content">
	        <div class="main-content max-width">
	            <div class="content__editor">
	                <p>Hi there 👋</p>
	                <h1>I'm Azizul Haque</h1>
	                <p>a tech enthusiastic, entrepreneur, traveller, and a Blinkist reader living in Turkey. I love reading, coding, learning technologies, managing remote team, and hovering the world.</p>
	                <p>I founded <a href="https://wppool.dev/?utm_source=portfolio&utm_medium=azizultex.me" target="_blank">@WPPOOL</a> – A WordPress product company where we breed amazing unique WordPress products to help businesses make their life easier. WPPOOL is fully autonomous remote team based in Bangladesh with an excellent work culture focusing on happy, healthy personal and work-life balance.</p>
	                <ul>
	                    <li><a href="https://facebook.com/azizultex" target="_blank"><ion-icon name="logo-facebook"></ion-icon></a></li>
	                    <li><a href="https://twitter.com/azizultex" target="_blank"><ion-icon name="logo-twitter"></ion-icon></a></li>
	                    <li><a href="https://instagram.com/azizultex" target="_blank"><ion-icon name="logo-instagram"></ion-icon></a></li>
	                    <li><a href="https://www.linkedin.com/in/azizultex/" target="_blank"><ion-icon name="logo-linkedin"></ion-icon></a></li>
	                </ul>
	                <p>👉 Check out some unique products from <a href="#products">WPPOOL ⬇️</a></p>
	            </div>
	        </div>

	        <div class="other-content">
	            <div class="content__editor">
	                <h2 id="products">Products we're proud of:</h2>

	                <p><b>🌓 <a href="https://wppool.dev/wp-dark-mode/?utm_source=portfolio&utm_medium=azizultex.me" target="_blank">WP Dark Mode</a></b> - The best dark mode plugin for WordPress. Turn your website into dark mode in just on-click. Less eye strain. More user satisfaction.</p>

	                <p><b>🛍 <a href="https://wppool.dev/stock-sync-with-google-sheet-for-woocommerce/?utm_source=portfolio&utm_medium=azizultex.me" target="_blank"> Stock Sync with Google Sheet for WooCommerce</a></b> - Easy, simple, and convenient stock management plugin for WooCommerce. Track your WooCoomerce product stock from a single Google Sheet</p>

	                <p><b>🔄 <a href="https://wppool.dev/google-sheets-to-wordpress-table-live-sync/?utm_source=portfolio&utm_medium=azizultex.me" target="_blank"> Sheets to WP Table Sync</a></b> - Quick. Easy. Simple. Keep your Google Spreadsheet data always synced LIVE with the WordPress table. Responsive data tables with as many data you want to display - Sheets to WP Table Live Sync plugin got it all!</p>

	                <p><b>⭐️ <a href="https://wppool.dev/easy-video-reviews/?utm_source=portfolio&utm_medium=azizultex.me" target="_blank">Easy Video Reviews</a></b> - Next level business review plugin for WordPress. We replaced text reviews with more reliable video reviews. Let your customers record and send video testimonials right from their browser, and you can manage and showcase them anywhere on your WordPress website.</p>

	                <p><b>👩🏻‍💻 <a href="https://wppool.dev/webinar-and-video-conference-with-jitsi-meet/?utm_source=portfolio&utm_medium=azizultex.me" target="_blank"> Webinar & Video Conference with Jitsi Meet</a></b> - Create a self-hosted, branded video meeting experience in WordPress easily. Power up your live webinar & video conference hosting experience with Jitsi Meet WordPress plugin. </p>

	                <p>Sounds interesting? Check more at <a href="https://wppool.dev/?utm_source=portfolio&utm_medium=azizultex.me">wppool.dev</a>

	                Always open to listen for new possibilities. Don't hesitate to reach out.</p>
	            </div>
	        </div>

	        <?php
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
	        ?>
	    </div>
	</div>

<?php get_footer(); 