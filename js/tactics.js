(function ($) {

    var counter = 1;

    var model = {
        players: []
    };

    var init = function () {
        $('#add-player').button().click(function () {
            if (counter > 11)
                return;

            createPlayer(240, 160, counter, '');
        });

        //TODO: убрать после отладки
        $('#debug-show-data').button().click(function () {
            $('#debug-data').html(JSON.stringify(model));
        });
    };

    var createPlayer = function (x, y, number, name) {

        // Player ViewModel
        var playerVM = {
            'player': {
                'name': name,
                'number': number,
                'x': x,
                'y': y
            },
            'fieldView': null
        };

        model.players.push(playerVM.player);

        createPlayerFieldView(playerVM, x, y, number, name);

        createTextField(counter, playerVM);
        counter++;
    };

    var createPlayerFieldView = function (playerVM, x, y, number, name) {

        var fieldView = {
            'numberDiv': null,
            'nameDiv': null
        };

        var playerDiv = $('<div class="tactics-field-player" id="player' + number + '"></div>').
            appendTo($('.tactics-field')).
            css({
                'position': 'absolute',
                'left': x,
                'top': y
            }).
            draggable({
                containment: "parent",
                cursor: "pointer",
                grid: [24, 24],
                scroll: false
            });

        //TODO: в dragStop добавить изменение местоположения игрока

        fieldView.numberDiv = $('<div class="tactics-field-player-number">' + number + '</div>').appendTo(playerDiv);
        fieldView.nameDiv = $('<div class="tactics-field-player-name">' + name + '</div>').appendTo(playerDiv);

        playerVM.fieldView = fieldView;
    }

    var createTextField = function (number, playerVM) {

        var textAreaDiv = $('<div class="text-fields" id="' + number + '"></div>').appendTo($('.tactics-player-list'));
        $('<input type="text" id="number-for-player-' + number + '" class="text-number" maxlength="2" value="' + number + '" />').
            appendTo(textAreaDiv).
            on('keyup', function () {
                var value = $(this).val();
                //TODO: преобразовать в число
                playerVM.player.number = value;
                $(playerVM.fieldView.numberDiv).text(value);
            });
        $('<input type="text" id="lastname-for-player-' + number + '" class="text-lastname" value=""/>').
            appendTo(textAreaDiv).
            on('keyup', function () {
                var value = $(this).val();
                playerVM.player.name = value;
                $(playerVM.fieldView.nameDiv).text(value);
            });
    };

    $(document).ready(init);

})(jQuery);