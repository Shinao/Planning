<span class="menuTool">
<script type="text/javascript">
    $(document).ready(function () {
    	$('#modifyGuestPass').on('click', function()
    	{
    		loadDialog('dialogModifyGuestPass');
    	});
    	$('#modifyPlanning').on('click', function()
    	{
    		loadDialog('dialogModifyPlanning');
    	});
    	$('#deletePlanning').on('click', function()
    	{
    		loadDialog('dialogDeletePlanning');
    	});
    });
</script>
<div id="textTool">
	<button type="submit" id="modifyGuestPass" class="standard">
        <img src="img/textfield_key.png" class="verticalized"/>
        Modifier le mot de passe invit&eacute;
    </button><br/><br/>
	<button type="submit" id="modifyPlanning" class="standard">
        <img src="img/page_table_32.png" class="verticalized"/>
        Modifier le nom du Planning
    </button><br/><br/>
    <button type="submit" id="deletePlanning" class="negative">
        <img src="img/cross.png" class="verticalized"/>
        Supprimer le Planning
    </button>
</div>
</span>
