(function ($) {

    var init = function() {
        $('.tactics-field-player').draggable({
            containment: "parent",
            cursor: "pointer",
            grid: [24, 24],
            scroll: false
        });
    };

    $(document).ready(init);

})(jQuery);