(function($){
    "use strict";

    $(document).ready(function() {
        $('.starad-nav-tab li a').click('click', function(e){ 
            e.preventDefault();
            $(".starad-nav-tab li a").removeClass("starad-nav-tab-active");
            $(this).addClass("starad-nav-tab-active");
            $('.starad-nav-tab-content').load($(this).attr('href') + ' .starad-nav-tab-content');
        });
    });

    $(document).on("click", ".btn-show-all-widget", function (e) {
        e.preventDefault();

        $(".starad-nav-tab-widgets table.form-table tbody tr td input:enabled").each(function (
            i
        ) {
            $(this).prop("checked", true).change();
        });

    });

    $(document).on("click", ".btn-hide-all-widget", function (e) {
        e.preventDefault();

        $(".starad-nav-tab-widgets table.form-table tbody tr td input:enabled").each(function (
            i
        ) {
            $(this).prop("checked", false).change();
        });

    });

}(jQuery));
