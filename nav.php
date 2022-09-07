<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style_css.css" />
</head>
<body>
	
</body>
</html>
&nbsp;
	<div style="display: flex;align-items: center;">
		&nbsp;&nbsp;&nbsp;<img width="200" height="200" src="logobrief.png" style="margin-left:-30px; margin-top:-70px;">
 		<input id="rech" type="text" name="rech"style="margin-top:-60px; margin-left:-20px;">
		 <iconify-icon icon="ph:microphone" style="color: teal;margin-left: -110px;margin-bottom: -5px;margin-top:-60px;" width="30" height="30"></iconify-icon>
 		<!-- <img style="" src="images/micro.png"> -->
		 <iconify-icon icon="fluent:search-visual-24-filled" style="color: teal;margin-left: 2px;margin-bottom: -5px;margin-top:-60px;" width="30" height="30"></iconify-icon>
 		<!-- <img style="" src="images/camera.png"> -->
		 <iconify-icon icon="radix-icons:magnifying-glass" width="30" height="30" style="color: teal;margin-left: 3px;margin-bottom: -4px;margin-top:-60px;"></iconify-icon>
 		<!-- <img style="" src="images/loupe.png"> -->
 		<input type="button" name="connexion" id="connexion" value="connexion" style="margin-top:-60px;">
 		&nbsp;<iconify-icon icon="eva:menu-fill" width="30" height="30"style="margin-top:-60px;"></iconify-icon>
		 <!-- <img src="images/parametre.png" > */ -->
	</div><br>

	<!--div de la 2eme ligne-->
	<div style="display: flex;align-items: center;"class="container">

		<div style="display: flex;align-items: center; font-size:small;margin-top:-120px;">
		<nav>
		<a style="position:absolute; left:10px; top:120px;" id="tout" href="index.php">TOUT</a>
		<a style="position:absolute; left:180px;top:120px;"id="actu" href="#">ACTUALITES</a>
		<a style="position:absolute; left:280px;top:120px;" id="imag" href="index.php?page=A">IMAGES</a>
		<a style="position:absolute; left:360px;top:120px;"id="videos" href="#">VIDEOS</a>
		<a style="position:absolute; left:430px;top:120px;"id="cartes" href="#">CARTES</a>
        <a id="publication" href="index.php?page=B" style=" color: black;position:absolute; left:520px;top:120px;">PUBLICATION</a>	
        <!-- <div class="animation start-home"></div> -->
		</nav>
	  </div>

	 
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <!-- faire le filtre -->
     <form action="index.php?page=C" method="POST">
	 <div style="display: flex;align-items: center; font-size:small;position:absolute; left:920px;top:120px;">
	 <p style="position:absolute;top:0px;left:0px;color:black;">Type </p> 
	 <p style="position:absolute;left:30px;top:0px;color:black;">de</p> 
	 <p style="position:absolute;left:50px;top:0px;color:black;">publication:</p> &nbsp;	 	 
	 <!-- <select onchange="this.form.action='index.php?page=A&p='+this.option[this.selectedIndex].value;this.form.submit()"id="choice" name="choice" style="border-style: none;font-weight: bold;"> -->
	 <select id="choice" name="choice" style="border-style: none;font-weight: bold;position:absolute;left:117px;">
	 <!-- <option value="not" selected="selected"></option> -->
	 	<option value="Restaurant">Restaurant</option>
	 	<option value="Conseil">Conseil</option> 
	 	<option value="Recette">Recette</option> 
		 <option value="Retour d'expérience">Retour d'expérience</option>
	 </select>
	
	 &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"name="filtre"style="border:none;background-color:white;position:absolute;left:270px;">Filtre <img style="position:absolute; left:40px;" src="images/filtre.png"></button>
	 	</div>
	</form>
	</div>
</div>
