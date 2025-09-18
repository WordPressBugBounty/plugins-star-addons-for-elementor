(function($) {
	'use strict';

    $(".notice.star-addons-theme-notice.first-notice button.button-secondary").on("click", function(){
	    $(".notice.star-addons-theme-notice.first-notice").slideUp();
    });

    $(".notice.star-addons-theme-notice.second-notice button.button-secondary").on("click", function(){
	    $(".notice.star-addons-theme-notice.second-notice").slideUp();
    });

    $('.notice.star-addons-theme-notice.first-notice button.button-secondary').click(function() {
        $.cookie('StarAddonsFirstNotice', 'A cookie for StarAddonsFirstNotice', { expires: 180 });
	});

    if ($.cookie('StarAddonsFirstNotice')) {
        $('.notice.star-addons-theme-notice.first-notice').css('display', 'none');
    }

    $('.notice.star-addons-theme-notice.second-notice button.button-secondary').click(function() {
        $.cookie('StarAddonsSecondNotice', 'A cookie for StarAddonsSecondNotice', { expires: 180 });
	});

    if ($.cookie('StarAddonsSecondNotice')) {
        $('.notice.star-addons-theme-notice.second-notice').css('display', 'none');
    }

})(jQuery);
