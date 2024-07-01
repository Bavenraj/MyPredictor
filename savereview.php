<?php session_start();
include("config.php");
$errors = '';
$_SESSION['sucess'] = '0';
        if(isset($_POST["submit"])){
            if(!empty($_POST['rating']) && empty($_POST['review'])){
               if(!empty($_SESSION['email'])) {
                $rating = $_POST['rating'];
                $email = $_SESSION['email'];
                $area = $_SESSION['area'];
                $buildingType = $_SESSION['buildingType'];
                $tenure = $_SESSION['tenure'];
                $size = $_SESSION['size'];
                $floor = $_SESSION['floor'];
                $price= $_SESSION['price'];
                //to reference the userid
                $sql2 = "SELECT id FROM user WHERE email='$email'";
                $result2 = $connection->query($sql2);
                if ($result2->num_rows > 0) {
                  while($row = $result2->fetch_assoc()) {
                    $userID = $row["id"];
                  }
                }  
                if ($_SESSION['save'] == '0') {
                  // to save the prediction
                  $sql0 = "INSERT INTO prediction(area,buildingType, tenure, size, floor, price, userID) VALUES('$area', '$buildingType', '$tenure', '$size', '$floor', '$price', '$userID')";  
                  $connection->query($sql0);
                }
                // to reference the prediction
                $sql1 = "SELECT id FROM prediction WHERE area='$area' AND buildingType='$buildingType' AND tenure='$tenure' and size='$size' and floor='$floor' and price='$price'";
                $result1 = $connection->query($sql1);
                if ($result1->num_rows > 0) {
                  while($row = $result1->fetch_assoc()) {
                    $predictionID = $row["id"];
                  }
                } 
              
                $_SESSION['rating'] = $rating;
                $sql = "INSERT INTO review(rating,userID, predictionID) VALUES('$rating','$userID', '$predictionID')";  
                if($connection->query($sql) === TRUE){
                  $_SESSION['sucess'] = '1';
    
                }else{
                  $_SESSION['sucess'] = '0'; }
              }
          } else if(!empty($_POST['rating']) && !empty($_POST['review'])){
            if(!empty($_SESSION['email'])) {
                $rating = $_POST['rating'];
                $review = $_POST['review'];
                $email = $_SESSION['email'];
                $area = $_SESSION['area'];
                $buildingType = $_SESSION['buildingType'];
                $tenure = $_SESSION['tenure'];
                $size = $_SESSION['size'];
                $floor = $_SESSION['floor'];
                $price= $_SESSION['price'];
                //to reference the userid
                $sql2 = "SELECT id FROM user WHERE email='$email'";
                $result2 = $connection->query($sql2);
                if ($result2->num_rows > 0) {
                  while($row = $result2->fetch_assoc()) {
                    $userID = $row["id"];
                  }
                }
                if ($_SESSION['save'] == '0') {
                  // to save the prediction
                  $sql0 = "INSERT INTO prediction(area,buildingType, tenure, size, floor, price, userID) VALUES('$area', '$buildingType', '$tenure', '$size', '$floor', '$price', '$userID')";  
                  $connection->query($sql0);
                }
                // to reference the prediction
                $sql1 = "SELECT id FROM prediction WHERE area='$area' AND buildingType='$buildingType' AND tenure='$tenure' and size='$size' and floor='$floor' and price='$price'";
                $result1 = $connection->query($sql1);
                if ($result1->num_rows > 0) {
                  while($row = $result1->fetch_assoc()) {
                    $predictionID = $row["id"];
                  }
                } 
 
                $_SESSION['rating'] = $rating;
                $_SESSION['review'] = $review;
                $review = mysqli_real_escape_string($connection, $_POST['review']);
                $sql = "INSERT INTO review(rating, review, userID, predictionID) VALUES('$rating', '$review', '$userID', '$predictionID')"; 
                if($connection->query($sql) === TRUE){
                  $_SESSION['sucess'] = '1';
                    //header('location: rating.php');
                }else{
                  $_SESSION['sucess'] = '0';
                  }
            }} else {
              $errors = "Please select your rating <br>";

            }
            $connection -> close();
        }
        header("location: predictprice5.php");
        exit;
?>