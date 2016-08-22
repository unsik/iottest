<?php  
$con=mysqli_connect("127.0.0.1","root","next1004","iot");  
 
mysqli_set_charset($con,"utf8");
  
if (mysqli_connect_errno($con))  
{  
   echo "Failed to connect to MySQL: " . mysqli_connect_error();  
}  
$name = $_POST['name'];  
$id = $_POST['id']; 
$time = $_POST['time'];  
$mode = $_POST['mode'];  

  
mysqli_query($con,"insert into iot (name,id,mode,install) values ('$name','$id','$mode','$time')");
if($mode==2)
{
 $idcheck = mysqli_query($con,"UPDATE Person SET login='$time' where id = '$id'");
}
$idcheck = mysqli_query($con,"UPDATE Person SET lasttime='$time' where id = '$id'");
if($idcheck)
{
    $res = mysqli_query($con,"select * from Person where id = '$id' ");
    $row = mysqli_fetch_array($res);
    echo " id check succes";
    
 }
 
   
mysqli_close($con);  
?> 
