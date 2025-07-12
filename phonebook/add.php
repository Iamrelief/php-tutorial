<?php
include_once "db.php";
    $username = "";
    $email= "";
    $phone = "";
    $category ="";

$errormsg="";
$sucessmessage="";
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $category = $_POST['option'];
    do{

        if(empty($username) || empty($email) || empty($phone)){
            $errormsg = "Please fill all fields";
            break;
        }
         $sql = "SELECT * FROM contacts WHERE email = '$email' OR phone = '$phone' OR name='$username'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result) > 0){
            $errormsg = "this Email or number already exist do you want to <a href='update.php'>Update?</a>";
        break;
        }else{
            $sql= "INSERT INTO contacts(name, email, phone, category)".
        "VALUES('$username', '$email', '$phone', '$category')";
        $result = $conn->query($sql);
        $sucessmessage = "SUCCESS CONTACT ADDED ";
        echo"
            <script>
     setTimeout(function(){
        window.location.href='home.php';
    }, 2000);
</script>
        
        ";
    }


    }while(false);
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
                <h1>Add a contact</h1><br>
                <?php
                if(!empty($errormsg)){
                    echo "<div class='error'>$errormsg</div>";
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
        <label for="category">CATEGORY</label>
                <select name="option" id="" value="">
            <option value="friend">Friend</option>
            <option value="colleague">Colleauge</option>
            <option value="family">Family</option>
            
        </select><br><br>
        <?php
        if(!empty($sucessmessage)){
            echo"<div class='sucess'>$sucessmessage</div>";

        }
        
        ?><br>
        <input type="submit" value="CREATE CONTACT" class="btn">
        </div>



    </form>
</body>
</html>