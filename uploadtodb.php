<?php
  if (isset($_POST['submit']) && isset($_FILES['image'])) {
   include('publicationdb.php');
       echo "<pre>";
       print_r($_FILES['image']);
       echo"</pre>";

      $img_name = $_FILES['image']['name'];
      $img_size = $_FILES['image']['size'];
      $tmp_name = $_FILES['image']['tmp_name'];
      $error = $_FILES['image']['error'];
     

     if($error === 0){
              if($img_size > 60000){
                 echo "sorry, your file is too large.";
                 header('location:index.php?error=sorry, your file is too large.');
             }else{
                 $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                 $img_ex_lc = strtolower($img_ex);

                 $allowed_exs = array("jpg","jpeg","png");

                 if(in_array($img_ex_lc, $allowed_exs)){
                    $randomno=rand(0,100000);
                    $rename='upload'.date('ymd').$randomno;
                    $new_img_name = $rename.'.'.$img_ex;
                    $img_upload_path = "./upload/".$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    
                    if(isset($_POST['name'])){
                        $name= addslashes($_POST['name']);

                    }
                    if(isset($_POST['message'])){
                        $message=addslashes($_POST['message']);
                    }
                    if(isset($_POST['choice'])){
                               $choice = addslashes($_POST['choice']);
                               if($_POST['choice']=="Restaurant"){
                                       echo "Vous avez choisi <b>/b>";
                               }elseif($_POST['choice']=="Conseil"){
                                       echo "Vous avez choisi <b></b>";
                               }elseif($_POST['choice']=="Recette"){
                                       echo "Vous avez choisi <b></b>";
                               }elseif($_POST['choice']=="Retour d'expérience"){
                                       echo "Vous avez choisi <b></b>";
                               } 
                              }
                
//insert into database
                     $sql = "INSERT INTO plats(name,image,url,message,choice) VALUES('$name','$new_img_name','$img_upload_path','$message','$choice')";
                     mysqli_query($conn,$sql);
                     header('location: index.php?page=A');
            
                 }else{
                    echo  "you can't upload files of this type!";
                   header('location:index.php?error=you cannot upload files of this type!'); 
                 }
              }
         }else{
         $em = "unknown error occured!";
          //header('location:index.php?error=$em'); 
         }
      }else{
        header('location:index.php');
    
        
     }
     // pour renommer l'image uploadée
//       $randomno=rand(0,100000);
//       $rename='upload'.date('ymd').$randomno;
//       $img_name=$rename.'.'.$img_ex;
//       $folder = "./upload/" . $img_name;
//       $img_ex_lc = strtolower($img_ex);
//       $allowed_exs = array("jpg","jpeg","png");
//       $img_name = uniqid("IMG-",true) .'.'. $img_ex_lc;
//      $img_name = md5(uniqid()) .'.'. $allowed_exs;
//      move_uploaded_file($tmp_name,$folder);
    
//      if($img_type == 'image/jpeg' && $img_type == 'image/jpg' && $img_type == 'image/png'){
//          if($img_size > 60000){
//              echo "sorry your file was not uploaded";
//          }
    
//          }else{
//              echo "it was not an image";
//          }
    
    
//      if(isset($_POST['choice'])){
//          $choice = $_POST['choice'];
//          if($_POST['choice']=="1"){
//                  echo "Vous avez choisi <b>restaurant</b>";
//          }elseif($_POST['choice']=="2"){
//                  echo "Vous avez choisi <b>conseil</b>";
//          }elseif($_POST['choice']=="3"){
//                  echo "Vous avez choisi <b>recette</b>";
//          }elseif($_POST['choice']=="4"){
//                  echo "Vous avez choisi <b>retour d'expérience</b>";
//          }
//  }if(isset($_POST['name'])){
//      $name = $_POST['name'];

//  }
//  if(isset($_POST['message'])){
//      $message = $_POST['message'];
//  }
//       $sql = "INSERT INTO plats(name,image,message,url,choice) VALUES('$name','$img_name','$message','$folder','$choice')";
//       mysqli_query($conn, $sql);
//       header('Location: index.php?page=1');
//    }else{
//        header('location:index.php?page=2');
    
  //{}

// $name = $_POST["name"];
// $message = $_POST["message"];
// if(isset($_POST['choice'])){
//              $choice = $_POST['choice'];
//              if($_POST['choice']=="1"){
//                      echo "Vous avez choisi <b>restaurant</b>";
//              }elseif($_POST['choice']=="2"){
//                      echo "Vous avez choisi <b>conseil</b>";
//              }elseif($_POST['choice']=="3"){
//                      echo "Vous avez choisi <b>recette</b>";
//              }elseif($_POST['choice']=="4"){
//                      echo "Vous avez choisi <b>retour d'expérience</b>";
//              } 
//             }
// if(isset($_POST['submit'])){
//   if(!empty($_FILES['image']) && isset($_POST['name']) && $_POST['name']!= "")
//   {
//     $img_name = $_FILES['image']['name'];
//     //$img_basename = substr($img_name, 0, strripos($img_name, '.'));
//     $file_extension = strrchr($img_name, ".");

//     $extensions_autorisees = array('.jpg', 'jpeg', 'png');
//     if(in_array($file_extension, $extensions_autorisees))
//     {
//       //renommer le fichier
//       $newimgname = md5($img_name) . $file_extension;
//       $file_dest = 'upload/'.$newimgname;
//       if(file_exists($file_dest))
//       {
//         echo'Vous avez deja telechargé cette photo';
//       } else{
//         move_uploaded_file($_FILES["image"]["tmp_name"], $file_dest);
//         $sql = "INSERT INTO plats (name,url) VALUES ('$name', '$file_dest')";
//         if (mysqli_query($conn, $sql)) {
//           //echo'Photo telechargé avec succès';
//           header("location:index.php?page=2");
//         } else {
//           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//         }
        
//       }
//     }else{
//       echo'Seuls les fichiers JPEG, JPG, PNG sont autorisés';
//     }

//   }else{
//     echo 'Veuillez remplir tout les champs';
//   }
// }
// // ici le code d'upload, renommer le fichier uploader et la recuperation du repertoire du serveur

// /*$sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";*/
 


// //mysqli_close($conn);
?>