<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>welikefood</title>
  <link rel="stylesheet" type="text/css" href="style_css.css" />

  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1,maximum-scale=1" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

</head>

<body>

  <?php
  include("nav.php");
  ?>


  <!--fin div de la 2eme ligne-->

  <!--trait de separation-->

  <div>
    <hr style="margin-top: -55px;width:1253px;">
  </div>

<?php
include("carousel.php");
?>


 





  <!--3 eme ligne-->
  <div style="display: flex;align-items: center; flex-wrap:wrap;">
  <?php 
       if(isset($_GET['error'])): ?>
         <p><?php echo $_GET['error']; ?></p>
         <?php endif ?>
<?php
if(isset($_GET["page"])){
  $page = $_GET["page"];
  if($page == "A"){
    include("images.php");
  }else if($page == "B"){
    include("partage.php");
  }else if($page == "C"){
    include("filtre.php");
  }else{
    include("view.php");
  }
 }
?>



    <!--commentaire-->
    <!-- <div class="commentaire" id="commentaire">
      <a style="margin-top: 5px;" href="#">
        <img style="float: left;border: 0;
    height: 14px;
    margin: 0 5px -4px 0;
    width: 14px;
    display: inline;
    margin-top: 8px;
    " src="images/commentaire.jpg">
        <div>commentaire</div>
      </a>
    </div> -->
    <!--fin commentaire-->


</body>

</html>