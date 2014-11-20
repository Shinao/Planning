<div id="frmLoginGroup">
	<script>
		$().ready(function() {
			$("#pseudo").focus();

			function checkForm()
			{
				if($('#pseudo').val().length == 0 || $('#pw').val().length == 0)
				{
					if($('#pseudo').val().length == 0)
						$('#pseudo').addClass('error');
					if($('#pw').val().length == 0)
						$('#pw').addClass('error');
					return false;
				}
				else
				{
					if($('#pseudo').hasClass('error'))
						$('#pseudo').removeClass('error');
					if($('#pw').hasClass('error'))
						$('#pw').removeClass('error');
					return true;
				}
			}

			function checkXml(xml, guest)
			{
				var racine = xml.firstChild;
				if (racine.nodeName == "success")
				{
					$('#frmLoginGroup').remove();
					$.get('php/frmMenu.php', function(data)
					{
						$('#header').append(data);
					});
					$('#displayContentContainer').load('php/frmPlanning.php', function()
					{
						$('#planning').draggable({ cancel: '#text'});
					});
					if(guest == 'false')
						loadLoggedForms();
				}
				else if (racine.nodeName == "error")
				{
					displayPopup("error", racine.firstChild.nodeValue);
				}
				else
				{
					displayPopup("error", "R&eacutecup&eacuteration des informations de la base de donn&eacutees impossible " + racine.nodeValue);
				}
			}

			$("#normalLogin").click(function()
			{
				if(checkForm())
				{
					$.ajax(
					{
					    type: "POST",
						url: "api/checkLogin.php",
						data: $('#frmLogin').serialize(),
						success: function(xml){
							checkXml(xml, 'false');
						},
						error : function(msg)
						{
						   displayPopup("error", "Impossible de vérifier les identifiants");
						}
					});
				}
				return false;
			});

			$("#guestLogin").click(function()
			{
				if(checkForm())
				{
					$.ajax(
					{
					    type: "POST",
						url: "api/checkGuest.php",
						data: $('#frmLogin').serialize(),
						success: function(xml){
							checkXml(xml, 'true');
						},
						error : function(msg)
						{
						   displayPopup("error", "Impossible de vérifier les identifiants");
						}
					});
				}
				return false;
			});
		});
	</script>
	<form action="" method="post" id="frmLogin">
	    <input name="login" id="pseudo" placeholder="Pseudo" value="" type="text"/>
	    <input name="pw" id="pw" placeholder="Mot de passe" value="" type="password"/>
	    <button id="normalLogin" type="submit" class="standard">
	        <img src="img/textfield_key.png"/>
	        Connexion
	    </button>
	    <button id="guestLogin" type="submit" class="standard">
	        <img src="img/textfield_key.png"/>
	        Connexion en tant qu'invit&eacute;
	    </button>
	</form>
</div>