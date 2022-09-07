<!-- insertion de l'id du plat liké ou disliké -->

<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=utilisateurs", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


if(isset($_GET['t'],$_GET['id']) && !empty($_GET['t']) && !empty($_GET['id'])){
    $getid = (int)$_GET['id'];
    $gett = (int)$_GET['t'];
   
    $check = $conn->prepare('SELECT id FROM plats WHERE id = ?');
    $check->execute(array($getid));

    if($check->rowCount() == 1){
        if($gett == "1"){
          if(isset($like)){
            // $like=(int)$_POST['like'];
            $insert = $conn->prepare("INSERT INTO likess (id_plat) VALUE (?)");
          }
$insert = $conn->prepare('INSERT INTO likess (id_plat) VALUE (?)');
$insert->execute(array($getid));
        }elseif($gett == "2"){

            $insert = $conn->prepare('INSERT INTO dislikes (id_plat) VALUE (?)');
            $insert->execute(array($getid));
             
        }
        header('location: index.php?page='.$getid);
    }else{
        exit('');
    
    }
}
?>
<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "utilisateurs";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// if(isset($_GET['t'],$_GET['id']) && !empty($_GET['t']) && !empty($_GET['id'])){
//   $id = $_GET['id'];
//   $t = $_GET['t'];

//   $req = "SELECT id FROM plats WHERE id=?";
//  $result = mysqli_query($conn, $req);

//  if(rowCount() == 1){
//      if($t == 1) {
//        $sql="INSERT INTO likess (id_plat) VALUE (?)";
//   mysqli_query($conn,$sql);
  
//            }elseif($t == 2){
  
//                $sql="INSERT INTO dislikes (id_plat) VALUE (?)";
//                mysqli_query($conn,$sql);
               
//            }
//  }
 
// }