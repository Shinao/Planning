<script>
		$().ready(function() {
			$('#planning').draggable({ cancel: '#text', scroll: false});
		});
</script>
<div id="planning">
    <div id="title">Planning</div>
	<div id="text"><?php if(!isset($_SESSION['currentPlanningId']) || $_SESSION['currentPlanningId'] == -1)
		echo 'Veuillez charger un planning.';
	?>
	</div>
</div>
