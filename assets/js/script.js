jQuery(document).ready( function( $ ) {
    "use strict";

    init_navbar();
    init_formfocus();

} );

/* 
** Navbar
* Make sticky navbar when scroll
*/
function init_navbar(){
    var site_nav = $('#masthead');
    var navigation_height = $(site_nav).outerHeight();
    $('.site-header-affix-wrapper').css('height', navigation_height);
    var distance;
    distance = $('.topbar').outerHeight();
    
    $(window).scroll(function(){
        if( $(window).scrollTop() > distance){
            $(site_nav).addClass('sticky-bar').addClass('header-light');
        }else{
            $(site_nav).removeClass('sticky-bar').removeClass('header-light');
        }
    });
    if( $(window).scrollTop() > distance){
        $(site_nav).addClass('sticky-bar').addClass('header-light');
    }

    /* scrolltop */
    $('.link-to-top').on('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

    /* active state */
    $('.nav-menu li').on('click', function(){
        $('.nav-menu li.current-menu-item').removeClass('current-menu-item');
        $(this).addClass('current-menu-item');
    })
}

/*
** Contact form
* Pretty focus input in contact form
*/
function init_formfocus(){
    $('.contact-form .form-control').on( 'focus', function(){
        $('label[for="' + $(this).attr('id') + '"]').addClass('label-focus');
        $(this).on( 'keyup', function(){
            var length =  $(this).val().length;
            if( length === 0 ) {
                $('label[for="' + $(this).attr('id') + '"]').removeClass('label-focus');
            }else{
                $('label[for="' + $(this).attr('id') + '"]').addClass('label-focus');
            }
        })
        $(this).on( 'focusout', function(){
            if( $(this).val().length === 0 ) {
                $('label[for="' + $(this).attr('id') + '"]').removeClass('label-focus');
            }else{
                $('label[for="' + $(this).attr('id') + '"]').addClass('label-focus');
            }
        })
    })
}