(function ($) {

	var gridXY = new Array (24,32);
    var counter = 1;
    var model = {
        players: []
    };
	var team = {
        playersVM: []
    };

	
	
    var init = function () {
		$('#grid-on-off').attr("checked","checked");
        $('#add-player').button().click(function () {
            if (counter > 11)
                return;
			
            createPlayer(237, 169, gridXY, counter, '');
        });

        //TODO: убрать после отладки
        $('#debug-show-data').button().click(function () {
            $('#debug-data').html(JSON.stringify(model));
        });
		
		$('#grid-on-off').click(function () {
			gridXY=getGrid();
			$(".tactics-field-player").draggable({
            grid: [gridXY[0], gridXY[1]],
			});
        });
    };

    var createPlayer = function (x, y, gridXY, number, name) {

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

        createPlayerFieldView(playerVM, x, y, gridXY, number, name);

        createTextField(counter, playerVM);
        counter++;
    };

    var createPlayerFieldView = function (playerVM, x, y, gridXY, number, name) {

        var fieldView = {
            'numberDiv': null,
            'nameDiv': null
        };
		gridXY=getGrid();
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
                grid: [gridXY[0], gridXY[1]],
                scroll: false,
				stop: function (){
				playerVM.player.x=$(this).css('left');
				playerVM.player.y=$(this).css('top');
				}
            });

        fieldView.numberDiv = $('<div class="tactics-field-player-number">' + number + '</div>').appendTo(playerDiv);
        fieldView.nameDiv = $('<div class="tactics-field-player-name">' + name + '</div>').appendTo(playerDiv);

        playerVM.fieldView = fieldView;
		team.playersVM.push(playerVM);
		
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

	var getGrid = function (){
		if ($('#grid-on-off').attr("checked") != "checked") {
				var gridXY = new Array(1,1);
			}
		else{
				var gridXY = new Array(24,32);
			}
		return gridXY;
	}
	
    $(document).ready(init);

})(jQuery);