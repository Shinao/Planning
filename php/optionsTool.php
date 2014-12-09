<span class="menuTool">
<script type="text/javascript">
    $(document).ready(function () {
    	$('#modifyPass').on('click', function()
    	{
    		loadDialog('dialogModifyPass');
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
	<button type="submit" id="modifyPass" class="standard">
        <img src="img/textfield_key.png" class="verticalized"/>
        Modifier les mots de passe
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
