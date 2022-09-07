<?php
include("publicationdb.php");
?>
<?php
//pour faire afficher les images et leurs différentes informations
 $id=$_GET['page'];
 $req = "SELECT * FROM plats WHERE id=$id ORDER BY id DESC";
 $result = mysqli_query($conn, $req);

 // pour que le nombre de likes et de dislikes puissent s'afficher 

 $likes = "SELECT * FROM likess WHERE id_plat=$id";
 $likes=mysqli_query($conn, $likes);
 if(mysqli_num_rows($likes)>0 AND $rowlikes =mysqli_fetch_assoc($likes)){
        $likes=mysqli_num_rows($likes);
        echo "<p style=position:absolute;left:300px;top:520px;color:white;border-style:solid;border-color:blue;border-radius:60px;width:40px;padding-left:7.3px;height:40px;padding-top:5px;background-color:blue;>$likes</p>";
        
 }
 $dislikes = "SELECT * FROM dislikes WHERE id_plat=$id";
 $dislikes=mysqli_query($conn, $dislikes);
 if(mysqli_num_rows($dislikes)>0 AND $rowdislikes =mysqli_fetch_assoc($dislikes)){
     $dislikes=mysqli_num_rows($dislikes);
     echo "<p style=position:absolute;left:460px;top:520px;color:white;border-style:solid;border-color:red;border-radius:60px;width:40px;padding-left:7.3px;height:40px;padding-top:5px;background-color:red;>$dislikes</p>";
     
 }

 // pour que les images et leurs informations puissent s'afficher lorsqu'on clique sur l'image

 if (mysqli_num_rows($result) > 0) {
     while ($image = mysqli_fetch_assoc($result)) { ?>
  
         <!--affichage des images, leurs informations et les like et dislike  -->

         <a href="index.php?page=<?=$image['id']?>">
         <h3><?php echo $image['choice'] ?></h3>
         <div class="im">
                 <img class="image" src="<?php echo $image['url'] ?>">
                </div>
            </a>
                 <h5><?php echo $image['name'] ?></h5>
                 <p class="message"><?php echo $image['message'] ?></p>
                 <p class="dat">publié le : <?php echo $image['date_de_publication'] ?></p>

                 <!-- boutons like et dislike -->
<a href="action.php?t=1&id=<?php echo $id?>">
   <iconify-icon class="icon" icon="ant-design:like-twotone"style="color: blue;"width="30" height="30" alt="like">like</iconify-icon>
</a>

<a href="action.php?t=2&id=<?php echo $id?>">
   <iconify-icon class="icon1" icon="ant-design:dislike-twotone" style="color: red;" width="30" height="30" alt="dislike">dislike</iconify-icon>
</a>


<!-- Formulaire de commentaire -->
<form action="comment.php?id=<?=$id ?>" method="POST">
<input class="commenter" name="commentaire" placeholder="commentaire..." maxlength="300">
<button type="submit" class="com" name="commenta"><a href="index.php?page=<?php echo $id?>"><img class ="comment" src="oval-black-speech-bubble.png" alt=""></a></button>
     </form>


 <?php }
 } ?>



<style>
    .com{
        border:none;
        
        
    }
    .commenter{
        position:absolute;
        left:250px;
        top:565px;
        border: 1.5px solid #36b;
        border-radius: 15px;
        padding-left:10px;
        width: 600px;
        height:80px;

        }
    .comment{
        width:70px;
        position:absolute;
        top:565px;
        left:850px;
    }
    
    .icon{
        position:absolute;
        top:520px;
        left:345px;
    }
    .icon1{
        position:absolute;
        top:525px;
        left:420px;
    }
    .im{
        border: 2px solid greenyellow;
        border-radius: 35px;
        position:absolute;
        left: 250px;
        top:320px;
        width: 300px;
        height:200px;
    }
    
    .image{
        width: 75%;
        height: 75%;
        margin-left: 35px;
        margin-top:20px;
        align-items: center;
        
    }  
    h3{
        position:absolute;
        top:280px;
        left:500px;
        color:#008518;
        text-decoration: none;
    }
    .message{
        color:black;
        position:absolute;
        top:380px;
        left:565px;
    }
    h5{
        position:absolute;
       top:340px;
        left:565px;
        color:#3551EC;
    }
    p{
        color:#596CE5;
        position:absolute;
        top: 500px;
        left:565px;
        
    }
    .dat{
        font-weight:normal;
    }
 a{
    text-decoration: none;
    color: black;
 }
 </style>



<?php
if(isset($_GET['id']) AND !empty($_GET['id'])){
     
//     $req = "SELECT id FROM likess WHERE id_plat=?";
//     $result = mysqli_query($conn, $req);
//    $likes=(int)$_GET['likes'];
$likes=$conn->prepare('SELECT id FROM likess WHERE id_plat = ?');
$likes->execute(array($id));
// $likes = $likes->rowCount();

// $dislikes=(int)$_GET['dislikes'];
$dislikes=$conn->prepare('SELECT id FROM dislikes WHERE id_plat = ?');
$dislikes->execute(array($id));
// $dislikes = $dislikes->rowCount();
}
?>





  








