<?php
include "db.php";


$id="";
$username="";
$email="";
$phone= "";
$category="";
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET["id"])){
        header("location: home.php"); 
        exit;
    }
     $id = $_GET["id"];
     
     $sql = "SELECT * FROM contacts WHERE id= $id";
     $result= $conn->query($sql);
     $row = $result->fetch_assoc();
     if(!$row){
        header("location: index.php");
        exit;
        }
    $username = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $category = $row['category'];
    }else
    
        {
        
    $id= $_POST['id'];
    $username = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $category = $_POST['options'];

    do{
    if(empty($username) || empty($email) || empty($phone)){
            $errormsg = "Please fill all fields";
            break;
        }
          $sql= "UPDATE contacts ".
          "SET name='$username', email ='$email', phone = '$phone', category='$category' ".
          "WHERE id = $id";
        "VALUES('$username', '$email', '$phone')";
        $result = $conn->query($sql);
        header("location: home.php");
        $sucessmessage = "SUCCESS CONTACT ADDED <a href='home.php'>View</a>";

       
    } while(false);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                <h1>UPDATE</h1><br>
                <?php
                if(!empty($errormsg)){
                    echo "$errormsg";
                }
                
                ?>
                <div class="close">
                    <a href="home.php"><img src="icons/cross.png" alt="" height="25px" class="icon"></a>
                </div>
        <div class="form-box">

        <label for="">Name:</label><br><br>
        <input type="text" name="name" value="<?php echo $username; ?>"><br><br>
        <label for="email">Email:</label><br><br>
        <input type="text" name="email" value="<?php echo $email; ?>"><br><br>
        <label for="">Phone Number:</label><br><br>
        <input type="number" name="phone" id="" value="<?php echo $phone; ?>"><br><br>
                <select name="options[]" id="" value="">
            <option value="friend">Friend</option>
            <option value="colleague">Colleauge</option>
            <option value="family">Friend</option>
            
        </select><br><br>
        <?php
        if(!empty($sucessmessage)){
            echo"$sucessmessage";

        }
        
        ?><br>
        <input type="submit" value="UPDATE" class="btn">
        </div>



    </form>
</body>
</html>