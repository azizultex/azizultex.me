jQuery(document).ready(function($) {
    $('.overview').readmore({
        speed: 500, 
        collapsedHeight: 185,
        moreLink: '<a href="#">Read more...</a>',
        lessLink: '<a href="#">Collapse</a>',
        blockCSS: 'float:right'
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
        //$('.top-title').slideDown();
    }, 3000);

});