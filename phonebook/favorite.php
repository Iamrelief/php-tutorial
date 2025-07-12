
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="user">
            <div class="user-profile">
            <img src="icons/user.png" height="25px" alt="">
            </div>
            <strong>User name</strong>
        </div>
        <div class="logo"><h1>My Phone Book</h1></div>
        <div class="search">
            <img src="icons/search.png" alt="" height="20px">
        <input type="search" id="search" placeholder="Search a contact">
        </div>

        <nav>
            <div class="nav">
                <img src="icons/users-alt.png" alt="">
            <a href="home.php">Contacts</a>
            </div>
            <div class="nav">
                <img src="icons/settings.png" alt="">
            <a href="#">Settings</a>
            </div>
            <div class="nav">
                <img src="icons/heart.png" alt="">
                <a href="#">Favorites</a>
            </div>
            <div class="nav">
                <img src="icons/" alt="">
                <a href="add.php">Add</a>
            </div>
        </nav>
    </header>
    <div class="contacts-container">
        <h1>Favorites</h1>
    <?php
    include_once "db.php";

    $sql = "SELECT * FROM favorites";
    $result = $conn->query($sql);
   while( $row = $result->fetch_assoc()){
                
                echo"
                        <hr>
        <div class='contact'>
        <div class='sep'>
        <div class='contact-name'>
                    <div class='user-profile'>
            <img src='icons/user.png' height='25px'>
            </div>
            <strong>$row[name]</strong>
            </div>
            <div class='profile-number'>
            <p>$row[phone]</p>
            </div>
            </div>
            <div class='sub'>
            <p>$row[category]</p>
                       <a href='deletefav.php? id=$row[id]'><img src='icons/trash.png' class='icon'  alt=''></a>

            </div>
        </div>
        <hr>
                
                ";
            }



?>
<script src="app.js">
    
</script>
    
</script>
    </div>
</body>
</html>