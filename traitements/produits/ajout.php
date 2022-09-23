

<?php
include('../../database/Connect_dataBase.php');

// var_dump($_POST);

// die();
if (isset($_POST['add_produit'])) {
    $libelle =  $_POST['libelle'];
    $code =  $_POST['code'];
    $prix =  $_POST['prix'];
    $desc  =  $_POST['description'];

    $sql = "INSERT INTO `produit` (`libelle`, `code`, `prix`, `description`) VALUES ( '" . $libelle . "','" . $code . "','" . $prix . "','" . $desc . "');";
    // echo $sql;
    // die();
    $result = $conn->query($sql);


    header('Location:../../produit.php');
}


?>
