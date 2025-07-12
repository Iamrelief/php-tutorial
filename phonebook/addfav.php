<?php 
include_once "db.php";
$sucessmsg = "";
if($_SERVER["REQUEST_METHOD"] == 'GET'){
    if(!isset($_GET['id'])){
             header("location: home.php");
        exit;
   

    }
    $id= $_GET['id'];
    $sql = "SELECT * FROM contacts WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $username = $row['name'];
    $phone = $row['phone'];
    $category = $row['category'];
    if(empty($username) || empty($phone) || empty($category)){
        exit;
        header("location: home.php");

    }
    if(!$result){
        echo"invalid Querry";
    }
    do{
        $sql = "SELECT *  FROM favorites WHERE name = '$username' OR phone = '$phone'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result) > 0){
            header("location: favorite.php");
        break;
    }
    echo"$username";
    $sql = "INSERT INTO favorites(name, phone, category)".
    "VALUES('$username', '$phone', '$category')";
    $resultt =$conn->query($sql);
    header("location: favorite.php");
    $sucessmsg = "contact added to favorites";
}while(false);
}
    ?>