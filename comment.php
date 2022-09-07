
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "utilisateurs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$commentaire=addslashes($_POST['commentaire']);

$id_pub=$_GET['id'];
if(isset($_POST['commenta'])){
     
}
 //Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 $sql = "INSERT INTO avis(commentaire, id_pub) VALUES ('$commentaire','$id_pub')";

 if($conn->query($sql) === TRUE){
    echo "nouvel enregistrement créé";
    header ('location:index.php?page='.$id_pub);
 }else{
    echo "Error: " . $sql . "<br>" . $conn->error;
 }

$conn->close();
   
?>

