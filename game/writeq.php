<?php
require_once "../res/connect.php";
session_start();
try
{
    if ($polaczenie->connect_errno!=0)
    {
        throw new Exception(mysqli_connect_errno());
    }
    else
    {
        $postac = $_POST['skin'];
        $id = $_SESSION['id'];
        if ($polaczenie->query("UPDATE uzytkownicy SET avatar='$postac' WHERE id='$id'"))
        {
            $_SESSION['udanyzapisavatara']=true;
            header("Location:shop/shop.php");
        }
        else
        {
            throw new Exception($polaczenie->error);
        }
    }

    $polaczenie->close();
}
catch(Exception $e)
{
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o zagranie w innym terminie!</span>';
    echo '<br />Informacja developerska: '.$e;
}
?>