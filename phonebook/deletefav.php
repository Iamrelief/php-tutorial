<?php
    include_once "db.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM favorites WHERE id = $id";
        $result = $conn->query($sql);
    }
    header("location: favorite.php");

?>