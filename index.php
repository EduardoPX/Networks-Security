<?php
// defining variables.
$hostname = "localhost";
$usename = "root";
$password = "root";
$dbname = "puta";


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    /// Stableshing a data base connection.
    $conn = mysqli_connect($hostname, $usename, $password);

    /// Verefy if exists errors.
    if(!$conn)
    {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    else
    {
        echo "Connected!";
    }

    $db = mysqli_select_db($dbname) or die;

//    $usuario = $_POST['usuario'];
//    $senha = $_POST['senha'];
    $query = "select usuario, senha from usuario where usuario='$usuario' and senha='$senha'";
    echo $query;
    $result = mysqli_query($query);
    $rows = mysqli_fetch_array($result);

    if($rows)
    {
        echo "########## AUTENTICADO ##########";
    }

    else
    {
        echo "########## SENHA OU LOGIN INCORRETO ##########";
    }

    mysql_close($conn);
}

?>
