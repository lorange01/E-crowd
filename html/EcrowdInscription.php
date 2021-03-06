

	<html lang="fr" class="no-js">
		<head>
			<meta charset="UTF-8" />
			<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
			<meta name="viewport" content="width=device-width, initial-scale=1"> 
			<title>Ecrowd inscription</title>
			<link rel="icon" type="images/ico" href="../images/icon-Ecrowd.ico" />
			
			<link rel="stylesheet" type="text/css" href="../css/normalize-Ecrowd_formulaire.css" />
			<link rel="stylesheet" type="text/css" href="../css/demo-Ecrowd_formulaire.css" />
			<link rel="stylesheet" type="text/css" href="../css/component-Ecrowd_formulaire.css" />
			<link rel="stylesheet" type="text/css" href="../css/cs-select.css" />
			<link rel="stylesheet" type="text/css" href="../css/cs-skin-boxes.css" />
			<script src="../js/js-Ecrowd_inscription/modernizr.custom.js"></script>
		</head>
		<body>
			<div class="container">
			<div class="row" style=" background-image:url(../images/images_png/lowpoly.png); height:6px; "></div>
				<div class="fs-form-wrap" id="fs-form-wrap">
					<div class="fs-title">
						<div class="row">
							<div class="col-xs-3">
							<img id="circle_log" src="../images/images_png/logo-menu.png"/>
							</div>
						<br/>	
						<div class="row">
						<div class="col-xs-12" style="text-align:center; ">
						<h3 style="font-size: 50px;">Inscription en quelques clics</h3>
						</div>
						</div>
						</div>
						
						
						
					</div>
					<form id="myform" class="fs-form fs-form-full" autocomplete="off" method="post">
										
						<ol class="fs-fields">
							<li>
								<label class="fs-field-label fs-anim-upper" for="q1">Ton Nom</label>
								<input class="fs-anim-lower" id="q1" name="nom" type="text" placeholder="..." required/>
							</li>
							<li>
								<label class="fs-field-label fs-anim-upper" for="q1">Ton Prénom</label>
								<input class="fs-anim-lower" id="q1" name="prenom" type="text" placeholder="..." required/>
							</li>
							<li>
								<label class="fs-field-label fs-anim-upper" for="q1">Choisis un Pseudo</label>
								<input class="fs-anim-lower" id="q1" name="pseudo" type="text" placeholder="..." required/>
							</li>
							<li>
								<label class="fs-field-label fs-anim-upper" for="q2" data-info="nous ne vous enverons pas de :')'!">Ton Adresse Mail</label>
								<input class="fs-anim-lower" id="q2" name="q2" type="email" placeholder="...@road..." required/>
							</li>
							<li>
								<label class="fs-field-label fs-anim-upper" for="q2" data-info="Nous ne l'utiliserons pas à des fin commerciale!!">Entrez un Mot de Passe</label>
								<input class="fs-anim-lower" id="q2" name="q2" type="password" placeholder="" required/>
							</li>
							<li>
								<label class="fs-field-label fs-anim-upper" for="q2" data-info="Nous ne l'utiliserons pas à des fin commerciale!!">Resaisissez votre  Mot de Passe</label>
								<input class="fs-anim-lower" id="q2" name="req2" type="password" placeholder="" required/>
							</li>
							<li data-input-trigger>
								<label class="fs-field-label fs-anim-upper" for="q3" data-info="This will help us know what kind of service you need">Quel est votre profil?</label>
								<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
									<span><input id="q3b" name="q3" type="radio" value="conversion"/><label for="q3b" class="radio-conversion">Developpeur</label></span>
									<span><input id="q3c" name="q3" type="radio" value="social"/><label for="q3c" class="radio-social">Designer</label></span>
									<span><input id="q3a" name="q3" type="radio" value="mobile"/><label for="q3a" class="radio-mobile">Webmarketing</label></span>
									
									<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
									<span><input id="q3b" name="q3" type="radio" value="conversion"/><label for="q3b" class="radio-conversion">Gestion de projet</label></span>
									<span><input id="q3c" name="q3" type="radio" value="social"/><label for="q3c" class="radio-social">Communication</label></span>
									<span><input id="q3a" name="q3" type="radio" value="mobile"/><label for="q3a" class="radio-mobile">Réseaux</label></span>
								</div>
								</div>
							</li>
						</ol><!-- /fs-fields -->
						<button class="fs-submit" type="submit">Enregistrer</button>
					</form><!-- /fs-form -->
				</div><!-- /fs-form-wrap -->

				<!-- Related demos -->

			<div class="row" style=" background-image:url(../images/images_png/lowpoly.png); height:6px; "></div>
			</div><!-- /container -->
			
			<script src="../js/js-Ecrowd_inscription/classie.js"></script>
			<script src="../js/js-Ecrowd_inscription/selectFx.js"></script>
			<script src="../js/js-Ecrowd_inscription/fullscreenForm.js"></script>
			<script>
				(function() {
					var formWrap = document.getElementById( 'fs-form-wrap' );

					[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
						new SelectFx( el, {
							stickyPlaceholder: false,
							onChange: function(val){
								document.querySelector('span.cs-placeholder').style.backgroundColor = val;
							}
						});
					} );

					new FForm( formWrap, {
						onReview : function() {
							classie.add( document.body, 'overview' ); // for demo purposes only
						}
					} );
				})();
			</script>
			
		<?php
			if(!empty($_POST['pseudo']))
			{
			// D'abord, je me connecte à la base de données.
			mysql_connect("localhost", "root", "");
			mysql_select_db("ecrowd");

			// Je mets aussi certaines sécurités ici…
			$passe = mysql_real_escape_string(htmlspecialchars($_POST['passe']));
			$passe2 = mysql_real_escape_string(htmlspecialchars($_POST['passe2']));
			if($passe == $passe2)
			{
			$pseudo = mysql_real_escape_string(htmlspecialchars($_POST['pseudo']));
			$email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
			// Je vais crypter le mot de passe.
			$passe = sha1($passe);

			mysql_query("INSERT INTO validation VALUES('', '$pseudo', '$passe', '$email')");
			}
			 
			else
			{
			echo 'Les deux mots de passe que vous avez rentrés ne correspondent pas…';
			}
			}
		?>
		</body>
	</html>
