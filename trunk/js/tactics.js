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
		$('select option:first').attr('selected',true);
	
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
		$('#formations').change(function() {
			clearField();
			model = {players: []};
			var id=$("#formations :selected").val();
			//Здесь мы должны обновлять json-модель, взятую из базы через аякс. 
			$.getJSON("sql-formations.php",
			  {
				id: id
			  },
			  function(data) {
				var obj=data;
				gridXY=getGrid();
				for each (var player in obj.players){
				createPlayer (player.x, player.y, gridXY, player.number, player.name);
				}
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

        createTextField(number, playerVM);
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
					$('.json').val(JSON.stringify(model));
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
            on({
				keyup: function() {
					var value = $(this).val();
					//TODO: преобразовать в число
					playerVM.player.number = value;
					$(playerVM.fieldView.numberDiv).text(value);
				},
				keydown: function(event) {
					// Разрешаем: backspace, delete, tab и escape
					if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 ||
					// Разрешаем: Ctrl+A, Ctrl+R
					((event.keyCode == 65 || event.keyCode == 82) && event.ctrlKey === true) ||
					// Разрешаем: home, end, влево, вправо
					(event.keyCode >= 35 && event.keyCode <= 39)) {
						// Ничего не делаем
						return;
					}
					else {
						if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
							event.preventDefault();
						}  
					}
					$('.json').val(JSON.stringify(model));
				}
			});
			
        $('<input type="text" id="lastname-for-player-' + number + '" class="text-lastname" value=""/>').
            appendTo(textAreaDiv).
            on('keyup', function () {
                var value = $(this).val();
                playerVM.player.name = value;
                $(playerVM.fieldView.nameDiv).text(value);
				$('.json').val(JSON.stringify(model));
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
	
	var clearField = function (){
		$(".tactics-field-player").remove();
		$(".text-fields").remove();
	}
    $(document).ready(init);

})(jQuery);