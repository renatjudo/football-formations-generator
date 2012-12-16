(function ($) {

    var counter = 1;

    var model = {
        players: []
    };

    var init = function () {
		$('#grid-on-off').attr("checked","checked");
        $('#add-player').button().click(function () {
            if (counter > 11)
                return;

            createPlayer(237, 169, counter, '');
        });

        //TODO: убрать после отладки
        $('#debug-show-data').button().click(function () {
            $('#debug-data').html(JSON.stringify(model));
        });
		
		$('#grid-on-off').click(function () {
               if ($('#grid-on-off').attr("checked")=="checked") {
			   $(".tactics-field-player").draggable({
			    containment: "parent",
                cursor: "pointer",
                grid: [24, 32],
                scroll: false
			   });
			   }
			   else {
			   $(".tactics-field-player").draggable({
			   	containment: "parent",
                cursor: "pointer",
                grid: [1, 1],
                scroll: false
			   });
			   }
			   
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
		if ($('#grid-on-off').attr("checked")=="checked"){
		var gridX=24;
		var gridY=32;
		}
		else{
		gridX=1;
		gridY=1;
		}
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
                grid: [gridX, gridY],
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