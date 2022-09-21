<?php
include('../../database/Connect_dataBase.php');

// var_dump($_POST);

// die();
if (isset($_POST['update_produit'])) {
    $_libelle =  $_POST['libelle'];
    $_code =  $_POST['code'];
    $_prix =  $_POST['prix'];
    $_desc  =  $_POST['description'];
    $_id  =  $_POST['id'];

    $sql = "UPDATE  `produit`set libelle = '$_libelle', code='$_code', prix = $_prix, description= '$_desc'  where ID = $_id";
    // echo $sql;
    // die();
    $result = $conn->query($sql);


    header('Location:../../index.php');
}


?>