(function ($) {

    var playerDragOptions = {
        containment: "parent",
        cursor: "pointer",
        grid: [24, 24],
        scroll: false
    };

    var init = function() {
        $('.tactics-field-player').draggable(playerDragOptions);

        createPlayer(240, 160, 23, 'Аршавин');
        createPlayer(58, 60, 8, 'Самир Насри');
        createPlayer(58, 160, 29, 'Халк');
        createPlayer(58, 260, 9, 'Роналдо Луис Назарио де Лима');
    };

    var createPlayer = function(x, y, number, name) {

        var playerDiv = $('<div class="tactics-field-player"></div>').appendTo($('.tactics-field'));
        playerDiv.append('<div class="tactics-field-player-number">' + number +  '</div>');
        playerDiv.append('<div class="tactics-field-player-name">' + name + '</div>');
        playerDiv.css({
            'position': 'absolute',
            'left':x,
            'top': y
        });

        playerDiv.draggable(playerDragOptions);
    };

    $(document).ready(init);

})(jQuery);