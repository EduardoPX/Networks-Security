<?php

$hostname = "localhost";
$usename = "root";
$password = "root";
$dbname = "injection";


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $conn = mysqli_connect($hostname, $usename, $password, $dbname);

    if(mysqli_connect_errno()) { die("Failed to connect to MySQL: " . mysqli_connect_error()); }

    $db_ID = $_POST['id'];
    $db_password = $_POST['password'];

    $result = mysqli_query($conn, "select id, password from user where id='$db_ID' and password='$db_password'");

    $rows = mysqli_fetch_array($result);

    if($rows)
    {
        echo "################################# <br>";
        echo "########## AUTENTICADO ############ <br>";
        echo "################################# <br>";
    }

    else
    {
        echo "Lamentavelmente houve um erro! $db_ID";
        echo "O Usuario: $db_ID <br> ou a senha";
        echo "Senha: $db_password <br> sao invalidos";

    }

    mysql_close($conn);
}

?>
