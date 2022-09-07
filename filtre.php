
<!-- <form action="index.php?page=A" method="POST">
	 <div style="display: flex;align-items: center; font-size:small;margin-top:-70px;">
	 Type de publication: &nbsp;	 	 
	 <select onchange="this.form.action='index.php?page=A&p='+this.option[this.selectedIndex].value;this.form.submit()"id="type_pub" name="type_pub" style="border-style: none;font-weight: bold;">
	 <option value="not" selected="selected"></option>
	 	<option value="Restaurant">Restaurant</option>
	 	<option value="Conseil">Conseil</option> 
	 	<option value="Recette">Recette</option> 
		 <option value="Retour">Retour d'expérience</option>
	 </select>
	</form> -->


<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "utilisateurs";

// $conn = mysqli_connect($servername, $username, $password, $dbname);

// if(!$conn){
//     die("connection failed: " . mysqli_connect_error());
// }
// if(isset($_POST['choice'])){
//     $choice = addslashes($_POST['choice']);
    
    
//    }
   

// $req = "SELECT * FROM plats WHERE choice='Restaurant' ORDER BY id DESC";

// $result = mysqli_query($conn, $req);

// if(mysqli_num_rows($result) >0){
//   while($row =mysqli_fetch_assoc($result)){?>
   <?php ?>
<!-- //    <div>
//     <a href="index.php?page=A&<?=$row['id']?>">
//     <div>
//         <img src="<?=$row["image"]?>" alt="">
//         <div>
//             <h6><?php echo "Publié le " . $row["date_de_publication"];?></h6>
//             <h5><?php echo $row["message"];?></h5>
//         </div>

//     </div>
// </a>
//    </div> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    
</head>

     <?php 
           
//     }
    
// }else{
//         echo " Désolé, il n'y a pas de publication";
//     }
//     mysqli_close($conn);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "utilisateurs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$choice=addslashes($_POST['choice']);

// $id_pub=$_GET['id'];
if(isset($_POST['filtre'])){
    
    $choice=addslashes($_POST['choice']);
}
 //Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 $req = "SELECT * FROM plats WHERE choice='$choice' ORDER BY id DESC";
    $result = mysqli_query($conn, $req);

    if (mysqli_num_rows($result) > 0) {
        while ($image = mysqli_fetch_assoc($result)) { ?>

<div class="im">
                <a href="index.php?page=<?= $image['id'] ?>">
                <div class="overlay1">
        <p class="info">1024 x 768 - jpeg <br> images.toucharger.com</p>   
        <img class="plus" src="images/img_plus.png" alt="">
                </div>
                    <img class="image" src="<?php echo $image['url'] ?>">
        
                    <h5><?php echo $image['name'] ?></h5>
                    publié le : <?php echo $image['date_de_publication'] ?>
                </a>
            </div>

     <?php  } }?>

     <nav aria-label="Page navigation example" style="position: relative;
   left: 0; bottom: 0; top:15px;width: 100%; color: white; text-align: center;">
        <ul class="pagination">
            <a class="page-link" style="width:100%;">
                <form action="index.php?page=A" method="POST">

                    <button name="envoi" method="POST" style="border-style: none;">voir plus...</button>
                </form>
            </a>
        </ul>
</nav>

<script>
     $(document).ready(function(){
         $('.im').slice(0,10).show();
         $('.page-link').on('click',function(){

            $('.im:hidden').slice(0,10).slideDown('slow');
            if($('.im:hidden').length == 0){
                $(this).fadeOut('slow');
            }
            $('html,body').animate({
                scrollTop: $(this).offset().top
            },500);
            return false;
         });
     });
</script>

<style>
    .info{
            font-size: small;
            position:absolute;
            top:142px;
            color:white;
        }

        .overlay1{
            position:absolute;
            width:220px;
  height:180px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
    opacity:0;
    transition: .5s ease;
    box-shadow: inset 0 -60px 10px 4px rgba(0, 0, 0, 0.5);      
  }
        .im:hover .overlay1{
            opacity:1;
            color:black;
   cursor:pointer;
   box-shadow: inset 0 -60px 10px 4px rgba(0, 0, 0, 0.5);        
}
.plus{
    position:absolute;
    left:180px;
}
    .image {

width: 220px;
height: 180px;
border: 1px solid white;
border-radius: 10px;
border-bottom-left-radius: 0px;
border-bottom-right-radius: 0px;

}

.im {
justify-content: center;
/*align-items:stretch;*/
border: 1px solid white;
border-radius: 10px;
width: 220px;
display: none;
position:relative;
top:15px;
/*height:250px;*/
margin-top: 45px;
margin-left: 25px;
box-shadow: 0 1px 3px 1px rgba(201, 201, 201, 0.5);
}

h5 {
font-size: medium;
}

a {

text-decoration: none;
color: black;
}
</style>