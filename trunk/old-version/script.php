<?php
$playerlist=file("players_loko.txt");
$i=0;
foreach ($playerlist as $playerstring){
$players[$i]=explode("*",$playerstring);
$i++;
}
?>
<script>
var projects = [
<?foreach ($players as $player){?>
			{
				value: "<?=$player[2];?>",
				number: "<?=$player[3];?>",
				name: "<?=$player[1];?>",
				icon: "<?=$player[0];?>"
			},
<?;}?>
		];
	$(function() {
	<?php
	for($i=1; $i<12; $i++){
	?>
		  $("#name<?=$i;?>").keyup(function(event) {
          var str = $("#name<?=$i;?>").val();
          $( "#player<?=$i;?>name" ).text( str );
		  var widthDiv=$( "#player<?=$i;?>name" ).width();
		  if (widthDiv>35){
		  $( "#player<?=$i;?>" ).width(widthSpan);}
        })
		  $("#number<?=$i;?>").keyup(function(event) {
          var str = $("#number<?=$i;?>").val();
          $( "#player<?=$i;?>number" ).text( str );
        })		
		
		
		$( "#name<?=$i;?>" ).autocomplete({
			minLength: 0,
			source: projects,
			focus: function( event, ui ) {
				$( ".name" ).val( ui.item.value );
				return false;
			},
			select: function( event, ui ) {
				$( "#name<?=$i;?>" ).val( ui.item.value );
				$( "#player<?=$i;?>name" ).text( ui.item.value );
				$( "#number<?=$i;?>" ).val( ui.item.number );
				$( "#player<?=$i;?>number" ).text( ui.item.number);
				$( "#icon<?=$i;?>" ).html('<img src="players_loko/'+ui.item.icon+'">');
				return false;
			}
		})
				.data( "autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.autocomplete", item )
				.append( "<a><img src=players_loko/"+item.icon+" style='float:left; height:25px; padding-right:3px;'>" + item.name + " " + item.value + "</a>" )
				.appendTo( ul );
		};
	
		function position<?=$i;?>( using ) {
			$( "#player<?=$i;?>" ).position({
				of: $( "#parent" ),
				my: 'left top',
				at: 'left top',
				using: using,
				collision: 'fit fit'
			});
		}
		$( "#player<?=$i;?>" ).draggable({
			containment: "#parent", scroll: false, 
			drag: function( event, ui ) {
				$( "#offset<?=$i;?>" ).val( "0" );
				position<?=$i;?>(function( result ) {
				$left<?=$i;?>= ui.position.left - result.left;
				$top<?=$i;?>=ui.position.top - result.top;
					$( "#player<?=$i;?>positionX" ).val( $left<?=$i;?>);
					$( "#player<?=$i;?>positionY" ).val( $top<?=$i;?>);
					position<?=$i;?>();
				});
			}
		});	
	<?php;}?>	
	$('#colorpickerField1, #colorpickerField2').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$('.positionable').css('backgroundImage', "url(drawplayer.php?c1="+$('#colorpickerField1').val() +"&c2="+$('#colorpickerField2').val() +")");
		$('.number').css('color',$('#colorpickerField2').val());
		$(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);
});
	});

	</script>