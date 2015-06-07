<?php include "header1.php" ?>
 <head>

		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/header1.css" rel="stylesheet">
		<link href="../css/buttons.css" rel="stylesheet">
		<link href="../css/formulaires.css" rel="stylesheet">

  </head>
  
		<div class=" form-log">

			<form id="id_form" action="traiter.php" method="post">
			 <div id="title-form">
			 <h2> Se Connecter </h2><br />
			 </div>
			 <p class="data-form">
						<b> E-mail  :</b><br />
						<input type="email" name="email" value="" />
				</p>

				<p class="data-form">
						<b> Mot de passe  :</b><br />
						<input type="password" name="pass" value="" />
				</p>
				
				<p   class="data-form">
						<input type="submit" value="connexion" /> 
			   </p>
		   
		</div>
		<div class="circle-logo"></div>
		
		