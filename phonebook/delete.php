<?php
include_once "db.php";

    if(isset($_GET["id"])){
        $id = $_GET['id'];

        $sql = "DELETE FROM contacts WHERE id=$id";
        $conn->query($sql);
       

    }
     header("location: home.php");
?>