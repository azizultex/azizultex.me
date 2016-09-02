jQuery(document).ready(function($) {
    $('.overview').readmore({
        speed: 500, 
        collapsedHeight: 235,
        moreLink: '<a href="#">Read more...</a>',
        lessLink: '<a href="#">Collapse</a>',
        blockCSS: 'float:right'
    });     

    $('.site-developed').readmore({
        speed: 500, 
        collapsedHeight: 210,
        moreLink: '<a href="#" class="site_more">More sites...</a>',
        lessLink: '<a href="#" class="site_more">Collapse</a>',
    }); 

    $('.timeline-me').readmore({
        speed: 500, 
        collapsedHeight: 330,
        moreLink: '<a href="#">See more...</a>',
        lessLink: '<a href="#">Collapse</a>',
        blockCSS: 'float:right'
    });

    $('.top-title').hide();
    setTimeout(function(){ 
        $('.top-title').slideDown();
    }, 3000);

});