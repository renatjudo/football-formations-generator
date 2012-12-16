(function ($) {

    var playerDragOptions = {
        containment: "#grid",
		snap: ".cell",
		snapMode: "inner",
		snapTolerance: 16,
        cursor: "pointer",
        scroll: false,
		start: function() {
		$('.cell').css({'background': 'url("../img/half-transparent.png") 0% 0% no-repeat'});
		},
		stop: function() {
		$('.cell').css({'background-image': 'none'});
		}
    };

    var init = function() {
        $('.tactics-field-player').draggable(playerDragOptions);
        createPlayer(240, 160, 23, 'Аршавин');
        createPlayer(58, 60, 8, 'Самир Насри');
        createPlayer(58, 140, 29, 'Халк');
		createPlayer(58, 200, 29, 'Пепе');
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