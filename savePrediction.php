<?php session_start();
include("config.php");
$_SESSION['save'] = '0';
if(!empty($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $area = $_SESSION['area'];
    $buildingType = $_SESSION['buildingType'];
    $tenure = $_SESSION['tenure'];
    $size = $_SESSION['size'];
    $floor = $_SESSION['floor'];
    $price= $_SESSION['price'];

    $sql2 = "SELECT id FROM user WHERE email='$email'";
    $result2 = $connection->query($sql2);
    if ($result2->num_rows > 0) {
      while($row = $result2->fetch_assoc()) {
        $userID = $row["id"];
      }
    } 
    // to save the prediction
    $sql0 = "INSERT INTO prediction(area,buildingType, tenure, size, floor, price, userID) VALUES('$area', '$buildingType', '$tenure', '$size', '$floor', '$price', '$userID')";  

    if($connection->query($sql0) === TRUE){
      $_SESSION['save'] = '1';
    }else{
      $_SESSION['save'] = '0'; }
    
    $connection -> close();
  }
    header("location: predictprice5.php");
    exit;
?>