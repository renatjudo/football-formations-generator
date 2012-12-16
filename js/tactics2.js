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

 var counter=1;
	$('#add-player').click(function() {
		if (counter>11) {
			exit();
		}
		createPlayer(240, 160, counter, '');
		createTextField(counter);
		counter=counter+1;
	});
	
    var init = function() {
        $('.tactics-field-player').draggable(playerDragOptions);

/*
        createPlayer(240, 160, 23, 'Аршавин');
        createPlayer(58, 60, 8, 'Самир Насри');
        createPlayer(58, 160, 29, 'Халк');
        createPlayer(58, 260, 9, 'Роналдо Луис Назарио де Лима');
*/    };

    var createPlayer = function(x, y, number, name) {

        var playerDiv = $('<div class="tactics-field-player" id="player'+number+'"></div>').appendTo($('.tactics-field'));
        playerDiv.append('<div class="tactics-field-player-number">' + number +  '</div>');
        playerDiv.append('<div class="tactics-field-player-name">' + name + '</div>');
        playerDiv.css({
            'position': 'absolute',
            'left':x,
            'top': y
        });
		playerDiv.draggable(playerDragOptions);
	};	
	
	var createTextField = function(number) {

        var textAreaDiv = $('<div class="text-fields" id="'+number+'"></div>').appendTo($('.text-area'));
        textAreaDiv.append('<input type="text" id="number-for-player-'+number+'" class="text-number" maxlength="2" value="'+number+'" onChange="textChange('+number+')"/>');
        textAreaDiv.append('<input type="text" id="lastname-for-player-'+number+'" class="text-lastname" value="" onChange="textChange('+number+')"/>');
		
    };
	

	$(".text-number").live('keyup', function() {
         id=this.parentNode.id;
		 var str=$(this).val();
		 $("#player"+id+" > .tactics-field-player-number").text(str);
	});
		$(".text-lastname").live('keyup', function() {
         id=this.parentNode.id;
		 var str=$(this).val();
		 $("#player"+id+" > .tactics-field-player-name").text(str);
	});

			
    $(document).ready(init);

})(jQuery);