<script type="text/javascript">
$().ready(function()
{
  $("#dialogExportImport").dialog({
    autoOpen: false,
      modal: true,
      buttons: {
	"Quitter": function() {
	  $(this).dialog( "close" );
	}
      },
	close: function() {
	}
  }).draggable();
});
</script>
<div id="dialogImportExport" class="ui-widget" title="Importer/Exporter">
	<form id="frmImportExport">
<span class="btnTool btnImport" enable="disable">
	      <img class="resizedImgPlanning" src="img/import.png"/>Importer</span><span class="btnTool btnExport" enable="disable"><img class="resizedImgPlanning" src="img/export.png"/>Exporter</span><input id="fileupload" type="file" name="file"/>
	<input style="margin-top: 8px;" type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
	</form>
</div>

