<?php
include('../../database/Connect_dataBase.php');

    $_id  =  $_GET['id'];


// var_dump($_GET);
// die();
$sql = "DELETE FROM produit WHERE ID=$_id";
//   echo $sql;
//     die();


$result = $conn->query($sql);
header('Location:../../produit.php');
