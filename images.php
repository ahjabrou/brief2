<?php
include("publicationdb.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
    <title>Images</title>
</head>

<body>
    <?php
    //SELECT * FROM maTable WHERE id=<idSelect>
    $req = "SELECT * FROM plats ORDER BY id DESC";
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

    <?php }
    } ?>

    <nav aria-label="Page navigation example" style="position: relative;
   left: 0; top: 15px; width: 100%; color: white; text-align: center;">
        <ul class="pagination">
            <a class="page-link" style="width:1260px;">
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

    <?php
    
    
    //SELECT * FROM maTable WHERE id=<idSelect>
    // if (isset($_POST['envoi'])) {
    //     $req = "SELECT * FROM plats ORDER BY id DESC LIMIT 10, 10";
       
    //     $result = mysqli_query($conn, $req);
    // }


    // if (mysqli_num_rows($result) > 0) {
    //     while ($image = mysqli_fetch_assoc($result)) { ?>
<!-- 
    //         <div class="im">
    //             <a href="index.php?page=<?= $image['id'] ?>">
    //                 <img class="image" src="<?php echo $image['url'] ?>">
    //                 <h5><?php echo $image['name'] ?></h5>
    //                 publié le : <?php echo $image['date_de_publication'] ?>
    //             </a>
    //         </div> -->

    <?php 
     ?>




    <style> 
        .info{
            color:white;
            font-size: small;
            position:absolute;
            top:142px;
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
            /*height:250px;*/
            position:relative;
            top:15px;
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


</body>

</html>