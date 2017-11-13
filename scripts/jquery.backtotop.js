/*
Template Name: Nonuxor
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
File: Back to Top JS
*/

jQuery("#backtotop").click(function () {
    jQuery("body,html").animate({
        scrollTop: 0
    }, 600);
});
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 150) {
        jQuery("#backtotop").addClass("visible");
    } else {
        jQuery("#backtotop").removeClass("visible");
    }
});

$(document).on('click', '[scroll-to]', function() {
    var target = $(this).attr('scroll-to');
    $('body,html').animate({ scrollTop: $(target).offset().top }, 600);
});

$('#mainav').on('change', 'select', function() {
    var opt = $(this).find('option:selected');
    var target = opt.attr('scroll-to');

    if (target) {
        $('body,html').animate({ scrollTop: $(target).offset().top }, 600);    
    }
});