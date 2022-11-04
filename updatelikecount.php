<!--concerne like dislike-->
<?php
$con=mysqli_connect('localhost','root','','utilisateurs');
$type=$_POST['type'];
$id=$_POST['id'];
if($type=='like'){
	$sql="update plats set like_count=like_count+1 where id=$id";
}else{
	$sql="update plats set dislike_count=dislike_count+1 where id=$id";
}
$res=mysqli_query($con,$sql);
?>